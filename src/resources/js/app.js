import Vue from 'vue';
import App from './App.vue';
import http from './plugins/http';
import components from './components';

Vue.use(http);
Vue.use(components);

const app = new Vue({
    el: '#app',
    components: {
        App,
    },
});