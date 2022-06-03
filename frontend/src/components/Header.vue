<template>
  <div>
    <v-toolbar flat outlined class="px-8">
      <v-spacer></v-spacer>
      <v-toolbar-title>
        <v-btn text to="/" color="white">
          <v-img src="@/assets/logo1.png" width="55px" height="55px" />
        </v-btn>
      </v-toolbar-title>
      <v-spacer /><v-spacer></v-spacer>
      <!-- home -->
      <v-btn text to="home" v-if="isLoggedIn">
        <v-icon color="orange darken-3">mdi-home</v-icon>
      </v-btn>
      <!-- level -->
      <v-menu
        v-if="isLoggedIn"
        :close-on-content-click="false"
        :nudge-width="150"
        offset-y
      >
        <template v-slot:activator="{ on, attrs }">
          <v-btn text v-bind="attrs" v-on="on">
            <v-icon color="yellow darken-1">mdi-trophy</v-icon>
          </v-btn>
        </template>
        <v-card>
          <v-list>
            <v-list-item>
              <!-- level avatar -->
              <v-list-item-avatar>
                <v-img
                  src="@/assets/badge1.png"
                  max-width="50px"
                  v-if="
                    answerUsers[answerUsers.length - 1] === 1 ||
                    answerUsers.length === 0
                  "
                />
                <v-img
                  src="@/assets/badge2.png"
                  max-width="50px"
                  v-if="answerUsers[answerUsers.length - 1] === 2"
                />
                <v-img
                  src="@/assets/badge3.png"
                  max-width="50px"
                  v-if="answerUsers[answerUsers.length - 1] === 3"
                />
                <v-img
                  src="@/assets/badge4.png"
                  max-width="50px"
                  v-if="answerUsers[answerUsers.length - 1] === 4"
                />
                <v-img
                  src="@/assets/badge5.png"
                  max-width="50px"
                  v-if="answerUsers[answerUsers.length - 1] === 5"
                />
                <v-img
                  src="@/assets/badge6.png"
                  max-width="50px"
                  v-if="answerUsers[answerUsers.length - 1] === 6"
                />
              </v-list-item-avatar>
              <v-list-item-content>
                <v-list-item-title>
                  <strong
                    >LEVEL
                    {{
                      answerUsers.length
                        ? answerUsers[answerUsers.length - 1]
                        : 1
                    }}</strong
                  >
                </v-list-item-title>
                <v-list-item-subtitle
                  >Mundhakaken tingkat skill!</v-list-item-subtitle
                >
              </v-list-item-content>
            </v-list-item>
          </v-list>
        </v-card>
      </v-menu>

      <!-- account-->
      <v-menu
        :close-on-content-click="false"
        offset-y
        :nudge-width="150"
        v-if="isLoggedIn"
      >
        <template v-slot:activator="{ on, attrs }">
          <v-btn text v-bind="attrs" v-on="on">
            <v-icon color="blue">mdi-account</v-icon>
          </v-btn>
        </template>
        <v-card>
          <v-list>
            <v-list-item>
              <v-list-item-title> <strong>AKUN</strong></v-list-item-title>
            </v-list-item>
            <v-divider />
            <v-list-item to="profile">
              <v-list-item-title>Profilmu</v-list-item-title>
            </v-list-item>
            <v-divider />
            <v-list-item @click="logoutDialog()">
              <v-list-item-title>Metu</v-list-item-title>
            </v-list-item>
          </v-list>
        </v-card>
      </v-menu>
      <v-dialog v-model="dialogLogout" max-width="290px" activator="item">
        <v-card>
          <v-card-title class="text-h5">Konfirmasi</v-card-title>
          <v-card-text>Apa yakin arep metu?</v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="green darken-1" text @click="close">Batal</v-btn>
            <v-btn color="green darken-1" type="submit" text @click="logout"
              >Oke</v-btn
            >
          </v-card-actions>
        </v-card>
      </v-dialog>
      <v-spacer />
    </v-toolbar>
  </div>
</template>

<style scoped>
.v-toolbar {
  transition: 0.6s;
}

.expand {
  height: 80px !important;
  padding-top: 10px;
}
[class*="col-"] {
  width: 100%;
}

@media only screen and (min-width: 600px) {
  /* For tablets: */
  .col-s-1 {
    width: 8.33%;
  }
  .col-s-2 {
    width: 16.66%;
  }
  .col-s-3 {
    width: 25%;
  }
  .col-s-4 {
    width: 33.33%;
  }
  .col-s-5 {
    width: 41.66%;
  }
  .col-s-6 {
    width: 50%;
  }
  .col-s-7 {
    width: 58.33%;
  }
  .col-s-8 {
    width: 66.66%;
  }
  .col-s-9 {
    width: 75%;
  }
  .col-s-10 {
    width: 83.33%;
  }
  .col-s-11 {
    width: 91.66%;
  }
  .col-s-12 {
    width: 100%;
  }
}

@media only screen and (min-width: 768px) {
  /* For desktop: */
  .col-1 {
    width: 8.33%;
  }
  .col-2 {
    width: 16.66%;
  }
  .col-3 {
    width: 25%;
  }
  .col-4 {
    width: 33.33%;
  }
  .col-5 {
    width: 41.66%;
  }
  .col-6 {
    width: 50%;
  }
  .col-7 {
    width: 58.33%;
  }
  .col-8 {
    width: 66.66%;
  }
  .col-9 {
    width: 75%;
  }
  .col-10 {
    width: 83.33%;
  }
  .col-11 {
    width: 91.66%;
  }
  .col-12 {
    width: 100%;
  }
}
</style>

<script>
import { mapGetters } from "vuex";
import axios from "axios";
import api_url from "../utils/api_url";
export default {
  name: "Header",
  data() {
    return {
      dialogLogout: false,
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
    this.checkAnswerByUserID();
  },
  watch: {
    answerUsers: {
      handler(newValue) {
        console.log(newValue);
      },
    },
  },
  methods: {
    close() {
      this.dialogLogout = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },
    logoutDialog() {
      this.dialogLogout = true;
    },
    logout: function () {
      this.$store.dispatch("logout").then(() => {
        this.dialogLogout = false;
        this.$router.push("/");
      });
    },
    // check answer that already user answered
    async checkAnswerByUserID() {
      try {
        const url = `${api_url}/answers/${this.user.user_id}`;
        const response = await axios.get(url);
        const results = response.data;
        console.log(response.data);
        // console.log(this.user.user_id)
        // this.answerUsers = results.map((answerUser) => ({
        //   user_id: answerUser.user_id,
        //   question_id: answerUser.question_id,
        //   answer: answerUser.answer,
        //   point: answerUser.point,
        //   theme_id: answerUser.theme_id,
        // }));
        let temporary = [];

        results.forEach((f) => {
          if (temporary.some((s) => s === f.level_id)) {
            return;
          } else {
            temporary.push(f.level_id);
          }
        });
        this.answerUsers = temporary;
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
