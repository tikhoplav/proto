import VBadge from "./VBadge.vue";
import VBadger from "./VBadger.vue";
import VBtn from "./VBtn.vue";
import VCol from "./VCol.vue";
import VCont from './VCont.vue';
import VElli from './VElli.vue';
import VInput from "./VInput";
import VRow from "./VRow.vue";
import VTable from './VTable.vue';

export default {
	install: Vue => {
		Vue.component('v-badge', VBadge);
		Vue.component('v-badger', VBadger);
		Vue.component('v-btn', VBtn);
		Vue.component('v-col', VCol);
		Vue.component('v-cont', VCont);
		Vue.component('v-elli', VElli);
		Vue.component('v-input', VInput);
		Vue.component('v-row', VRow);
		Vue.component('v-table', VTable);
	},
};