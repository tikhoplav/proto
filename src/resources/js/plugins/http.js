import axios from 'axios';

export default {
    install: Vue => {
        Vue.prototype.$http = axios.create({
            baseURL: `${location.href}api`,
            withCredentials: true,
            headers: {
                'Content-Type': 'application/json; charset=UTF-8',
                'X-Request-With': 'XMLHttpRequest',
            },
        });
    },
};