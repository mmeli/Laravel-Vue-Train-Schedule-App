/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require("./bootstrap");

 import Vue from "vue";
 import App from "./vue/app.vue" //use App file
 import { BootstrapVue, IconsPlugin } from "bootstrap-vue";
 import datetime from 'vuejs-datetimepicker';


 import { library } from '@fortawesome/fontawesome-svg-core'
 import { faPlusSquare, faTrash } from '@fortawesome/free-solid-svg-icons'
 import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
 import "bootstrap/dist/css/bootstrap.css";
 import "bootstrap-vue/dist/bootstrap-vue.css";
 
library.add(faPlusSquare, faTrash)
Vue.use(BootstrapVue);
Vue.component("datetime", datetime);
Vue.component('font-awesome-icon', FontAwesomeIcon)

 const app = new Vue({
     el:'#app',
     components: { App }
 });