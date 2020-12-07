import VCol from "./VCol.vue";
import VCont from './VCont.vue';
import VElli from './VElli.vue';
import VPop from "./VPop.vue";
import VRow from "./VRow.vue";

export default {
	install: Vue => {
		Vue.component('v-col', VCol);
		Vue.component('v-cont', VCont);
		Vue.component('v-elli', VElli);
		Vue.component('v-pop', VPop);
		Vue.component('v-row', VRow);
	},
};