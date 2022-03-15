import Vue from 'vue'
import VueRouter, { RouterLink } from 'vue-router'
import Home from '../views/Home'
import Login from '../views/Login'
import Login from '../views/Register'

Vue.use(VueRouter)

export default new RouterLink({
    mode: 'histroy',
    base: process.env.BASE_URL,
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        },
        {
            path: '/register',
            name: 'register',
            component: Register
        }
    ]
})