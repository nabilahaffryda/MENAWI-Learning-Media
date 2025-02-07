import axios from "axios";
import { setHeaderToken } from "../utils/auth";
import { removeHeaderToken } from "../utils/auth";
export default {
  state: {
    user: null,
    isLoggedIn: false,
  },
  mutations: {
    set_user(state, data) {
      state.user = data;
      state.isLoggedIn = true;
    },
    reset_user(state) {
      state.user = null;
      state.isLoggedIn = false;
    },
  },
  getters: {
    isLoggedIn(state) {
      return state.isLoggedIn;
    },
    user(state) {
      return state.user;
    },
  },
  actions: {
    login({ dispatch, commit }, data) {
      return new Promise((resolve, reject) => {
        axios
          .post("login", data)
          .then((response) => {
            const token = response.data.token;
            dispatch("getCurrentUser")
            const user = response.data.user;
            localStorage.setItem("token", token);
            localStorage.setItem("user", JSON.stringify(user));
            console.log(response.data)
            setHeaderToken(token);
            dispatch("get_user");
            resolve(response);
          })
          .catch((err) => {
            commit("reset_user");
            localStorage.removeItem("token");
            localStorage.removeItem("user");
            reject(err);
          });
      });
    },
    async getCurrentUser(){
      return JSON.parse(localStorage.getItem("user"))
    },
    async get_user({ commit }) {
      if (!localStorage.getItem("token")) {
        return;
      }
      try {
        let response = await axios.get("user");
        commit("set_user", response.data.data);
      } catch (error) {
        commit("reset_user");
        removeHeaderToken();
        localStorage.removeItem("token");
        localStorage.removeItem("user");
        return error;
      }
    },
    logout({ commit,data }) {
      return new Promise((resolve, reject) => {
        axios
          .post("logout", data)
          .then((resp) => {
            resolve(resp);
            commit("reset_user");
            localStorage.removeItem("token");
            localStorage.removeItem("user");
            removeHeaderToken();
            resolve();
          })
          .catch((err) => {
            commit("reset_user");
            localStorage.removeItem("token");
            localStorage.removeItem("user");
            removeHeaderToken();
            resolve();
            reject(err);
          });
       
      });
    },
    register({ commit }, data) {
      return new Promise((resolve, reject) => {
        axios
          .post("register", data)
          .then((resp) => {
            resolve(resp);
          })
          .catch((err) => {
            commit("reset_user");
            reject(err);
          });
      });
    },
  },
};
