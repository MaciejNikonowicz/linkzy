require('./bootstrap');

window.Vue = require('vue').default;

import VueRouter from 'vue-router';
import routes from './routes';
import App from './App.vue';
import Vue from 'vue';

Vue.use(VueRouter);

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router: new VueRouter(routes)
});