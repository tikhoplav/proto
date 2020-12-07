import Menu from 'vue-material-design-icons/Menu.vue';
import CloseBox from 'vue-material-design-icons/CloseBox.vue';
import CheckBold from 'vue-material-design-icons/CheckBold.vue'

export default {
    install: Vue => {
        Vue.component('i-menu', Menu);
        Vue.component('i-close-box', CloseBox);
        Vue.component('i-check', CheckBold);
	},
};