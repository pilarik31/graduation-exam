require('./bootstrap');
import "popper.js";
import "bootstrap";

window.Vue = require('vue');


Vue.component('timer', require('./components/Timer.vue'))
const app = new Vue({el: '#timer'});
