import { Component, OnInit } from '@angular/core';
import { IonicModule, AlertController, ToastController } from '@ionic/angular';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms'; //Importa o módulo de formulário

interface Todo {
  id: number;
  title: string;
  done: boolean;
  createdAt: string;
}

@Component({ //Declara o nome da tag
  selector: 'app-home', // seleciona a tag
  standalone: true, // módulo independente
  imports: [IonicModule, CommonModule, FormsModule],
  templateUrl: './home.page.html',
  styleUrls: ['./home.page.scss'],
})


export class HomePage implements OnInit { // Início da classe do componente também implementa o OnInit
  newTitle = ''; // Propriedade ligada ao IonInput para capturar o texto da nova tarefa
  todos: Todo[] = []; // Array que guarda a lista de tarefas na memória

  constructor( // Injeta os controladores de alerta e de toast, guardando-os em propriedades privadas
    private alertCtrl: AlertController,
    private toastCtrl: ToastController
  ) {}

  ngOnInit() { // Hook de ciclo de vida
    const raw = localStorage.getItem('todos'); // Leitura do LocalStorage dachave 'todos'
    this.todos = raw ? JSON.parse(raw) as Todo[] : []; // Se exitir faz uma injeção parse
  }





  private persist() { // Método auxiliar para um array no LocalStorage
    localStorage.setItem('todos', JSON.stringify(this.todos));
  }

  async addTodo() { // Início do método para adicionar tarefas
    const title = this.newTitle.trim(); // Remove todos os espaços da tarefa
    if (!title) { // Valida se o campo está vazio e cria e mostra um toats e saí do método
      const t = await this.toastCtrl.create({ message: 'Digite uma tarefa.', duration: 1500 });
      await t.present();
      return;
    }
    const todo: Todo = { // Todo é uma constante e mostra-o
      id: Date.now(), // Mostra o tempo atual
      title, // Texto digitado
      done: false, // inicia como falso
      createdAt: new Date().toISOString(), // Registra a data
    };
    this.todos.unshift(todo); //Insere a nova tarefa no início do array, fazendo-a aparecer lá no topo
    this.newTitle = ''; // Salava a lista atualizada nbo LocalStorage e encerra o método
    this.persist();
  }

  toggleDone(todo: Todo) { //Inverte o status de concluida e não concluida e salva
    todo.done = !todo.done;
    this.persist();
  }

  async editTodo(todo: Todo) { //Abra um alert de texto pré-preenchido com o título atual
    const alert = await this.alertCtrl.create({
      header: 'Editar tarefa',
      inputs: [{ name: 'title', type: 'text', value: todo.title, placeholder: 'Descrição' }],
      buttons: [
        { text: 'Cancelar', role: 'cancel' }, // Cancelar só fecha
        {
          text: 'Salvar', // Salva
          handler: (data) => {
            const t = (data.title || '').trim(); // Ler o valor digitado e (data.title)
            if (t) {
              todo.title = t;
              this.persist();
            }
          }
        }
      ]
    });
    await alert.present();
  }

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
            this.todos = this.todos.filter(t => t.id !== todo.id);
            this.persist();
            const toast = await this.toastCtrl.create({ message: 'Excluída.', duration: 1000 });
            await toast.present();
          }
        }
      ]
    });
    await alert.present();
  }

  clearDone() {
    this.todos = this.todos.filter(t => !t.done);
    this.persist();
  }
}