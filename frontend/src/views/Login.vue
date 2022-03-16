<template>
  <v-container>
    <v-layout wrap style="margin-top: 30px">
      <v-col cols="10" lg="4" class="mx-auto">
        <v-card class="pa-4">
          <div class="text-center">
            <h2 class="indigo--text">Selamat datang kembali!</h2>
            <!-- <v-avatar size="50" color="indigo lighten-4">
              <v-icon size="30" color="indigo">mdi-account</v-icon>
            </v-avatar> -->
          </div>
          <v-form
            @submit.prevent="submitHandler"
            v-model="valid"
            ref="form"
            lazy-validation
          >
            <v-card-text>
              <v-text-field v-model="username" label="Username" required />
              <v-text-field
                v-model="password"
                type="password"
                label="Password"
                required
              />
              <!-- <v-switch label="Remember me" color="indigo"></v-switch> -->
            </v-card-text>
            <v-card-actions class="justify-center">
              <v-btn
                type="submit"
                color="indigo"
                :disabled="!valid"
                class="mr-4"
                @click="validate"
              >
                <span class="white--text px-8">MASUK</span>
              </v-btn>
            </v-card-actions>
          </v-form>
        </v-card>
      </v-col>
    </v-layout>
  </v-container>
</template>
<script>
export default {
  name: "Login",
  data: () => ({
    snackbar: false,
    valid: true,
    usernameRules: [
      (v) => !!v || "Username is required",
      (v) => /.+@.+\..+/.test(v) || "Username must be valid",
    ],
    password: "",
    passwordRules: [
      (v) => !!v || "Password is required",
      (v) => (v && v.length >= 8) || "Password must be 8  characters or more!",
    ],
  }),
  methods: {
    validate() {
      this.$refs.form.validate();
    },
  },
};
</script>