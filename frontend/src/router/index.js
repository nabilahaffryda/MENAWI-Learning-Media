import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home'
import LandingPage from '../views/LandingPage'
import Login from '../views/Login'
import Register from '../views/Register'
import Profile from '../views/Profile'
import QuizHome from '../views/quiz/QuizHome'
import MaterialHome from '../views/material/MaterialHome'
import QuestionContent from '../views/quiz/QuestionContent'
import MaterialContent from '../views/material/MaterialContent'

Vue.use(VueRouter)

const routes = [
    {
        path: '/home',
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
        path: '/questioncontent',
        name: 'QuestionContent',
        component: QuestionContent
    },
    {
        path: '/materialcontent',
        name: 'MaterialContent',
        component: MaterialContent
    },
    {
        path: '/',
        name: 'LandingPage',
        component: LandingPage
    },
]

const router = new VueRouter({
    mode: 'history',
    routes
})
export default router