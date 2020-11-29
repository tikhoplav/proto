import Vue from 'vue';
import App from './App.vue';
import http from './plugins/http';

Vue.use(http);

const app = new Vue({
    el: '#app',
    components: {
        App,
    },
});