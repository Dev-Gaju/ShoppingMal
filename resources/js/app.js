/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// AlertBarAfter Save
// CommonJS

import swal from 'sweetalert';
window.swal = swal;

window.Fire = new Vue();

/** Vform use to save data*/

import {
    Form,
    HasError,
    AlertError
} from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

import VueRouter from 'vue-router'
Vue.use(VueRouter)

const routes = [{
        path: '/category',
        component: require('./components/CategoryComponent.vue')
    },
    {
        path: '/brand',
        component: require('./components/BrandComponent.vue')
    },
    {
        path: '/product',
        component: require('./components/ProductComponent.vue')
    }
];

const router = new VueRouter({
    mode: 'history',
    routes
})




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    router
});
