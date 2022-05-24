import Vue from "vue";
import App from "./App.vue";
import vuetify from "./plugins/vuetify";
import router from "./router";
import axios from "axios";
import store from "./store";

import { setHeaderToken } from "./utils/auth";
axios.defaults.baseURL = "http://localhost:8000/api/";
Vue.config.productionTip = false;
const token = localStorage.getItem("token");

if (token) {
  setHeaderToken(token);
}

store
  .dispatch("get_user", token)
  .then(() => {
    new Vue({
      router,
      vuetify,
      store,
      render: (h) => h(App),
    }).$mount("#app");
  })
  .catch((error) => {
    console.error(error);
  });
// new Vue({
//   vuetify,
//   router,
//   render: (h) => h(App),
// }).$mount("#app");
