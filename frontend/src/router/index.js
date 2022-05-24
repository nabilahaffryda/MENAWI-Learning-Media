import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home";
import LandingPage from "../views/LandingPage";
import Login from "../views/Login";
import Register from "../views/Register";
import Profile from "../views/Profile";
import QuizHome from "../views/quiz/QuizHome";
import MaterialHome from "../views/material/MaterialHome";
import QuestionContent from "../views/quiz/QuestionContent";
import MaterialContent from "../views/material/MaterialContent";
import store from "../store/index.js";

Vue.use(VueRouter);

const routes = [
  {
    path: "/home",
    name: "Home",
    component: Home,
    meta: {
      auth: true,
    },
  },
  {
    path: "/login",
    name: "Login",
    component: Login,
    meta: {
      guest: true,
    },
  },
  {
    path: "/register",
    name: "Register",
    component: Register,
    meta: {
      guest: true,
    },
  },
  {
    path: "/profile",
    name: "Profile",
    component: Profile,
    meta: {
      auth: true,
    },
  },
  {
    path: "/materialhome",
    name: "MaterialHome",
    component: MaterialHome,
    meta: {
      auth: true,
    },
  },
  {
    path: "/quizhome",
    name: "QuizHome",
    component: QuizHome,
    meta: {
      auth: true,
    },
  },
  {
    path: "/questioncontent",
    name: "QuestionContent",
    component: QuestionContent,
    meta: {
      auth: true,
    },
  },
  {
    path: "/materialcontent",
    name: "MaterialContent",
    component: MaterialContent,
    meta: {
      auth: true,
    },
  },
  {
    path: "/",
    name: "LandingPage",
    component: LandingPage,
    meta: {
      guest: true,
    },
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});
router.beforeEach((to, from, next) => {
  if (to.matched.some((record) => record.meta.auth)) {
    if (store.getters.isLoggedIn && store.getters.user) {
      next();
      return;
    }
  }

  if (to.matched.some((record) => record.meta.guest)) {
    if (!store.getters.isLoggedIn) {
      next();
      return;
    }
  }
  next();
});

export default router;
