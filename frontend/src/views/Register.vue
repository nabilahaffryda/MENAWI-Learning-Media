<template>
  <v-container>
    <v-layout wrap style="margin-top: 20px">
      <v-col cols="10" lg="4" class="mx-auto">
        <v-card class="pa-8" flat>
          <div class="text-center" style="margin-bottom: 20px">
            <h2 class="indigo--text">Buat Profilmu</h2>
          </div>
          <form @submit.prevent="register">
            <v-card-text class="text-center">
              <div
                class="alert alert-danger"
                v-for="(error, index) in errors"
                :key="index"
              >
                {{ error[0] }}
              </div>
              <div class="form-group">
                <v-text-field
                  filled
                  rounded
                  style="margin-bottom: 10px"
                  hide-details="auto"
                  dense
                  id="name"
                  class="form-control"
                  label="Name"
                  v-model="form.name"
                  type="text"
                >
                </v-text-field>
              </div>
              <div class="form-group">
                <v-text-field
                  filled
                  rounded
                  style="margin-bottom: 13px"
                  hide-details="auto"
                  dense
                  id="username"
                  class="form-control"
                  label="Username"
                  v-model="form.username"
                  type="text"
                >
                </v-text-field>
              </div>
              <div class="form-group">
                <v-text-field
                  filled
                  rounded
                  dense
                  id="password"
                  class="form-control"
                  style="margin-bottom: 30px"
                  hide-details="auto"
                  label="Password"
                  v-model="form.password"
                  type="password"
                >
                </v-text-field>
              </div>
              <v-btn
                type="submit"
                color="indigo"
                block
                style="margin-bottom: 15px"
                filled
                rounded
                dense
              >
                <span class="white--text px-8">DAFTAR</span>
              </v-btn>
              <p class="text-center">
                Sudah punya akun?
                <router-link to="login">Masuk</router-link>
              </p>
            </v-card-text>
          </form>
        </v-card>
      </v-col>
    </v-layout>
  </v-container>
</template>
<script>
export default {
  name: "Register",
  data() {
    return {
      form: {
        name: "",
        username: "",
        password: "",
      },
      errors: null,
    };
  },
  methods: {
    register: function () {
      this.$store
        .dispatch("register", this.form)
        .then((response) => {
          console.log(response);
          this.$router.push({
            name: "Login",
          });
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
  },
};
</script>
