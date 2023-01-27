import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);
let Menara = require("../Menara.vue").default;
let Home = require("../Home.vue").default;
let DataTagihan = require("../DataTagihan.vue").default;
let TagihanLunas = require("../TagihanLunas.vue").default;
let routes = [
    {
        path: "/admin/home",
        component: Home,
    },
    {
        path: "/admin/data-tagihan",
        component: DataTagihan,
    },

    {
        path: "/admin/data-menara",
        component: Menara,
    },
    {
        path: "/admin/tagihan-lunas",
        component: TagihanLunas,
    },
];

const router = new VueRouter({
    routes,
    mode: "history",
});

export default router;
