import _ from "lodash";
import axios from "axios";
import Vue from "vue";
import Vuelidate from "vuelidate";

axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
axios.defaults.headers.common["X-CSRF-TOKEN"] = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

Vue.use(Vuelidate);
Vue.prototype.$axios = axios;

window._ = _;
window.Vue = Vue;
