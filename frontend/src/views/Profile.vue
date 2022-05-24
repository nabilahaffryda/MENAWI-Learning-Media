<template>
  <v-main class="white">
    <v-container>
      <v-row>
        <v-col cols="7" class="d-block ml-auto mr-auto">
          <v-sheet
            min-height="80vh"
            rounded="lg"
            outlined
            style="margin-top: 20px"
          >
            <v-container fluid>
              <v-flex>
                <v-avatar
                  color="primary"
                  size="100"
                  style="margin-top: 40px; margin-left: 20px"
                >
                  <span class="white--text text-h5">CJ</span>
                </v-avatar>
                <h1 style="margin-top: 60px; margin-left: 20px">
                  {{ user.name }}
                </h1>
                <v-btn
                  rounded
                  depressed
                  color="success"
                  style="margin-top: 65px; margin-left: 200px"
                >
                  <h4>Simpan Perubahan</h4></v-btn
                >
              </v-flex>
              <v-divider style="margin-top: 30px"></v-divider>
              <v-row align="center" justify="center">
                <v-col cols="12">
                  <v-row align="center" justify="space-around">
                    <v-col cols="12" sm="10">
                      <v-flex>
                        <h3 style="margin-top: 30px">Username</h3>
                        <v-col
                          md="10"
                          style="margin-left: 35px; margin-top: 10px"
                        >
                          <h4 style="margin-top: 10px">{{ user.username }}</h4>
                        </v-col>
                      </v-flex>
                      <v-flex>
                        <h3 style="margin-top: 20px">Nama</h3>
                        <v-col md="10" style="margin-left: 70px">
                          <h4 style="margin-top: 10px">{{ user.name }}</h4>
                        </v-col>
                      </v-flex>
                      <v-flex>
                        <h3 style="margin-top: 20px">Belajar Sejak</h3>
                        <v-col
                          md="6"
                          style="margin-left: 10px; margin-top: 10px"
                        >
                          <h4 class="grey--text">20202</h4>
                        </v-col>
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
