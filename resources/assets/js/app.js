import './bootstrap'
import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

Vue.use(Vuetify)

Vue.component('layout', require('./components/Layout'));

import store from './store'

import router from './router'

import './vue/filters'

import './auth'

const app = new Vue({
    el: '#app',
    store,
    router,
})



