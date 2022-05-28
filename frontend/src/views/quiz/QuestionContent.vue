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
                  class="btnAnswer"
                  v-for="answer in currentQuestion.bank_answer"
                  :index="currentQuestion.key"
                  :key="answer"
                  @click="saveAnswerAPI(answer, user.user_id, currentQuestion)"
                  >{{ answer }}</v-btn
                >
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
          <v-btn
            rounded
            text
            style="margin-top: 30px"
            @click="handleButtonNext()" v-if="answerUsers.length > 0"
            class="primary float-right"
          >
            <h4>Lanjut</h4></v-btn
          >
        </v-col>
      </v-row>
    </v-container>
  </v-main>
</template>
<style>
.flex {
  display: flex;
}
.btnAnswer {
  font-size: 1.1rem;
  box-sizing: border-box;
  padding: 1rem;
  margin: 0.3rem;
  width: 47%;
  background-color: rgba(100, 100, 100, 0.3);
  border: none;
  border-radius: 0.4rem;
  box-shadow: 3px 5px 5px rgba(0, 0, 0, 0.2);
}
.form {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: center;
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
    answerUsers: []
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
      this.checkAnswerByUserID();
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
          question_pict: question.question_pict,
          correct_answer: question.correct_answer,
          bank_answer: question.bank_answer,
          question_id: question.question_id,
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
    handleButtonNext() {
      this.index += 1;
      this.answerUsers = []
    },
    async saveAnswerAPI(answer, user_id, currentQuestion) {
      try {
        const data = {
          user_id: user_id,
          answer: answer,
          question_id: currentQuestion.question_id,
          point: currentQuestion.correct_answer === answer ? 20 : 0,
        };
        const url = `http://localhost:8000/api/answers`;
        const response = await axios.post(url, data, {
          headers: {
            Authorization: "bearer " + localStorage.getItem("token"),
            Accept: "application/json",
            "cache-control": "no-cache",
            "Content-Type": "application/json",
          },
        });
        console.log(response.data);
       this.checkAnswerByUserID();
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
    async checkAnswerByUserID(){
      try {
        const url = `http://localhost:8000/api/answers/${this.$route.params.data.user_id}`;
        const response = await axios.get(url);
        const results = response.data;
        console.log(response.data);
        this.answerUsers = results.map((answerUser) => ({
          user_id: answerUser.user_id,
          question_id: answerUser.question_id,
          answer: answerUser.answer,
          point: answerUser.point,
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
    }
  },
};
</script>
