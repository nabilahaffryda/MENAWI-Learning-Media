import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home'
import Login from '../views/Login'
import Register from '../views/Register'
import Profile from '../views/Profile'
import QuizHome from '../views/quiz/QuizHome'
import MaterialHome from '../views/material/MaterialHome'
import Question from '../views/quiz/Question'

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/login',
        name: 'Login',
        component: Login
    },
    {
        path: '/register',
        name: 'Register',
        component: Register
    },
    {
        path: '/profile',
        name: 'Profile',
        component: Profile
    },
    {
        path: '/materialhome',
        name: 'MaterialHome',
        component: MaterialHome
    },
    {
        path: '/quizhome',
        name: 'QuizHome',
        component: QuizHome
    },
    {
        path: '/question',
        name: 'Question',
        component: Question
    },
]

const router = new VueRouter({
    mode: 'history',
    routes
})
export default router