<template>
  <v-main class="white"
    ><v-container>
      <v-row>
        <v-col cols="8" class="d-block ml-auto mr-auto">
          <v-flex>
            <v-btn
              style="margin-right: 20px; margin-top: 10px"
              to="quizhome"
              text
              fab
              ><v-icon>mdi-window-close</v-icon></v-btn
            >
            <v-progress-linear
              rounded
              height="15"
              value="20"
              class="d-block ml-auto mr-auto"
              style="margin-top: 30px; margin-bottom: 30px"
            ></v-progress-linear>
          </v-flex>
          <v-sheet min-height="55vh" rounded="lg" outlined>
            <div class="text-center">
              <h1
                v-html="loading ? 'Loading...' : currentQuestion.question"
              ></h1>
              <img
                src="@/assets/kuis.png"
                alt="Question Picture"
                height="150px"
                class="d-block ml-auto mr-auto"
                style="margin-bottom: 10px; margin: top 10px"
              />
              <form v-if="currentQuestion">
                <v-btn
                  outlined
                  color="primary"
                  dark
                  v-for="answer in currentQuestion.bank_answer"
                  :index="currentQuestion.key"
                  :key="answer"
                  >{{answer}}</v-btn
                >
                <h1> {{ user.user_id }}</h1>
              </form>
            </div>
          </v-sheet>
          <v-divider style="margin-top: 30px"></v-divider>
          <v-btn
            color="white"
            text
            rounded
            outlined
            style="margin-top: 30px"
            class="float-left"
          >
            <h4 class="dark grey--text">LOMPATI</h4></v-btn
          >
          <v-bottom-sheet v-model="sheet" inset>
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                rounded
                text
                style="margin-top: 30px"
                v-bind="attrs"
                v-on="on"
                class="primary float-right" 
              >
                <h4>PERIKSA</h4></v-btn
              >
            </template>
            <v-sheet class="text-center" height="120px">
              <v-flex justify-center>
                <div class="mt-10" style="margin-right: 50px">
                  Jawaban benar
                </div>
                <v-btn class="mt-10" color="green" dark> Lanjutkan </v-btn>
              </v-flex>
            </v-sheet>
          </v-bottom-sheet>
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
import { mapGetters } from "vuex";
export default {
  name: "QuestionContent",
  data: () => ({
    sheet: false,
    questions: [],
    index: 0,
    loading: true,
  }),
  
  computed: {
    currentQuestion() {
      if (this.questions !== []) {
        return this.questions[this.index];
      }
      return null;
    },
    ...mapGetters({
      isLoggedIn: "isLoggedIn",
      user: "user",
    }),
  },
  mounted() {
    if (this.$route.params.data) {
      this.fetchLevelTheme();
    } else {
      this.$router.push("/quizhome");
    }
  },
  methods: {
    async fetchLevelTheme() {
      try {
        const url = `http://localhost:8000/api/levels/${this.$route.params.data.level_id}/themes/${this.$route.params.data.theme_id}`;
        const response = await axios.get(url);
        const results = response.data;
        console.log(response.data);
        this.questions = results.map((question) => ({
          level_id: question.level_id,
          theme_id: question.theme_id,
          question: question.question,
          question_pict : question.question_pict,
          correct_answer: question.correct_answer,
          bank_answer: question.bank_answer,
          question_id: question.question_id
        }));
        this.loading = false;
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
    checkAnswer() {
      
    },
  },
};
</script>
