import { Component, OnInit } from '@angular/core';
import { IonicModule, AlertController, ToastController } from '@ionic/angular';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms'; // Importa o módulo de formulários do Angular para usar two-way data binding

interface Todo { // Define a estrutura de uma tarefa
  id: number;       // Identificador único baseado em timestamp
  title: string;    // Texto descritivo da tarefa
  done: boolean;    // Status de conclusão
  createdAt: string; // Data de criação em formato ISO
}

@Component({ // Decorador que define a classe como componente Angular
  selector: 'app-home', // Tag HTML para usar este componente
  standalone: true,     // Indica que é um componente autossuficiente
  imports: [IonicModule, CommonModule, FormsModule], // Módulos necessários
  templateUrl: './home.page.html', // Template associado
  styleUrls: ['./home.page.scss'], // Estilos associados
})
export class HomePage implements OnInit { // Implementa ciclo de vida OnInit
  newTitle = ''; // Binding para entrada de nova tarefa
  todos: Todo[] = []; // Armazena lista de tarefas

  constructor( // Injeção de dependências
    private alertCtrl: AlertController, // Para criar alertas
    private toastCtrl: ToastController  // Para criar notificações toast
  ) { }

  ngOnInit() { // Executado ao inicializar o componente
    const raw = localStorage.getItem('todos'); // Recupera dados do localStorage
    this.todos = raw ? JSON.parse(raw) as Todo[] : []; // Parsing ou array vazio
  }

  private persist() { // Método interno para salvar no localStorage
    localStorage.setItem('todos', JSON.stringify(this.todos));
  }

  async addTodo() { // Adiciona nova tarefa
    const title = this.newTitle.trim(); // Remove espaços desnecessários
    if (!title) { // Valida se há texto
      const t = await this.toastCtrl.create({
        message: 'Digite uma tarefa.',
        duration: 1500
      });
      await t.present();
      return; // Interrompe execução se vazio
    }
    const todo: Todo = { // Cria novo objeto Todo
      id: Date.now(), // ID baseado no timestamp atual
      title,          // Nome da tarefa (short-hand property)
      done: false,    // Inicializa como não concluída
      createdAt: new Date().toISOString(), // Data/hora em ISO
    };
    this.todos.unshift(todo); // Adiciona no início do array
    this.newTitle = ''; // Limpa campo de entrada
    this.persist();     // Salva alterações
  }

  toggleDone(todo: Todo) { // Alterna status de conclusão
    todo.done = !todo.done;
    this.persist(); // Persiste mudança
  }

  async editTodo(todo: Todo) { // Edita tarefa existente
    const alert = await this.alertCtrl.create({
      header: 'Editar tarefa',
      inputs: [{
        name: 'title',
        type: 'text',
        value: todo.title, // Pré-preencher com valor atual
        placeholder: 'Descrição'
      }],
      buttons: [
        { text: 'Cancelar', role: 'cancel' }, // Fecha alerta
        {
          text: 'Salvar',
          handler: (data) => {
            const t = (data.title || '').trim(); // Limpa e valida entrada
            if (t) {
              todo.title = t; // Atualiza título
              this.persist(); // Salva alterações
            }
          }
        }
      ]
    });
    await alert.present(); // Exibe alerta
  }

  async deleteTodo(todo: Todo) { // Exclui tarefa
    const alert = await this.alertCtrl.create({
      header: 'Excluir',
      message: `Deseja excluir "${todo.title}"?`, // Mensagem personalizada
      buttons: [
        { text: 'Cancelar', role: 'cancel' },
        {
          text: 'Excluir',
          role: 'destructive', // Estilo destrutivo (normalmente vermelho)
          handler: async () => {
            this.todos = this.todos.filter(t => t.id !== todo.id); // Filtra removendo o item
            this.persist(); // Salva alterações
            const toast = await this.toastCtrl.create({
              message: 'Excluída.',
              duration: 1000
            });
            await toast.present(); // Confirma exclusão
          }
        }
      ]
    });
    await alert.present(); // Exibe alerta
  }

  clearDone() { // Remove todas as tarefas concluídas
    this.todos = this.todos.filter(t => !t.done); // Mantém apenas não concluídas
    this.persist(); // Salva alterações
  }
}