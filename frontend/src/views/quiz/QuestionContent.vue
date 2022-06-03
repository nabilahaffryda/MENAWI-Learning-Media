<template>
  <v-main class="white"
    ><v-container>
      <v-row>
        <v-col cols="12" lg="8" class="d-block ml-auto mr-auto">
           <v-col cols="12" md="12">
          <v-flex>
            <v-btn
              style="margin-right: 20px; "
              to="quizhome"
              text
              fab small
              ><v-icon>mdi-window-close</v-icon></v-btn
            >
            <!-- user progress based on the questions that have been answered -->
            <v-progress-linear
              rounded
              height="15"
              :value="valueProgress"
              class="d-block ml-auto mr-auto"
              style="margin-top: 10px; margin-bottom: 30px"
            ></v-progress-linear>
          </v-flex></v-col>
          <v-sheet elevation="1" rounded="lg" outlined>
            <v-container fluid>
            <v-col class="text-center">
              <!-- currently displayed question, image and answer -->
              <h1 class="text-center"
                v-html="loading ? 'Loading...' : currentQuestion.question" 
              ></h1>
              <form v-if="currentQuestion">
                <img
                  :src="`https://admin.menawi.com/storage/${currentQuestion.question_pict}`"
                  height="200px"
                  class="d-block ml-auto mr-auto"
                  style="margin-bottom: 10px; margin-top: 10px"
                />
                <!-- When the user answers correctly, the button will turn green -->
                <!-- When the user answers wrong, the button will show which one is wrong in red and which one is correct in green -->
                <!-- disable when user already answer -->
                <!-- system will save answer to api -->
                <v-btn
                  v-for="answer in currentQuestion.bank_answer"
                  :index="currentQuestion.key"
                  :key="answer"
                  class="btnAnswer"
                  v-bind:class="`${getBackground(
                    answer,
                    currentQuestion.correct_answer
                  )}`"
                  :disabled="
                    answerUsers.some(
                      (e) => e.question_id === currentQuestion.question_id
                    )
                  "
                  @click="saveAnswerAPI(answer, user.user_id, currentQuestion)"
                  >{{ answer }}</v-btn
                >
              </form>
            </v-col>
            </v-container>
          </v-sheet>
          <v-divider style="margin-top: 20px"></v-divider>
          <!-- button next -->
          <v-btn
            rounded
            style="margin-top: 20px"
            @click="handleButtonNext()"
            v-if="answerUsers.length > 0 && index < questions.length - 1"
            class="primary float-right"
          >
            <h4>Lanjut</h4></v-btn
          >
          <!-- if user already answer all questions -->
          <v-btn
            rounded
            style="margin-top: 20px"
            @click="handleButtonFinish()"
            v-if="answerUsers.length > 0 && index > 3"
            class="primary float-right"
          >
            <h4>Selesai</h4></v-btn
          >
        </v-col>
        <!-- dialog when user completed quiz -->
        <v-dialog v-model="completedQuiz" max-width="290px" activator="item">
          <v-card justify-center>
            <v-col>
            <v-img
            class="d-block ml-auto mr-auto text-center"
            max-width="150px"
            src="@/assets/horay.png"
            style="margin-bottom: 10px; margin-top: 10px"
          >
          </v-img></v-col>
          <v-card-title class="text-h5 justify-center">Selamat</v-card-title>
            <!-- score calculation -->
            <v-card-text class="text-h6 text-center"
              >Skormu yaiku:
              <strong>
              <span class="highlight">
                {{ answerUsers.reduce((a, b) => a + Number(b.point), 0) }}
              </span></strong></v-card-text
            >
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="green darken-1" text @click="close">OK</v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-row>
    </v-container>
  </v-main>
</template>
<script>
import axios from "axios";
import { mapGetters } from "vuex";
import api_url from "../../utils/api_url";
export default {
  name: "QuestionContent",
  data: () => ({
    questions: [],
    index: 0,
    loading: true,
    answerUsers: [],
    completedQuiz: false,
    valueProgress: 0,
  }),
  computed: {
    // get the current question
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
  watch: {
    // to check whether the user already answer the quiz based theme
    index: {
      handler(newValue) {
        console.log(newValue);
      },
    },
  },
  methods: {
    // get data question by level_id and theme_id
    async fetchLevelTheme() {
      try {
        const url = `${api_url}/levels/${this.$route.params.data.level_id}/themes/${this.$route.params.data.theme_id}`;
        const response = await axios.get(url, {
          headers: {
            "content-type": "multipart/form-data",
          },
        });
        const results = response.data;
        // console.log(response.data);
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

    // to go to next question
    handleButtonNext() {
      if (this.index < this.questions.length - 1) {
        setTimeout(
          function () {
            this.index += 1;
          }.bind(this),
          1000
        );
      }
      if (this.answerUsers.length < 5) {
        // if user already answer and go to next question userAnswer will be left blank
        this.answerUsers = [];
        // value progress value will increase by 20
        this.valueProgress += 20;
      }
    },

    // save answer that user already clicked and check whether the answer is correct or not
    async saveAnswerAPI(answer, user_id, currentQuestion) {
      try {
        // correct answer will get 20 point, wrong answer get 0 point
        const data = {
          user_id: user_id,
          answer: answer,
          question_id: currentQuestion.question_id,
          point: currentQuestion.correct_answer === answer ? 20 : 0,
        };
        const url = `${api_url}/answers`;
        const response = await axios.post(url, data, {
          headers: {
            Authorization: "bearer " + localStorage.getItem("token"),
            Accept: "application/json",
            "cache-control": "no-cache",
            "Content-Type": "application/json",
          },
        });
        console.log(response.data);
        this.checkAnswerByUserID(); //call user answered
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

    // check answer that already user answered
    async checkAnswerByUserID() {
      try {
        const url = `${api_url}/answers/${this.$route.params.data.user_id}`;
        const response = await axios.get(url);
        const results = response.data;
        // console.log(response.data);
        // this.answerUsers = results.map((answerUser) => ({
        //   user_id: answerUser.user_id,
        //   question_id: answerUser.question_id,
        //   answer: answerUser.answer,
        //   point: answerUser.point,
        //   theme_id: answerUser.theme_id,
        // }));
        this.answerUsers = results.filter(f=>f.theme_id === this.$route.params.data.theme_id)
        if (results.filter(f=>f.theme_id === this.$route.params.data.theme_id).length > 4) {
          this.valueProgress = 100;
        }
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

    // change background based answer
    getBackground(answer, correct_answer) {
      if (this.answerUsers.length) {
        if (
          this.answerUsers[this.index].answer === correct_answer &&
          this.answerUsers[this.index].answer === answer
        ) {
          return "rightAnswer"; //if user answered correctly the button will be green
        } else if (
          this.answerUsers[this.index].answer !== correct_answer &&
          this.answerUsers[this.index].answer === answer
        ) {
          return "wrongAnswer"; //if user answered wrongly the button will be green
        } else if (
          this.answerUsers[this.index].answer !== correct_answer &&
          correct_answer === answer
        ) {
          return "rightAnswer"; //if user answered wrongly the button will be show which one is right and which one is wrong
        }
      } else {
        return;
      }
    },

    // open completed dialog
    handleButtonFinish() {
      this.completedQuiz = true;
    },

    // close dialog completed dialog
    close() {
      this.completedQuiz = false;
      this.$router.push("/quizhome");
    },
  },
};
</script>
<style>
.flex {
  display: flex;
}
.btnAnswer:hover:enabled {
  transform: scale(1.02);
  box-shadow: 0 3px 3px 0 rgba(0, 0, 0, 0.14), 0 1px 7px 0 rgba(0, 0, 0, 0.12),
    0 3px 1px -1px rgba(0, 0, 0, 0.2);
}

.btnAnswer:focus {
  outline: none;
}

.btnAnswer:active:enabled {
  transform: scale(1.05);
}
.btnAnswer {
  font-size: 0.7rem;
  box-sizing: border-box;
  padding: 1rem;
  margin: 0.3rem;
  width: 47%;
  background-color: rgba(100, 100, 100, 0.3);
  border: none;
  border-radius: 0.4rem;
  box-shadow: 3px 5px 5px rgba(0, 0, 0, 0.2);
}
@keyframes flashButton {
  0% {
    opacity: 1;
    transform: scale(1.01);
  }
  50% {
    opacity: 0.7;
    transform: scale(1.02);
  }
  100% {
    opacity: 1;
    transform: scale(1);
  }
}

.btnAnswer.clicked {
  pointer-events: none;
}

.btnAnswer.rightAnswer {
  animation: flashButton;
  animation-duration: 700ms;
  animation-delay: 200ms;
  animation-iteration-count: 3;
  animation-timing-function: ease-in-out;
  color: black;
  background: linear-gradient(
    210deg,
    rgba(0, 178, 72, 0.25),
    rgba(0, 178, 72, 0.5)
  );
}

.btnAnswer.wrongAnswer {
  color: black;
  background: linear-gradient(
    210deg,
    rgba(245, 0, 87, 0.25),
    rgba(245, 0, 87, 0.5)
  );
}

.btnAnswer.showRightAnswer {
  animation: flashButton;
  animation-duration: 700ms;
  animation-delay: 200ms;
  animation-iteration-count: 2;
  animation-timing-function: ease-in-out;
  color: black;
  background: linear-gradient(
    210deg,
    rgba(0, 178, 72, 0.25),
    rgba(0, 178, 72, 0.5)
  );
}
@media only screen and (max-width: 600px) {
  /* For mobile phones: */
  [class*="cols="] {
    width: 100%;
  }
}
</style>
