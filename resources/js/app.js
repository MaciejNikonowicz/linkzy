require('./bootstrap');

window.Vue = require('vue').default;

import VueRouter from 'vue-router';
import routes from './routes';
import App from './App.vue';
import Vue from 'vue';
import VTooltip from "v-tooltip";

Vue.use(VueRouter);
Vue.use(VTooltip);

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router: new VueRouter(routes)
});