import VBadge from "./VBadge.vue";
import VBadger from "./VBadger.vue";
import VBtn from "./VBtn.vue";
import VCol from "./VCol.vue";
import VCont from './VCont.vue';
import VElli from './VElli.vue';
import VInput from "./VInput";
import VRow from "./VRow.vue";
import VTable from './VTable.vue';
import VTd from './VTd.vue';
import VTh from './VTh.vue';
import VTr from './VTr.vue';

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
		Vue.component('v-td', VTd);
		Vue.component('v-th', VTh);
		Vue.component('v-tr', VTr);
	},
};