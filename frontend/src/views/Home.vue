<template>
  <v-main>
    <v-container>
      <v-row>
        <v-col>
          <v-row>
            <v-col cols="12" md="7">
              <!-- 2 opsi aktivitas -->
              <v-sheet
                min-height="75vh"
                rounded="lg"
                outlined
                style="margin-top: 20px"
              >
                <div class="text-center pa-8">
                  <h2 class="black--text">
                    Pilihen salah siji kegiyatan ing ngisor iki!
                  </h2>
                </div>
                <v-container fluid id="features" class="mt-12">
                  <v-row align="center" justify="center">
                    <v-col cols="8">
                      <v-row align="center" justify="space-around">
                        <v-col
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
                            class="font-weight-bold black--text"
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
            <v-col cols="12" md="5">
              <!-- leaderboard -->
              <v-sheet rounded="lg" outlined style="margin-top: 20px" >
                <v-list color="transparent">
                  <v-list-item>
                    <v-list-item-content>
                      <v-list-item-title>
                        <h2 class="text-center">Papan peringkat</h2>
                      </v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>

                  <v-divider></v-divider>
                  <v-virtual-scroll
                    :bench="benched"
                    :items="allanswers"
                    height="300"
                    item-height="64"
                  >
                    <template v-slot:default="{ item }">
                      <v-list-item :key="item.user_id">
                        <v-list-item-action>
                          <v-btn
                            fab
                            small
                            depressed
                            color="white"
                            class="green--text"
                          >
                            {{ allanswers.indexOf(item) + 1 }}
                          </v-btn>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-flex align-center >
                              <strong>{{ item.users.username }}</strong>
                              <v-img
                                src="@/assets/gold.svg"
                                max-width="30px"
                                style="margin-left: 10px"
                                v-if="allanswers.indexOf(item) === 0"
                              ></v-img>
                              <v-img
                                src="@/assets/silver.svg"
                                max-width="30px"
                                style="margin-left: 10px"
                                v-if="allanswers.indexOf(item) === 1"
                              ></v-img>
                              <v-img
                                src="@/assets/bronze.svg"
                                max-width="30px"
                                style="margin-left: 10px"
                                v-if="allanswers.indexOf(item) === 2"
                              ></v-img>
                            </v-flex>
                        </v-list-item-content>
                      <v-list-item-action>
                            {{ item.point }} poin
                      </v-list-item-action>
                      </v-list-item>
                      <v-divider></v-divider>
                    </template>
                  </v-virtual-scroll>
                </v-list>
              </v-sheet>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </v-container>
  </v-main>
</template>
<script>
import { mapGetters } from "vuex";
import axios from "axios";
import api_url from "../utils/api_url";
export default {
  name: "Home",
  data() {
    return {
      features: [
        {
          img: require("@/assets/Materi homepage.svg"),
          title: "Sinau",
          route: "materialhome",
        },
        {
          img: require("@/assets/quiz homepage.svg"),
          title: "Kuis",
          route: "quizhome",
        },
      ],
      allanswers: [],
      benched: 0,
    };
  },
  computed: {
    ...mapGetters({
      isLoggedIn: "isLoggedIn",
      user: "user",
    }),
  },
  mounted() {
    this.getAllAnswerData();
  },
  methods: {
    async getAllAnswerData() {
      try {
        const url = `${api_url}/allanswer`;
        const response = await axios.get(url);
        const results = response.data;
        // this.allanswers = results.map((allanswer) => ({
        //   answer_id: allanswer.answer_id,
        //   user_id: allanswer.user_id,
        //   question_id: allanswer.question_id,
        //   answer: allanswer.answer,
        //   point: allanswer.point,
        // }));
        let temporary = [];

        results.forEach((f) => {
          if (temporary.some((s) => s.user_id === f.user_id)) {
            let index = temporary.findIndex((fi) => fi.user_id === f.user_id);
            temporary[index] = {
              ...f,
              point: temporary[index].point + f.point,
            };
          } else {
            temporary.push(f);
          }
        });
        this.allanswers = temporary.sort((a, b) => b.point - a.point);
      } catch (err) {
        if (err.response) {
          // client received an error response (5xx, 4xx)
          console.log("Server Error:", err);
        } else if (err.request) {
          // client never received a response, or request never left
          console.log("Network Error:", err);
        } else {
          console.log("Client Error:", err);
        }
      }
    },
  },
};
</script>
<style>
@media only screen and (max-width: 600px) {
  /* For mobile phones: */
  [class*="cols="] {
    width: 120%;
  }
}
</style>
