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
                      <v-form ref="form">
                        <v-text-field
                          v-model="name"
                          label="Nama" style="margin-top: 20px"
                          required
                        ></v-text-field>
                        <v-text-field
                          v-model="username" style="margin-top: 10px"
                          label="Username"
                          required
                        ></v-text-field>
                        <v-text-field
                          v-model="password" style="margin-top: 10px" type="password"
                          label="Password Baru"
                        ></v-text-field>
                        <v-btn
                          color="success"
                          class="mr-2 float-right" style="margin-top: 20px"
                        >
                          Simpan
                        </v-btn>
                      </v-form>
                      <!-- <h3 class="text-center" style="margin-top: 30px">
                        Username:
                      </h3>
                      <span
                        class="d-block ml-auto mr-auto text-center"
                        style="margin-top: 10px"
                        >{{ user.username }}</span
                      >

                      <h3 class="text-center" style="margin-top: 20px">
                        Jeneng:
                      </h3>
                      <span
                        class="d-block ml-auto mr-auto text-center"
                        style="margin-top: 10px"
                        >{{ user.name }}</span
                      > -->
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
