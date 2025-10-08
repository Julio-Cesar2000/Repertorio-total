// Importações principais do Angular e do Ionic
import { Component, OnInit, computed, signal } from '@angular/core'; // usamos signals e computed (recurso moderno do Angular 16+)
import { IonicModule, AlertController, ToastController } from '@ionic/angular'; // componentes e serviços do Ionic
import { CommonModule } from '@angular/common'; // diretivas como *ngIf, *ngFor
import { FormsModule } from '@angular/forms'; // necessário para usar [(ngModel)]

// Define o tipo de filtro que o usuário pode aplicar
type Filter = 'all' | 'open' | 'done';

// Estrutura de uma tarefa (To-Do)
interface Todo {
  id: number;         // identificador único (timestamp)
  title: string;      // título ou descrição da tarefa
  done: boolean;      // indica se está concluída
  createdAt: string;  // data/hora de criação em formato ISO
}

@Component({
  selector: 'app-home', // seletor do componente
  standalone: true,     // componente independente, sem precisar de módulo
  imports: [IonicModule, CommonModule, FormsModule], // módulos necessários
  templateUrl: './home.page.html',  // HTML do componente
  styleUrls: ['./home.page.scss'],  // estilos CSS/SCSS
})

// Classe principal da página
export class HomePage implements OnInit {

  // ======== CAMPOS DE CONTROLE DA INTERFACE ========
  newTitle = '';       // armazena o texto digitado para nova tarefa
  search = '';         // termo de busca digitado
  filter = signal<Filter>('all'); // filtro ativo: all, open ou done

  // ======== LISTA DE TAREFAS ========
  // Signal (estado reativo) que guarda todas as tarefas
  todos = signal<Todo[]>([]);

  // ======== VALORES COMPUTADOS ========
  // São derivados automaticamente de "todos" e atualizam sozinhos

  openCount = computed(() => this.todos().filter(t => !t.done).length); // total de tarefas abertas
  doneCount = computed(() => this.todos().filter(t => t.done).length);  // total de concluídas
  totalCount = computed(() => this.todos().length);                     // total geral

 // Lista filtrada e ordenada (considera busca + filtro + ordem de criação)
filteredTodos = computed(() => {
  const q = this.search.trim().toLowerCase(); // termo de busca
  const currentFilter = this.filter(); // 👈 agora é uma signal

  return this.todos()
    .filter(t => {
      if (currentFilter === 'open' && t.done) return false;
      if (currentFilter === 'done' && !t.done) return false;
      if (q && !t.title.toLowerCase().includes(q)) return false;
      return true;
    })
    .sort((a, b) => b.createdAt.localeCompare(a.createdAt));
});
  // ======== CONSTRUTOR ========
  constructor(
    private alertCtrl: AlertController, // serviço para criar janelas de alerta
    private toastCtrl: ToastController  // serviço para criar mensagens rápidas (toast)
  ) {}

  // ======== CICLO DE VIDA ========
  // Executa automaticamente quando a página é carregada
  ngOnInit() {
    // Tenta recuperar tarefas salvas no localStorage
    const raw = localStorage.getItem('todos');
    const list: Todo[] = raw ? JSON.parse(raw) : [];

    // Carrega as tarefas no estado (signal)
    this.todos.set(
      list
        // Filtra registros válidos (defensivo)
        .filter(t => t && typeof t.id === 'number' && t.title)
        // Garante que todas tenham campo createdAt
        .map(t => ({ ...t, createdAt: t.createdAt ?? new Date().toISOString() }))
    );
  }

  // ======== SALVAR NO LOCALSTORAGE ========
  private persist() {
    // Converte o array de tarefas em string e salva
    localStorage.setItem('todos', JSON.stringify(this.todos()));
  }

  // ======== ADICIONAR NOVA TAREFA ========
  async addTodo() {
    const title = this.newTitle.trim(); // remove espaços extras
    if (!title) {
      // Se estiver vazio, mostra alerta rápido
      const t = await this.toastCtrl.create({
        message: 'Digite uma tarefa.',
        duration: 1500
      });
      await t.present();
      return;
    }

    // Cria o objeto da nova tarefa
    const todo: Todo = {
      id: Date.now(), // timestamp atual como ID
      title,
      done: false,    // começa não concluída
      createdAt: new Date().toISOString(), // data atual
    };

    // Adiciona no topo da lista (mais recente primeiro)
    this.todos.update(list => [todo, ...list]);

    // Limpa o campo e salva
    this.newTitle = '';
    this.persist();
  }

  // ======== MARCAR / DESMARCAR COMO CONCLUÍDA ========
  toggleDone(todo: Todo) {
    // Atualiza o campo "done" da tarefa correspondente
    this.todos.update(list =>
      list.map(t => (t.id === todo.id ? { ...t, done: !t.done } : t))
    );
    this.persist(); // salva no localStorage
  }

  // ======== EDITAR TAREFA ========
  async editTodo(todo: Todo) {
    // Cria um alerta com campo de edição
    const alert = await this.alertCtrl.create({
      header: 'Editar tarefa',
      inputs: [
        { name: 'title', type: 'text', value: todo.title, placeholder: 'Descrição' }
      ],
      buttons: [
        { text: 'Cancelar', role: 'cancel' },
        {
          text: 'Salvar',
          handler: (data) => {
            const t = (data.title || '').trim();
            if (t) {
              // Atualiza título no array de tarefas
              this.todos.update(list =>
                list.map(x => (x.id === todo.id ? { ...x, title: t } : x))
              );
              this.persist(); // salva alteração
            }
          }
        }
      ]
    });
    await alert.present();
  }

  // ======== EXCLUIR TAREFA ========
  async deleteTodo(todo: Todo) {
    const alert = await this.alertCtrl.create({
      header: 'Excluir',
      message: `Deseja excluir "${todo.title}"?`,
      buttons: [
        { text: 'Cancelar', role: 'cancel' },
        {
          text: 'Excluir',
          role: 'destructive',
          handler: async () => {
            // Remove a tarefa da lista
            this.todos.update(list => list.filter(t => t.id !== todo.id));
            this.persist();
            // Mostra aviso de exclusão
            const toast = await this.toastCtrl.create({
              message: 'Excluída.',
              duration: 1000
            });
            await toast.present();
          }
        }
      ]
    });
    await alert.present();
  }

  // ======== LIMPAR TODAS AS CONCLUÍDAS ========
  clearDone() {
    // Mantém apenas as tarefas não concluídas
    this.todos.update(list => list.filter(t => !t.done));
    this.persist();
  }

  // ======== MARCAR TODAS COMO CONCLUÍDAS ========
  markAllDone() {
    if (!this.todos().length) return; // evita erro se estiver vazio
    this.todos.update(list => list.map(t => ({ ...t, done: true })));
    this.persist();
  }

  // ======== MUDAR FILTRO ========
  get filterModel(): Filter {
  return this.filter();
}

set filterModel(f: Filter) {
  this.filter.set(f);
}

  // ======== LIMPAR BUSCA ========
  clearSearch() {
    this.search = '';
  }
}