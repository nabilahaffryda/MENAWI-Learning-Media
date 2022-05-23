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

Vue.use(VueRouter);

const routes = [
  {
    path: "/home",
    name: "Home",
    component: Home,
  },
  {
    path: "/login",
    name: "Login",
    component: Login,
    meta: { guestOnly: true },
  },
  {
    path: "/register",
    name: "Register",
    component: Register,
    meta: { guestOnly: true },
  },
  {
    path: "/profile",
    name: "Profile",
    component: Profile,
  },
  {
    path: "/materialhome",
    name: "MaterialHome",
    component: MaterialHome,
  },
  {
    path: "/quizhome",
    name: "QuizHome",
    component: QuizHome,
  },
  {
    path: "/questioncontent",
    name: "QuestionContent",
    component: QuestionContent,
  },
  {
    path: "/materialcontent",
    name: "MaterialContent",
    component: MaterialContent,
  },
  {
    path: "/",
    name: "LandingPage",
    component: LandingPage,
    meta: { guestOnly: true },
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});
function isLoggedIn() {
  return localStorage.getItem("auth");
}
router.beforeEach((to, from, next) => {
  if (to.matched.some((record) => record.meta.authOnly)) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    if (!isLoggedIn()) {
      next({
        path: "/login",
        query: { redirect: to.fullPath },
      });
    } else {
      next();
    }
  } else if (to.matched.some((record) => record.meta.guestOnly)) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    if (isLoggedIn()) {
      next({
        path: "/home",
        query: { redirect: to.fullPath },
      });
    } else {
      next();
    }
  } else {
    next(); // make sure to always call next()!
  }
});
export default router;
