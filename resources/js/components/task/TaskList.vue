<template>
  <div>
    <div v-for="task in allTasks" v-bind:key="task.id" class="todo-item">
      <input type="checkbox" :checked="task.is_completed" :value="task.is_completed" v-on:change="markComplete(task)">
      <div v-bind:class="{'is-completed':task.is_completed}">
        {{task.task}}
      </div>
      <button class="todo-button" @click="deleteTask(task)">Delete</button>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';

export default {
  name: 'TaskList',

  computed: mapGetters([
    'allTasks'
  ]),

  methods: {
    ...mapActions([
      'getTasks',
      'deleteTask',
      'updateTask'
    ]),

    markComplete(task) {
      task.is_completed = !task.is_completed 
      this.updateTask(task);
    }
  },

  created() {
    this.getTasks();
  }
}
</script>

<style scoped>
  .todo-item {
    background: #f3f3f5;
    padding: 20px 10px 20px 10px;
    display: flex;
  }

  .todo-button{
    margin-left: auto;
    background-color: #f44336; /* Rojo */
    border: none;
    color: white;
    padding: 8px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    border-radius: 6px;
    transition-duration: 0.4s;
  }

  .todo-button:hover {
    background-color: #861007; /* Rojo oscuro */
    color: white;
  }
  
  .is-completed {
    text-decoration: line-through;
  }
</style>
