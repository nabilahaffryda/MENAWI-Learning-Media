<template>
  <v-main class="white"
    ><v-container>
      <v-row>
        <v-col cols="8" class="d-block ml-auto mr-auto">
          <v-flex>
            <v-btn
              style="margin-right: 20px; margin-top: 20px"
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
              style="margin-top: 40px; margin-bottom: 30px"
            ></v-progress-linear>
          </v-flex>
          <v-sheet min-height="55vh" rounded="lg" outlined> </v-sheet>
          <v-divider style="margin-top: 30px"></v-divider>
          <v-btn color="white" text rounded outlined style="margin-top: 30px">
            <h4 class="dark grey--text">LOMPATI</h4></v-btn
          >
          <v-btn rounded text style="margin-top: 30px; margin-left: 560px">
            <h4 class="dark grey--text">PERIKSA</h4></v-btn
          >
        </v-col>
      </v-row>
    </v-container>
  </v-main>
</template>
<script>
export default {
  name: "QuestionContent",
};
</script>
