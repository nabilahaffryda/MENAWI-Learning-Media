<template>
  <v-app>
    <Header />
    <v-main class="pt-0">
      <router-view></router-view>
    </v-main>
  </v-app>
</template>

<script>
import Header from "./components/Header.vue";
export default {
  name: "App",

  components: {
    Header,
  },
};
</script>
