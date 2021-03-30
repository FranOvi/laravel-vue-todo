<template>
  <div class="container">
    <h3>Task</h3>
    <TaskAdd/>
    <TaskList/>
  </div>
</template>

<script>
import TaskList from './task/TaskList';
import TaskAdd from './task/TaskAdd';

export default {
  el: '#app',
  components: {
    TaskList,
    TaskAdd,
  }
}
</script>

<style scoped>
.container {
  padding: 30px 15px;
  margin-right: auto;
  margin-left: auto;
}
@media (min-width: 768px) {
  .container {
    width: 750px;
  }
}
@media (min-width: 992px) {
  .container {
    width: 950px;
  }
}
</style>