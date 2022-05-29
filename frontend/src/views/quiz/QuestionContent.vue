<template>
  <v-main class="white"
    ><v-container>
      <v-row>
        <v-col cols="8" class="d-block ml-auto mr-auto">
          
            <v-btn
              style="margin-top: 10px; margin-bottom: 10px;"
              to="quizhome"
              text 
              fab
              ><v-icon>mdi-window-close</v-icon></v-btn
            >
          <v-sheet height="60vh" rounded="lg" outlined>
            <div class="text-center">
              <h1
                v-html="loading ? 'Loading...' : currentQuestion.question"
              ></h1>

              <form v-if="currentQuestion">
                <img
                  :src="`http://localhost:8000/storage/${currentQuestion.question_pict}`"
                  alt="Question Picture"
                  height="150px"
                  class="d-block ml-auto mr-auto"
                  style="margin-bottom: 20px; margin: top 20px"
                />
                <v-btn
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
          <v-divider style="margin-top: 20px"></v-divider>
          <v-btn
            rounded
            style="margin-top: 20px"
            class="float-left"
          >
            <h4 class="dark grey--text">LOMPATI</h4></v-btn
          >
          <v-btn
            rounded
            style="margin-top: 20px"
            @click="handleButtonNext()"
            v-if="answerUsers.length > 0"
            class="primary float-right"
          >
            <h4>Lanjut</h4></v-btn
          >
        </v-col>
      </v-row>
    </v-container>
  </v-main>
</template>
<script>
import axios from "axios";
import { mapGetters } from "vuex";
export default {
  name: "QuestionContent",
  data: () => ({
    questions: [],
    index: 0,
    loading: true,
    answerUsers: [],
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
    quizCompleted() {
      if (this.questions.length === 0) {
        return false;
      }
      /* Check if all questions have been answered */
      let questionsAnswered = 0;
      this.questions.forEach(function (question) {
        question.rightAnswer !== null ? questionsAnswered++ : null;
      });
      return questionsAnswered === this.questions.length;
    },
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
        const response = await axios.get(url, {
          headers: {
            "content-type": "multipart/form-data",
          },
        });
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
        console.log(this.currentQuestion);
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
      if (this.index < this.questions.length - 1) {
        setTimeout(
          function () {
            this.index += 1;
          }.bind(this),
          1000
        );
      }
      this.answerUsers = [];
    },
    async saveAnswerAPI(answer, user_id, currentQuestion) {
      try {
        const data = {
          user_id: user_id,
          answer: answer,
          question_id: currentQuestion.question_id,
          point: currentQuestion.correct_answer === answer ? 20 : 0,
        };
        // let index = event.target.getAttribute("index");
        // let pollutedUserAnswer = event.target.innerHTML; // innerHTML is polluted with decoded HTML entities e.g ' from &#039;
        // /* Clear from pollution with ' */
        // let userAnswer = pollutedUserAnswer.replace(/'/, "&#039;");
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
        /* Set userAnswer on question object in data */
        // this.questions[index].answer = userAnswer;
        // /* Set class "clicked" on button with userAnswer -> for CSS Styles; Disable other sibling buttons */
        // event.target.classList.add("clicked");
        // console.log(response.data);
        // let allButtons = document.querySelectorAll(`[index="${index}"]`);

        // for (let i = 0; i < allButtons.length; i++) {
        //   if (allButtons[i] === event.target) continue;

        //   allButtons[i].setAttribute("disabled", "");
        // }

        // /* Invoke checkAnswer to check Answer */
        // this.checkAnswer(event, index);
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
    async checkAnswerByUserID() {
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
    },
    // checkAnswer(event, index) {
    //   let question = this.questions[index];
    //   if (question.userAnswer) {
    //     if (question.userAnswer === question.correct_answer) {
    //       /* Set class on Button if user answered right, to celebrate right answer with animation joyfulButton */
    //       event.target.classList.add("rightAnswer");
    //       /* Set rightAnswer on question to true, computed property can track a streak out of 10 questions */
    //       this.questions[index].rightAnswer = true;
    //     } else {
    //       /* Mark users answer as wrong answer */
    //       event.target.classList.add("wrongAnswer");
    //       this.questions[index].rightAnswer = false;
    //       /* Show right Answer */
    //       let correctAnswer = this.questions[index].correct_answer;
    //       let allButtons = document.querySelectorAll(`[index="${index}"]`);
    //       allButtons.forEach(function (button) {
    //         if (button.innerHTML === correctAnswer) {
    //           button.classList.add("showRightAnswer");
    //         }
    //       });
    //     }
    //   }
    // },
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
h1 {
  padding: 0.7rem;
}
</style>
