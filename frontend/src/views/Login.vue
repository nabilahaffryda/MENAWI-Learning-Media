<template>
  <v-container>
    <v-layout wrap>
      <v-col cols="12" lg="4" class="mx-auto">
        <v-card class="pa-8" flat>
          <div class="text-center" style="margin-bottom: 10px">
            <h1 style="color: #0d94a8">Sugeng Rawuh</h1>
          </div>
          <v-form
            @submit.prevent="userLogin"
            ref="form"
            v-model="valid"
            lazy-validation
          >
            <v-card-text class="text-center">
              <div class="form-group">
                <v-text-field
                  filled
                  rounded
                  style="margin-bottom: 13px"
                  hide-details="auto"
                  dense
                  required
                  :rules="usernameRules"
                  label="Username"
                  id="username"
                  class="form-control"
                  v-model="form.username"
                  type="text"
                >
                </v-text-field>
              </div>
              <div class="form-group">
                <v-text-field
                  filled
                  rounded
                  required
                  dense
                  :rules="passwordRules"
                  style="margin-bottom: 30px"
                  hide-details="auto"
                  label="Sandi"
                  v-model="form.password"
                  type="password"
                  id="password"
                  class="form-control"
                >
                </v-text-field>
              </div>
              <v-btn
                type="submit"
                color="#0D94A8"
                block
                style="margin-bottom: 15px"
                filled
                :disabled="!valid"
                @click="validate"
                rounded
                dense
              >
                <span class="white--text px-8">MASUK</span>
              </v-btn>
              <p class="text-center">
                Durung nduwe akun?
                <router-link to="register">Nggawe akun</router-link>
              </p>
            </v-card-text>
          </v-form>
        </v-card>
      </v-col>
    </v-layout>
  </v-container>
</template>
<script>
export default {
  name: "Login",
  data() {
    return {
      form: {
        username: "",
        password: "",
      },
      usernameRules: [
        (v) => !!v || "Username dibutuhake",
        (v) => v.length >= 2 || "Username kudu luwih saka 2 aksara",
      ],
      passwordRules: [
        (v) => !!v || "Sandi dibutuhake",
        (v) => v.length >= 8 || "Sandi kudu luwih saka 8 karakter",
      ],
      valid: true
    };
  },
  methods: {
    userLogin() {
      this.$store
        .dispatch("login", this.form)
        .then((response) => {
          console.log(response);
          this.$router.push({ name: "Home" });
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
    validate() {
      this.$refs.form.validate();
    },
  },
};
</script>
<style>
@media only screen and (max-width: 600px) {
  /* For mobile phones: */
  [class*="cols="] {
    width: 100%;
  }
}
</style>
