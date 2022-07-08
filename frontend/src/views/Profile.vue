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
                    <v-col cols="12" sm="12" class="d-block ml-auto mr-auto">
                      <h1 style="margin-top: 30px" class="text-center">
                        Edit Profil
                      </h1>
                      <v-divider
                        style="margin-bottom: 50px; margin-top: 10px"
                      ></v-divider>
                      <v-flex>
                        <v-subheader
                          style="
                            margin-right: 65px;
                            font-size: large;
                            color: black;
                            font-weight: bold;
                          "
                          >Jeneng</v-subheader
                        >
                        <v-text-field
                          label="Jeneng"
                          solo
                          type="text "
                          v-model="user.name"
                          readonly
                        ></v-text-field>
                      </v-flex>
                      <v-flex>
                        <v-subheader
                          style="
                            margin-right: 45px;
                            font-size: large;
                            color: black;
                            font-weight: bold;
                          "
                          >Username</v-subheader
                        >
                        <v-text-field
                          label="Username"
                          solo
                          type="text"
                          readonly
                          v-model="user.username"
                        ></v-text-field>
                      </v-flex>
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
