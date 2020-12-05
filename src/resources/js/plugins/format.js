export default {
    install: Vue => {
        Vue.prototype.format = value => (+value)
            ? (+value).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$& ')
            : ''
        ;
    } 
}