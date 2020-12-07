import Vue from 'vue';
import App from './App.vue';
import http from './plugins/http';
import formats from './plugins/formats';
import icons from './plugins/icons';
import components from './components';

Vue.use(http);
Vue.use(formats);
Vue.use(icons);
Vue.use(components);

const app = new Vue({
	el: '#app',
	components: {
		App,
	},
})