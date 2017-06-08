import VueMask from 'v-mask'
import VeeValidate from 'vee-validate';

require('./bootstrap');

window.Vue = require('vue');

Vue.use(VueMask);
Vue.use(VeeValidate);

Vue.component('FormCurriculum', require('./components/FormCurriculum.vue'));

const app = new Vue({
    el: '#app'
});
