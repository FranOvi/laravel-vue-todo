import Vue from 'vue';
import App from './components/app';
import store from './store';

//require('./bootstrap');

const app = new Vue({
    store,
    ...App
})