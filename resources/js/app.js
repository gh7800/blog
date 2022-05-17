import qs from "qs";

require('./bootstrap');

import Vue from "vue";
import axios from 'axios'
import router from './routes.js'
import App from './components/App.vue'
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'

Vue.use(ElementUI)

// 设置 axios，把请求数据在这里转换一下，参考官方文档： https://github.com/axios/axios
axios.defaults.transformRequest = [(data, header) => {
    return qs.stringify(data);
}]
Vue.prototype.$axios = axios

const app = new Vue({
    el: '#app',
    router,
    render: h => h(App)
})
