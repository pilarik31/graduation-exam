require('./bootstrap');
import "popper.js";
import "bootstrap";

import Vue from 'vue';


Vue.component('timer', () => import("./components/Timer"));
const app = new Vue({
        el: '#app',
});
