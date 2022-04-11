<template>
  <v-main class="white">
    <v-container>
      <v-row>
        <v-col>
          <!-- 2 opsi aktivitas -->
          <v-sheet min-height="90vh" rounded="lg">
            <div class="text-center pa-8">
              <h2 class="black--text">
                Pilih salah satu aktivitas di bawah ini!
              </h2>
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
                      <v-card flat :to="feature.route" rounded-0>
                        <v-img
                          :src="feature.img"
                          max-width="150px"
                          class="d-block ml-auto mr-auto"
                        ></v-img>
                      </v-card>
                      <h1
                        class="font-weight-thin black--text"
                        style="margin-top: 20px"
                      >
                        {{ feature.title }}
                      </h1>
                    </v-col>
                  </v-row>
                </v-col>
              </v-row>
            </v-container>
          </v-sheet>
        </v-col>
        <v-col cols="3">
          <!-- leaderboard -->
          <v-sheet rounded="lg" outlined>
            <v-list color="transparent">
              <v-list-item>
                <v-list-item-content>
                  <v-list-item-title>
                    <h2 class="text-center">Leaderboard</h2>
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>

              <v-divider></v-divider>
              <v-virtual-scroll
                :bench="benched"
                :items="items"
                height="250"
                item-height="64"
              >
                <template v-slot:default="{ item }">
                  <v-list-item :key="item">
                    <v-list-item-action>
                      <v-btn
                        fab
                        small
                        depressed
                        color="white"
                        class="green--text"
                      >
                        {{ item }}
                      </v-btn>
                    </v-list-item-action>

                    <v-list-item-content>
                      <v-list-item-title> nama </v-list-item-title>
                    </v-list-item-content>

                    <v-list-item-content>
                      <v-list-item-title> 100 poin </v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>

                  <v-divider></v-divider>
                </template>
              </v-virtual-scroll>
            </v-list>
          </v-sheet>
          <!-- progress point -->
          <v-sheet rounded="lg" style="margin-top: 20px" outlined>
            <v-list color="transparent">
              <v-list-item>
                <v-list-item-content>
                  <v-list-item-title>
                    <h2 class="text-center">Progess Point</h2>
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>

              <v-divider class="my-2"></v-divider>

              <v-list-item color="grey lighten-4">
                <v-list-item-avatar>
                  <img
                    src="https://cdn.vuetifyjs.com/images/john.jpg"
                    alt="John"
                  />
                </v-list-item-avatar>
                <v-list-item-content>
                  <v-list-item-title>Target poin</v-list-item-title>
                  <v-progress-linear
                    v-model="targetpoin"
                    color="blue-grey"
                    height="20"
                    rounded
                  >
                    <!-- <template v-slot:default="{ value }">
                        <strong>{{ Math.ceil(value) }}%</strong>
                      </template> -->
                    <strong>{{ Math.ceil(targetpoin) }}%</strong>
                  </v-progress-linear>
                </v-list-item-content>
                <!-- <v-list-item-content
                  ><v-list-item-title>0/20 XP</v-list-item-title>
                </v-list-item-content> -->
              </v-list-item>
            </v-list>
          </v-sheet>
        </v-col>
      </v-row>
    </v-container>
  </v-main>
</template>
<script>
export default {
  name: "Home",
  data() {
    return {
      features: [
        {
          img: require("@/assets/materi.png"),
          title: "BELAJAR",
          route: "materialhome",
        },
        {
          img: require("@/assets/kuis.png"),
          title: "KUIS",
          route: "quizhome",
        },
      ],
      benched: 0,
      targetpoin: 20,
    };
  },
  computed: {
    items() {
      return Array.from({ length: this.length }, (k, v) => v + 1);
    },
    length() {
      return 20;
    },
  },
};
</script>