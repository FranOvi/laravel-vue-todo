import axios from 'axios';

const END_POINT_URL = "http://localhost:8000/api/task/";

const state = {
    tasks: []
};

const getters = {
    allTasks: state => state.tasks
};

const actions = {
    async getTasks({ commit }) {
        const response = await axios.get(END_POINT_URL);    
        commit('setTasks', response.data);
    },
    async createTask( { commit }, task) {
        const response = await axios.post(END_POINT_URL, task);
        commit('addTask', response.data);
    },
    async updateTask( { commit }, task) {
        const response = await axios.put(`${END_POINT_URL}${task.id}`, task);
        commit('updTask', response.data);
    },
    async deleteTask( { commit }, task) {
        const response = await axios.delete(`${END_POINT_URL}${task.id}`);
        commit('remTask', task);
    }
};

const mutations = {
    setTasks: (state, tasks) => state.tasks = tasks,
    addTask: (state, task) => state.tasks.unshift(task),
    updTask: (state, updatedTask) => {
        const index = state.tasks.findIndex(t => t.id === updatedTask.id);
        if(index !== -1) {
            state.tasks.splice(index, 1, updatedTask);
        }        
    },
    remTask: (state, task) => state.tasks = state.tasks.filter(t => task.id !== t.id),
};

export default {
    state, getters, actions, mutations
}