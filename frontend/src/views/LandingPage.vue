<template>
  <v-main>
    <v-container >
      <v-row>
        <v-col cols="12" md="6">
           <div class="text-center" style="margin-top:10px">
          <img src="@/assets/landing-logo.png" width="75%" /></div>
        </v-col>
       <v-col cols="12" md="6">
          <h2 class="intro-text"  style="margin-top:10px">Sugeng rawuh ing MENAWI</h2>
          <p class="description-text">
            MENAWI (Mengenal Basa Jawi) minangka media pamulangan basa Jawa
            kangge murid tingkat SD ingkang berbasis web. Tujuane supaya dadi
            media alternatif pamulangan basa Jawa ingkang bisa digunakake
            dening siswa SD.
          </p>
          <div class="text-center">
            <v-btn
              color="#0D94A8"
              width="200px"
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
              Aku wis duwe akun
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
  font-size: 30px;
  font-weight: bold;
  color: #0D94A8;
  text-align: center;
}
.description-text {
  font-size: 18px;
  margin: 32px 0;
  color: #000000;
  text-align: center;
}

@media only screen and (max-width: 600px) {
/* For mobile phones: */
    [class*="cols="] {
        width: 100%;
    }
}
</style>
