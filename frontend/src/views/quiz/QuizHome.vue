<template>
  <v-main class="white">
    <v-container>
      <v-row>
          <v-col cols="12" lg="6" class="mx-auto">
          <v-col v-for="level in levels" v-bind:key="level.level_id">
            <v-sheet height="65vh" rounded="lg" outlined
              ><v-container fluid>
                <v-row align="center" justify="center">
                  <v-col cols="12">
                    <v-row align="center" justify="space-around">
                      <v-col cols="12" sm="6" class="text-center">
                        <v-img
                          :src="level.img"
                          max-width="150px"
                          style="margin-top: 20px"
                          class="d-block ml-auto mr-auto"
                        ></v-img>
                        <v-flex>
                          <div
                            v-for="theme in themes"
                            v-bind:key="theme.theme_id"
                          >
                            <v-card
                              flat
                              v-if="theme.level_id === level.level_id"
                              
                            >
                              <div class="col-md-12">
                                <v-img
                                  max-width="120px"
                                  :src="theme.img"
                                  @click="
                                    openQuestion(
                                      theme.level_id,
                                      theme.theme_id,
                                      user.user_id
                                    )
                                  "
                                  style="margin-top: 10px"
                                  class="ml-auto mr-auto"
                                ></v-img>
                                <h3
                                  class="font-weight-reguler black--text ml-auto mr-auto"
                                  style="margin-top: 10px"
                                >
                                  {{ theme.title }}
                                </h3>
                              </div>
                            </v-card>
                          </div>
                        </v-flex>
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
  justify-content: center;
}
@media only screen and (max-width: 600px) {
  /* For mobile phones: */
  [class*="cols="] {
    width: 100%;
  }
}
</style>
<script>
import axios from "axios";
import { mapGetters } from "vuex";
import api_url from "../../utils/api_url";
export default {
  name: "QuizHome",
  data() {
    return {
      levels: [],
      themes: [],
      answerUsers: [],
    };
  },
  computed: {
    ...mapGetters({
      isLoggedIn: "isLoggedIn",
      user: "user",
    }),
  },
  mounted() {
    this.fetchLevel();
    this.fetchTheme();
    this.checkAnswerByUserID();
  },
  methods: {
    async fetchLevel() {
      try {
        const url = `${api_url}/levels`;
        const response = await axios.get(url);
        const results = response.data;
        this.levels = results.map((level) => ({
          level_id: level.level_id,
          level_name: level.level_name,
          img: require(`@/assets/level${level.level_id}.png`),
        }));
        // console.log(this.levels);
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
    async fetchTheme() {
      try {
        const url = `${api_url}/themes`;
        const response = await axios.get(url);
        const results = response.data;
        // console.log(response.data);
        this.themes = results.map((theme) => ({
          level_id: theme.level_id,
          theme_id: theme.theme_id,
          level_name: theme.level_name,
          theme_name: theme.theme_name,
          img: require(`@/assets/level${theme.level_id}tema${theme.theme_id}.svg`),
          title: theme.theme_name,
        }));
        console.log(this.themes);
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
    openQuestion(level_id, theme_id, user_id) {
      this.$router.push({
        name: "QuestionContent",
        params: { data: { level_id, theme_id, user_id } },
      });
    },
    // check answer that already user answered
    async checkAnswerByUserID() {
      try {
        const url = `${api_url}/answers/${this.user.user_id}`;
        const response = await axios.get(url);
        const results = response.data;
        console.log(response.data)
        this.answerUsers = results.map((answerUser) => ({
          user_id: answerUser.user_id,
          question_id: answerUser.question_id,
          answer: answerUser.answer,
          point: answerUser.point,
          theme_id: answerUser.theme_id
        }));
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
