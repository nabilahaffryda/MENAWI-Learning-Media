<template>
  <v-container>
    <v-layout wrap style="margin-top: 20px">
      <v-col cols="10" lg="4" class="mx-auto">
        <v-card class="pa-8" flat>
          <div class="text-center" style="margin-bottom: 20px">
            <h2 class="indigo--text">Selamat datang kembali!</h2>
            <!-- <v-avatar size="50" color="indigo lighten-4">
              <v-icon size="30" color="indigo">mdi-account</v-icon>
            </v-avatar> -->
          </div>
          <ValidationObserver v-slot="{ submitLogin }">
            <form @submit.prevent="submitLogin">
              <v-card-text class="text-center">
                <ValidationProvider
                  name="username"
                  rules="required"
                  v-slot="{ errors }"
                >
                  <v-text-field
                    filled
                    rounded
                    style="margin-bottom: 13px"
                    hide-details="auto"
                    dense
                    label="Username"
                    v-model="form.username"
                    type="text"
                  >
                  </v-text-field>
                  <p class="text-center red--text">{{ errors[0] }}</p>
                </ValidationProvider>
                <ValidationProvider
                  name="password"
                  rules="required|max:12|min:8"
                  v-slot="{ errors }"
                >
                  <v-text-field
                    filled
                    rounded
                    dense
                    style="margin-bottom: 30px"
                    hide-details="auto"
                    label="Password"
                    v-model="form.password"
                    type="password"
                  >
                  </v-text-field>
                  <p class="text-center red--text">{{ errors[0] }}</p>
                </ValidationProvider>

                <v-btn
                  type="submit"
                  color="indigo"
                  block
                  style="margin-bottom: 15px"
                  filled
                  rounded
                  dense
                  @click="submit()"
                >
                  <span class="white--text px-8">MASUK</span>
                </v-btn>
                <p class="text-center">
                  Tidak punya akun?
                  <router-link to="register">Buat Akun</router-link>
                </p>
              </v-card-text>
            </form>
          </ValidationObserver>
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
        email: "",
        password: "",
      },
    };
  },
  // methods: {
  //   async submit() {
  //     const User = new FormData();
  //     User.append("email", this.form.email);
  //     User.append("password", this.form.password);
  //     try {
  //         await(this.LogIn(User)) ;
  //         this.$router.push("/");
  //     } catch (error) {
  //         console.log(error)
  //     }
  //   },
  // },
};
</script>