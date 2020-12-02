import VTable from './VTable.vue';
import VCont from './VCont.vue';
import VRow from "./VRow.vue";
import VCol from "./VCol.vue";
import VInput from "./VInput";
import VBtn from "./VBtn";

export default {
	install: Vue => {
		Vue.component('v-table', VTable);
		Vue.component('v-cont', VCont);
		Vue.component('v-row', VRow);
		Vue.component('v-col', VCol);
		Vue.component('v-input', VInput);
		Vue.component('v-btn', VBtn);
	},
};