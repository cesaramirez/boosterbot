/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import "./bootstrap";

import Vue from "vue";

window.Vue = Vue;
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import "./plugins";
import "./components";

import { TinkerComponent } from "botman-tinker";
Vue.component("botman-tinker", TinkerComponent);

Vue.mixin({
    methods: {
        route: route
    }
});

const app = new Vue({
    el: "#app"
});
