<template>
  <div>
    <v-toolbar flat outlined class="px-8">
      <v-spacer />
      <v-toolbar-title>
        <v-btn text to="/" color="white">
          <v-img src="@/assets/logo2.png" max-width="150px" />
        </v-btn>
      </v-toolbar-title>
      <v-spacer />
      <!-- home -->
      <v-btn text to="home" v-if="isLoggedIn"> Home </v-btn>
      <!-- level -->
      <v-menu
        v-if="isLoggedIn"
        :close-on-content-click="false"
        :nudge-width="150"
        offset-y
      >
        <template v-slot:activator="{ on, attrs }">
          <v-btn text v-bind="attrs" v-on="on"> Level </v-btn>
        </template>
        <v-card>
          <v-list>
            <v-list-item>
              <!-- level avatar -->
              <v-list-item-avatar>
                <!-- <img
                  :src="'@/assets/level'+
                    answerUsers[answerUsers.length - 1]+
                  '.png'"
                /> -->
                <img
                  :src="require(`@/assets/level${answerUsers[answerUsers.length - 1]}.png`)"
                />
                <!-- <v-img src="@/assets/level1.png" max-width="50px" /> -->
              </v-list-item-avatar>
              <v-list-item-content>
                <v-list-item-title>
                  <strong
                    >LEVEL {{ answerUsers[answerUsers.length - 1] }}</strong
                  >
                </v-list-item-title>
                <v-list-item-subtitle
                  >Naikkan level keahlianmu!</v-list-item-subtitle
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
          <v-btn text v-bind="attrs" v-on="on"> Akun </v-btn>
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
              <v-list-item-title>Keluar</v-list-item-title>
            </v-list-item>
          </v-list>
        </v-card>
      </v-menu>
      <v-dialog v-model="dialogLogout" max-width="290px" activator="item">
        <v-card>
          <v-card-title class="text-h5">Konfirmasi</v-card-title>
          <v-card-text>Apakah Anda yakin ingin keluar?</v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="green darken-1" text @click="close">Cancel</v-btn>
            <v-btn color="green darken-1" type="submit" text @click="logout"
              >OK</v-btn
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
</style>

<script>
import { mapGetters } from "vuex";
import axios from "axios";
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
        const url = `http://localhost:8000/api/answers/${this.user.user_id}`;
        const response = await axios.get(url);
        const results = response.data;
        console.log(response.data);
        // this.answerUsers = results.map((answerUser) => ({
        //   user_id: answerUser.user_id,
        //   question_id: answerUser.question_id,
        //   answer: answerUser.answer,
        //   point: answerUser.point,
        //   theme_id: answerUser.theme_id,
        // }));
        let temporary = [];

        results.forEach((f) => {
          if (temporary.some((s) => s.theme_id === f.theme_id)) {
            return;
          } else {
            temporary.push(f.theme_id);
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
