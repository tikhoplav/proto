import Vue from 'vue';
import App from './App.vue';
import http from './plugins/http';
import format from './plugins/format';
import components from './components';

Vue.use(http);
Vue.use(format);
Vue.use(components);

const app = new Vue({
    el: '#app',
    components: {
        App,
    },
});