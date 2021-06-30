import Vue from 'vue'

Vue.config.devtools = true

Nova.booting((Vue, router) => {
    Vue.component('index-NovaTextCurrency', require('./components/IndexField'));
    Vue.component('detail-NovaTextCurrency', require('./components/DetailField'));
    Vue.component('form-NovaTextCurrency', require('./components/FormField'));
})
