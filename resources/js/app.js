
require('./bootstrap');

// import Vue from "vue";
import axios from 'axios'
import router from './routes.js'
import App from './components/App'

window.Vue = require('vue')
Vue.prototype.$axios = axios

const app = new Vue({
    el: '#app',
    router,
    render: h => h(App)
})
