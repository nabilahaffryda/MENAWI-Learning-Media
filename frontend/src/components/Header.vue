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
      <!-- level -->
      <v-menu
        :close-on-content-click="false"
        :nudge-width="150"
        offset-y
        v-if="isLoggedIn"
      >
        <template v-slot:activator="{ on, attrs }">
          <v-btn text v-bind="attrs" v-on="on">
            <v-icon color="green">mdi-star-circle</v-icon>
          </v-btn>
        </template>
        <v-card>
          <v-list>
            <v-list-item>
              <!-- level avatar -->
              <v-list-item-avatar>
                <img
                  src="https://cdn.vuetifyjs.com/images/john.jpg"
                  alt="John"
                />
              </v-list-item-avatar>
              <v-list-item-content>
                <v-list-item-title>
                  <strong>LEVEL</strong>
                </v-list-item-title>
                <v-list-item-subtitle
                  >Naikkan level keahlianmu!</v-list-item-subtitle
                >
              </v-list-item-content>
            </v-list-item>
          </v-list>
        </v-card>
      </v-menu>

      <!-- badge -->
      <v-menu
        :close-on-content-click="false"
        :nudge-width="150"
        offset-y
        v-if="isLoggedIn"
      >
        <template v-slot:activator="{ on, attrs }">
          <v-btn text v-bind="attrs" v-on="on">
            <v-icon color="yellow">mdi-trophy</v-icon>
          </v-btn>
        </template>
        <v-card>
          <v-list>
            <v-list-item>
              <v-list-item-avatar>
                <img
                  src="https://cdn.vuetifyjs.com/images/john.jpg"
                  alt="John"
                />
              </v-list-item-avatar>
              <v-list-item-content>
                <v-list-item-title>
                  <strong>PENCAPAIAN</strong></v-list-item-title
                >
              </v-list-item-content>
            </v-list-item>
            <v-divider />
            <v-list-item link class="text-center">
              <v-list-item-subtitle class="text-decoration-underline"
                >Lihat pencapaian lainnya</v-list-item-subtitle
              >
            </v-list-item>
          </v-list>
        </v-card>
      </v-menu>

      <!-- account -->
      <v-menu
        :close-on-content-click="false"
        offset-y
        :nudge-width="150"
        v-if="isLoggedIn"
      >
        <template v-slot:activator="{ on, attrs }">
          <v-btn text v-bind="attrs" v-on="on">
            <v-icon color="primary">mdi-account-circle</v-icon>
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
            <v-btn
              color="green darken-1"
              type="submit"
              text
              @click.prevent="logout"
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
import User from "../apis/User";
export default {
  name: "Header",
  data() {
    return {
      dialogLogout: false,
      isLoggedIn: false,
    };
  },
  mounted() {
    this.$root.$on("login", () => {
      this.isLoggedIn = true;
    });
    this.isLoggedIn = !!localStorage.getItem("auth");
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
    logout() {
      User.logout().then(() => {
        localStorage.removeItem("auth");
        this.isLoggedIn = false;
        this.$router.push({ name: "Login" });
      });
    },
  },
};
</script>
