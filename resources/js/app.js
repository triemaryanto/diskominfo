require("./bootstrap");

window.Vue = require("vue").default;

import {
    Button,
    HasError,
    AlertError,
    AlertErrors,
    AlertSuccess,
} from "vform/src/components/bootstrap5";
Vue.component(Button.name, Button);
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
Vue.component(AlertErrors.name, AlertErrors);
Vue.component(AlertSuccess.name, AlertSuccess);

let Fire = new Vue();
window.Fire = Fire;
//Import Alert
import Swal from "sweetalert2";
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
});
window.Toast = Toast;

// Progress Bar
import VueProgressBar from "vue-progressbar";
Vue.use(VueProgressBar, {
    color: "rgb(143, 255, 199)",
    failedColor: "red",
    height: "20px",
});

import router from "./components/router/router";
import Vue from "vue";

Vue.component("pagination", require("laravel-vue-pagination"));
Vue.use(require("vue-moment"));
const app = new Vue({
    router,
    el: "#app",
});
