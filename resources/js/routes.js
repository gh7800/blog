import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter)
import Login from './components/auth/Login.vue'
import Info from './components/auth/Info.vue'
import Home from './components/pages/Home.vue'

export default new VueRouter({
    mode: 'history',
    routes:[
        {
            path:'/login',
            name:'login',
            component:Login
        },
        {
            path:'/authuserinfo',
            name:'authuserinfo',
            component:Info
        },
        {
            path:'/home',
            name:'home',
            component:Home
        }
    ]
})
