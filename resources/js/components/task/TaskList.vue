<template>
  <div>
    <div v-for="task in allTasks" v-bind:key="task.id" class="todo-item">
      <input type="checkbox" :id="`completed-${task.id}`" name="completed" :checked="task.is_completed" :value="task.is_completed" v-on:change="markComplete(task)">
      <label :for="`completed-${task.id}`" v-bind:class="{'is-completed':task.is_completed}" class="todo-text">
        {{task.task}}
      </label>
      <button class="todo-button" @click="deleteTask(task)">Delete</button>
    </div>

    <span>You have {{pendingCount}} pending tasks</span>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';

export default {
  name: 'TaskList',

  computed: {
    ...mapGetters([
      'allTasks'
    ]),

    pendingCount: function() {
      return this.allTasks.filter((t) => !t.is_completed).length;
    }
  },

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
    padding: 15px 10px 20px 15px;
    display: flex;
  }

  .todo-text {
    padding-left: 8px;
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
