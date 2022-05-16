<template>
  <v-main>
    <v-container class="pt-15">
      <v-row>
        <v-col lg="6">
          <img src="@/assets/landing-logo.png" alt="teamwork" width="75%" />
        </v-col>
        <v-col lg="6">
          <h2 class="intro-text">Selamat Datang di MENAWI</h2>
          <p class="description-text">
            MENAWI (Mengenal Bahasa Jawi) adalah media pembelajaran bahasa Jawa
            untuk tingkat sekolah dasar berbasis web.
          </p>
          <div class="text-center">
            <v-btn
              color="#58cc02"
              min-width="225px"
              rounded
              @click.prevent="goRegister"
              class="my-4 white--text"
              >Mulai</v-btn
            >
            <br />
            <v-btn
              outlined
              color="indigo"
              class="white--text"
              @click.prevent="goLogin"
              rounded
            >
              Aku sudah punya akun
            </v-btn>
          </div>
        </v-col>
      </v-row>
    </v-container>
  </v-main>
</template>
<script>
export default {
  name: "LandingPage",
  methods: {
    goLogin() {
      this.$router.push({ name: "Login" });
    },
    goRegister() {
      this.$router.push({ name: "Register" });
    },
  },
};
</script>
<style scoped>
.intro-text {
  font-size: 40px;
  font-weight: bold;
  font-family: cursive;
  color: #58cc02;
}
.description-text {
  font-size: 19px;
  font-family: cursive;
  margin: 32px 0;
  color: #000000;
}
</style>
