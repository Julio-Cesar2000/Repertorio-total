import { Component, OnInit } from '@angular/core';
import { IonicModule, AlertController, ToastController } from '@ionic/angular';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

interface Todo {
  id: number;
  title: string;
  done: boolean;
  createdAt: string;
}

@Component({
  selector: 'app-home',
  standalone: true,
  imports: [IonicModule, CommonModule, FormsModule],
  templateUrl: './home.page.html',
  styleUrls: ['./home.page.scss'],
})


export class HomePage implements OnInit {
  newTitle = '';
  todos: Todo[] = [];

  constructor(
    private alertCtrl: AlertController,
    private toastCtrl: ToastController
  ) {}

  ngOnInit() {
    const raw = localStorage.getItem('todos');
    this.todos = raw ? JSON.parse(raw) as Todo[] : [];
  }





  private persist() {
    localStorage.setItem('todos', JSON.stringify(this.todos));
  }

  async addTodo() {
    const title = this.newTitle.trim();
    if (!title) {
      const t = await this.toastCtrl.create({ message: 'Digite uma tarefa.', duration: 1500 });
      await t.present();
      return;
    }
    const todo: Todo = {
      id: Date.now(),
      title,
      done: false,
      createdAt: new Date().toISOString(),
    };
    this.todos.unshift(todo);
    this.newTitle = '';
    this.persist();
  }

  toggleDone(todo: Todo) {
    todo.done = !todo.done;
    this.persist();
  }

  async editTodo(todo: Todo) {
    const alert = await this.alertCtrl.create({
      header: 'Editar tarefa',
      inputs: [{ name: 'title', type: 'text', value: todo.title, placeholder: 'Descrição' }],
      buttons: [
        { text: 'Cancelar', role: 'cancel' },
        {
          text: 'Salvar',
          handler: (data) => {
            const t = (data.title || '').trim();
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