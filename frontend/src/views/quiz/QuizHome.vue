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
          <v-col v-for="item in items" v-bind:key="item.id">
            <v-sheet min-height="60vh" rounded="lg" outlined
              ><v-container fluid>
                <v-row align="center" justify="center">
                  <v-col cols="12">
                    <v-row align="center" justify="space-around">
                      <v-col cols="12" sm="6" class="text-center">
                        <v-img
                          :src="item.img"
                          max-width="120px"
                          style="margin-top: 20px"
                          class="d-block ml-auto mr-auto"
                        ></v-img>
                        <v-col class="text-center">
                          <v-flex>
                            <v-card :to="item.route" flat>
                              <v-img
                                max-width="90px"
                                :src="item.tema1"
                                style="margin-top: 20px"
                                class="d-block ml-auto mr-auto"
                              ></v-img>
                              <h1
                                class="font-weight-thin black--text ml-auto mr-auto"
                              >
                                {{ item.title1 }}
                              </h1>
                            </v-card>
                            <v-card
                              flat
                              :to="item.route"
                              style="margin-left: 60px"
                            >
                              <v-img
                                max-width="90px"
                                :src="item.tema2"
                                style="margin-top: 20px"
                                class="d-block ml-auto mr-auto"
                              ></v-img>
                              <h1
                                class="font-weight-thin black--text ml-auto mr-auto"
                              >
                                {{ item.title2 }}
                              </h1>
                            </v-card>
                          </v-flex>
                        </v-col>
                      </v-col>
                    </v-row>
                  </v-col>
                </v-row>
              </v-container>
            </v-sheet>
          </v-col>
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
      items: [
        {
          id: 1,
          img: require("@/assets/level1.png"),
          tema1: require("@/assets/tema1.png"),
          title1: "Tema 1",
          route: "questioncontent",
          tema2: require("@/assets/tema2.png"),
          title2: "Tema 2",
        },
        {
          id: 2,
          img: require("@/assets/level2.png"),
          tema1: require("@/assets/tema1.png"),
          title1: "Tema 1",
          route: "questioncontent",
          tema2: require("@/assets/tema2.png"),
          title2: "Tema 2",
        },
        {
          id: 3,
          img: require("@/assets/level3.png"),
          tema1: require("@/assets/tema1.png"),
          title1: "Tema 1",
          route: "questioncontent",
          tema2: require("@/assets/tema2.png"),
          title2: "Tema 2",
        },
        {
          id: 4,
          img: require("@/assets/level4.png"),
          tema1: require("@/assets/tema1.png"),
          title1: "Tema 1",
          route: "questioncontent",
          tema2: require("@/assets/tema2.png"),
          title2: "Tema 2",
        },
        {
          id: 5,
          img: require("@/assets/level5.png"),
          tema1: require("@/assets/tema1.png"),
          title1: "Tema 1",
          route: "questioncontent",
          tema2: require("@/assets/tema2.png"),
          title2: "Tema 2",
        },
        {
          id: 6,
          img: require("@/assets/level6.png"),
          tema1: require("@/assets/tema1.png"),
          title1: "Tema 1",
          route: "questioncontent",
          tema2: require("@/assets/tema2.png"),
          title2: "Tema 2",
        },
      ],
    };
  },
};
</script>
