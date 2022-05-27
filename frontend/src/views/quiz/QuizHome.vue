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
          <v-col v-for="level in levels" v-bind:key="level.level_id">
            <v-sheet max-height="70vh" rounded="lg" outlined
              ><v-container fluid>
                <v-row align="center" justify="center">
                  <v-col cols="12">
                    <v-row align="center" justify="space-around">
                      <v-col cols="12" sm="6" class="text-center">
                        <v-img
                          :src="level.img"
                          max-width="120px"
                          style="margin-top: 20px"
                          class="d-block ml-auto mr-auto"
                        ></v-img>
                        <v-flex justify-center>
                          <div
                            v-for="theme in themes"
                            v-bind:key="theme.theme_id"
                          >
                            <v-card
                              flat
                              v-if="theme.level_id === level.level_id"
                            >
                              <v-img
                                max-width="90px"
                                :src="theme.img"
                                @click="openQuestion(theme.level_id, theme.theme_id)"
                                style="margin-top: 10px"
                                class="d-block ml-auto mr-auto"
                              ></v-img>
                              <h2
                                class="font-weight-thin black--text ml-auto mr-auto"
                                style="margin-top: 10px"
                              ></h2>
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
}
</style>
<script>
import axios from "axios";
export default {
  name: "QuizHome",
  data() {
    return {
      levels: [],
      themes: [],
    };
  },
  mounted() {
    this.fetchLevel();
    this.fetchTheme();
  },
  methods: {
    async fetchLevel() {
      try {
        const url = `http://localhost:8000/api/levels/`;
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
        const url = `http://localhost:8000/api/themes/`;
        const response = await axios.get(url);
        const results = response.data;
        // console.log(response.data);
        this.themes = results.map((theme) => ({
          level_id: theme.level_id,
          theme_id: theme.theme_id,
          level_name: theme.level_name,
          theme_name: theme.theme_name,
          img: require(`@/assets/level${theme.level_id}tema${theme.theme_id}.svg`),
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
    openQuestion(level_id, theme_id) {
      this.$router.push({name: 'QuestionContent', params: {data: {level_id, theme_id}}});
    },
  },
};
</script>
