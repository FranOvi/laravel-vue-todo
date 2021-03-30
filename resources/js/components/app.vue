<template>
    <div>
        <TaskList/>
    </div>
</template>

<script>
import TaskList from './task/TaskList';

export default {
    el: '#app',
    components: {
        TaskList
    }
}
</script>