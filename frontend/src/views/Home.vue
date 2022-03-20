<template>
  <v-main class="grey lighten-3">
    <v-container>
      <v-row>
        <v-col>
          <v-sheet min-height="90vh" rounded="lg">
            <div class="text-center pa-8">
              <h2 class="indigo--text">Pilih salah satu aktivitas</h2>
            </div>
            <v-container fluid id="features" class="mt-12">
              <v-row align="center" justify="center">
                <v-col cols="10">
                  <v-row align="center" justify="space-around">
                    <v-col
                      cols="12"
                      sm="4"
                      class="text-center"
                      v-for="(feature, i) in features"
                      :key="i"
                    >
                      <v-hover v-slot:default="{ hover }">
                        <v-card
                          class="card"
                          shaped
                          :elevation="hover ? 10 : 4"
                          :class="{ up: hover }"
                          id="rounded-card"
                          :to="feature.route"
                        >
                          <v-img
                            :src="feature.img"
                            max-width="100px"
                            class="d-block ml-auto mr-auto"
                            :class="{ 'zoom-efect': hover }"
                          ></v-img>
                          <h1 class="font-weight-regular indigo--text">
                            {{ feature.title }}
                          </h1>
                          <h4 class="font-weight-regular subtitle-1">
                            {{ feature.text }}
                          </h4>
                        </v-card>
                      </v-hover>
                    </v-col>
                  </v-row>
                </v-col>
              </v-row>
            </v-container>
            <!-- <v-row class="mb-6" no-gutters>
              <v-col md="4" offset-md="4">
                <v-btn class="mx-2" fab dark large color="orange">
                  <v-icon dark> mdi-book-open-page-variant-outline </v-icon>
                </v-btn>
                <h2 class="indigo--text">Materi</h2>

                <v-btn class="mx-2" fab dark large color="green">
                  <v-icon dark> mdi-help </v-icon>
                </v-btn>
                <h2 class="indigo--text">Kuis</h2>
              </v-col>
            </v-row> -->
          </v-sheet>
        </v-col>
        <v-col cols="3">
          <!-- leaderboard -->
          <v-sheet rounded="lg">
            <v-list color="transparent">
              <v-list-item v-for="n in 5" :key="n" link>
                <v-list-item-content>
                  <v-list-item-title> List Item {{ n }} </v-list-item-title>
                </v-list-item-content>
              </v-list-item>

              <v-divider class="my-2"></v-divider>

              <v-list-item link color="grey lighten-4">
                <v-list-item-content>
                  <v-list-item-title> Refresh </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </v-list>
          </v-sheet>
          <!-- progress point -->
          <v-sheet rounded="lg" style="margin-top: 20px">
            <v-list color="transparent">
              <v-list-item v-for="n in 5" :key="n" link>
                <v-list-item-content>
                  <v-list-item-title> List Item {{ n }} </v-list-item-title>
                </v-list-item-content>
              </v-list-item>

              <v-divider class="my-2"></v-divider>

              <v-list-item link color="grey lighten-4">
                <v-list-item-content>
                  <v-list-item-title> Refresh </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </v-list>
          </v-sheet>
        </v-col>
      </v-row>
    </v-container>
  </v-main>
</template>
<style>
#rounded-card {
  border-radius: 50%;
  min-height: 230px;
  min-width: 230px;
}
</style>
<script>
export default {
  name: "Home",
  data() {
    return {
      features: [
        {
          img: require("@/assets/img/icon2.png"),
          title: "Materi",
          text: "Pahami materi dulu yuk!",
          route: "materialhome",
        },
        {
          img: require("@/assets/img/icon1.png"),
          title: "Kuis",
          text: "Ayo kita mainkan kuisnya!",
          route: "quizhome",
        },
      ],
    };
  },
};
</script>