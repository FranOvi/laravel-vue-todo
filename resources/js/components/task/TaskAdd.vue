<template>
  <div >
    <form @submit.prevent="onSubmit(task)" class="add-container">
      <input type="text" v-model="task.task" class="add-input" name="task" placeholder="Add Task">
      <input type="submit" value="Add" class="add-button">
    </form>
  </div>
</template>

<script>
import { mapActions } from 'vuex';

export default {
  name: 'TaskAdd',
  
  data() {
    return {
      task: {
        task: '',
        is_completed: false
      }
    }
  },

  methods: {
    ...mapActions([
      'createTask',
    ]),
    
    onSubmit(task) {
      this.createTask(task);
      this.task.task = "";
    }
  }
}
</script>

<style scoped>
  .add-container{
    display: flex;
    justify-content: space-between;
    margin: 8px 0;
  }

  .add-input[type=text]{
    padding: 12px 20px;
    box-sizing: border-box;
    margin-right:10px;
    border-radius: 6px;
    outline: none !important;

    flex-grow: 1;
  }

  .add-button{
    margin-left: auto;
    background-color: #0075ff; /* Azul */
    border: none;
    color: white;
    padding: 15px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    border-radius: 6px;
    transition-duration: 0.4s;

    flex-grow: 0;
  }

  .add-button:hover {
    background-color: #004699; /* Azul oscuro */
    color: white;
  }
</style>
