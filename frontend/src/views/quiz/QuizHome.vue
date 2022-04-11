<template>
  <v-main class="white">
    <v-container>
      <v-row>
        <v-col cols="7" class="d-block ml-auto mr-auto">
          <v-img
            class="d-block ml-auto mr-auto"
            max-width="200px"
            src="@/assets/kuis-title.png"
            style="margin-bottom: 20px; margin-top: 20px"
          >
          </v-img>
          <v-sheet min-height="70vh" rounded="lg" outlined
            ><v-container fluid>
              <v-row align="center" justify="center">
                <v-col cols="12">
                  <v-row align="center" justify="space-around">
                    <v-col cols="12" sm="6" class="text-center">
                      <v-img
                        src="@/assets/level1.png"
                        max-width="120px"
                        style="margin-top: 20px"
                        class="d-block ml-auto mr-auto"
                      ></v-img>
                      <!-- <v-divider></v-divider> -->
                      <v-flex id="themes">
                        <v-col
                          class="text-center"
                          v-for="(theme, i) in themes"
                          :key="i"
                        >
                          <v-card :to="theme.route" flat>
                            <v-img
                              max-width="90px"
                              :src="theme.img"
                              style="margin-top: 20px"
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
  name: "QuizHome",
  data() {
    return {
      targetpoin: 20,
      themes: [
        {
          img: require("@/assets/tema1.png"),
          title: "Tema 1",
          route: "questioncontent",
        },
        {
          img: require("@/assets/tema2.png"),
          title: "Tema 2",
          route: "questioncontent",
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