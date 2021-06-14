/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


import Vue from 'vue'
import App from './components/App'
import router from './router'
import Paginate from 'vuejs-paginate'

Vue.component('paginate', Paginate)

const vue = new Vue({
    router: router,
    el:"#app",
    render:h=>h(App)
})

