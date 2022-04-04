<template>
  <v-main class="white">
    <h1
      class="font-weight-bold black--text text-center"
      style="margin-bottom: 20px; margin-top: 20px"
    >
      MATERI
    </h1>
    <v-container>
      <v-row>
        <v-col>
          <v-sheet min-height="70vh" rounded="lg" outlined
            ><v-container fluid>
              <v-row align="center" justify="center">
                <v-col cols="12">
                  <v-row align="center" justify="space-around">
                    <v-col cols="12" sm="6" class="text-center">
                      <v-img
                        src="@/assets/level1.png"
                        max-width="120px"
                        style="margin-top: 30px"
                        class="d-block ml-auto mr-auto"
                      ></v-img>
                      <v-flex id="themes">
                        <v-col
                          class="text-center"
                          v-for="(theme, i) in themes"
                          :key="i"
                        >
                          <v-card :to="theme.route" flat>
                            <v-img
                              max-width="100px"
                              :src="theme.img"
                              style="margin-top: 30px"
                              class="d-block ml-auto mr-auto"
                            ></v-img>
                          </v-card>
                          <h1 class="font-weight-thin black--text">
                            {{ theme.title }}
                          </h1>
                        </v-col>
                      </v-flex>
                    </v-col>
                  </v-row>
                </v-col>
              </v-row>
            </v-container>
          </v-sheet>
          <v-sheet
            min-height="70vh"
            rounded="lg"
            style="margin-top: 20px"
            outlined
            ><v-container fluid>
              <v-row align="center" justify="center">
                <v-col cols="12">
                  <v-row align="center" justify="space-around">
                    <v-col cols="12" sm="6" class="text-center">
                      <v-img
                        src="@/assets/level2.png"
                        max-width="120px"
                        style="margin-top: 30px"
                        class="d-block ml-auto mr-auto"
                      ></v-img>
                      <v-flex id="themes">
                        <v-col
                          class="text-center"
                          v-for="(theme, i) in themes"
                          :key="i"
                        >
                          <v-card :to="theme.route" flat>
                            <v-img
                              max-width="100px"
                              :src="theme.img"
                              style="margin-top: 30px"
                              class="d-block ml-auto mr-auto"
                            ></v-img>
                          </v-card>
                          <h1 class="font-weight-thin black--text">
                            {{ theme.title }}
                          </h1>
                        </v-col>
                      </v-flex>
                    </v-col>
                  </v-row>
                </v-col>
              </v-row>
            </v-container>
          </v-sheet>
          <v-sheet
            min-height="70vh"
            rounded="lg"
            style="margin-top: 20px"
            outlined
            ><v-container fluid>
              <v-row align="center" justify="center">
                <v-col cols="12">
                  <v-row align="center" justify="space-around">
                    <v-col cols="12" sm="6" class="text-center">
                      <v-img
                        src="@/assets/level3.png"
                        max-width="120px"
                        style="margin-top: 30px"
                        class="d-block ml-auto mr-auto"
                      ></v-img>
                      <v-flex id="themes">
                        <v-col
                          class="text-center"
                          v-for="(theme, i) in themes"
                          :key="i"
                        >
                          <v-card :to="theme.route" flat>
                            <v-img
                              max-width="100px"
                              :src="theme.img"
                              style="margin-top: 30px"
                              class="d-block ml-auto mr-auto"
                            ></v-img>
                          </v-card>
                          <h1 class="font-weight-thin black--text">
                            {{ theme.title }}
                          </h1>
                        </v-col>
                      </v-flex>
                    </v-col>
                  </v-row>
                </v-col>
              </v-row>
            </v-container>
          </v-sheet>
          <v-sheet
            min-height="70vh"
            rounded="lg"
            style="margin-top: 20px"
            outlined
            ><v-container fluid>
              <v-row align="center" justify="center">
                <v-col cols="12">
                  <v-row align="center" justify="space-around">
                    <v-col cols="12" sm="6" class="text-center">
                      <v-img
                        src="@/assets/level4.png"
                        max-width="120px"
                        style="margin-top: 30px"
                        class="d-block ml-auto mr-auto"
                      ></v-img>
                      <v-flex id="themes">
                        <v-col
                          class="text-center"
                          v-for="(theme, i) in themes"
                          :key="i"
                        >
                          <v-card :to="theme.route" flat>
                            <v-img
                              max-width="100px"
                              :src="theme.img"
                              style="margin-top: 30px"
                              class="d-block ml-auto mr-auto"
                            ></v-img>
                          </v-card>
                          <h1 class="font-weight-thin black--text">
                            {{ theme.title }}
                          </h1>
                        </v-col>
                      </v-flex>
                    </v-col>
                  </v-row>
                </v-col>
              </v-row>
            </v-container>
          </v-sheet>
          <v-sheet
            min-height="70vh"
            rounded="lg"
            style="margin-top: 20px"
            outlined
            ><v-container fluid>
              <v-row align="center" justify="center">
                <v-col cols="12">
                  <v-row align="center" justify="space-around">
                    <v-col cols="12" sm="6" class="text-center">
                      <v-img
                        src="@/assets/level5.png"
                        max-width="120px"
                        style="margin-top: 30px"
                        class="d-block ml-auto mr-auto"
                      ></v-img>
                      <v-flex id="themes">
                        <v-col
                          class="text-center"
                          v-for="(theme, i) in themes"
                          :key="i"
                        >
                          <v-card :to="theme.route" flat>
                            <v-img
                              max-width="100px"
                              :src="theme.img"
                              style="margin-top: 30px"
                              class="d-block ml-auto mr-auto"
                            ></v-img>
                          </v-card>
                          <h1 class="font-weight-thin black--text">
                            {{ theme.title }}
                          </h1>
                        </v-col>
                      </v-flex>
                    </v-col>
                  </v-row>
                </v-col>
              </v-row>
            </v-container>
          </v-sheet>
          <v-sheet
            min-height="70vh"
            rounded="lg"
            style="margin-top: 20px"
            outlined
            ><v-container fluid>
              <v-row align="center" justify="center">
                <v-col cols="12">
                  <v-row align="center" justify="space-around">
                    <v-col cols="12" sm="6" class="text-center">
                      <v-img
                        src="@/assets/level6.png"
                        max-width="120px"
                        style="margin-top: 30px"
                        class="d-block ml-auto mr-auto"
                      ></v-img>
                      <v-flex id="themes">
                        <v-col
                          class="text-center"
                          v-for="(theme, i) in themes"
                          :key="i"
                        >
                          <v-card :to="theme.route" flat>
                            <v-img
                              max-width="100px"
                              :src="theme.img"
                              style="margin-top: 30px"
                              class="d-block ml-auto mr-auto"
                            ></v-img>
                          </v-card>
                          <h1 class="font-weight-thin black--text">
                            {{ theme.title }}
                          </h1>
                        </v-col>
                      </v-flex>
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
                    <strong>{{ Math.ceil(targetpoin) }}%</strong>
                  </v-progress-linear>
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
.flex {
  display: flex;
}
</style>
<script>
export default {
  name: "MaterialHome",
  data() {
    return {
      targetpoin: 20,
      themes: [
        {
          img: require("@/assets/tema1.png"),
          title: "Tema 1",
          route: "question",
        },
        {
          img: require("@/assets/tema2.png"),
          title: "Tema 2",
          route: "question",
        },
      ],
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