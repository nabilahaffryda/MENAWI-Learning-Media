<template>
  <v-main class="white">
    <v-container class="top">
      <v-row>
        <v-col cols="12" md="6" class="d-block ml-auto mr-auto">
          <v-sheet height="70vh" rounded="lg" outlined style="margin-top: 20px">
            <v-container fluid>
              <v-row class="d-block ml-auto mr-auto">
                <v-col cols="12" class="d-block ml-auto mr-auto">
                  <v-row align="center" class="d-block ml-auto mr-auto">
                    <v-col cols="12" sm="8" class="d-block ml-auto mr-auto">
                      <h1 style="margin-top: 30px" class="text-center">
                        Edit Profil
                      </h1>
                      <v-divider></v-divider>
                      <form>
                        <v-text-field
                          label="Jeneng"
                          :value="user.name"
                          style="margin-top: 20px"
                          required
                          filled
                        ></v-text-field>
                        <v-text-field
                          style="margin-top: 10px"
                          label="Username"
                          :value="user.username"
                          required
                          filled
                        ></v-text-field>
                        <v-text-field
                          style="margin-top: 10px"
                          type="password"
                          label="Kata Sandi Anyar"
                        ></v-text-field>
                        <v-btn
                          color="success"
                          class="mr-2 float-right"
                          style="margin-top: 20px"
                        >
                          Simpen
                        </v-btn>
                      </form>
                    </v-col>
                  </v-row>
                </v-col>
              </v-row>
            </v-container>
          </v-sheet>
        </v-col>
      </v-row>
    </v-container>
  </v-main>
</template>
<script>
import { mapGetters } from "vuex";
export default {
  name: "Profile",
  computed: {
    ...mapGetters({
      isLoggedIn: "isLoggedIn",
      user: "user",
    }),
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
