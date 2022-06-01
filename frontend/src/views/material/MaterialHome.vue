<template>
  <v-main>
    <v-container>
      <v-row>
        <v-col class="d-block ml-auto mr-auto">
          <v-row>
            <v-col cols="8">
              <v-col
                v-for="material in materials"
                v-bind:key="material.material_id"
              >
                <v-sheet
                  height="60vh"
                  rounded="lg"
                  outlined
                  style="margin-top: 20px"
                  ><v-container fluid>
                    <v-row align="center" justify="center">
                      <v-col cols="12">
                        <v-row align="center" justify="space-around">
                          <v-col cols="12" sm="6" class="text-center">
                            <!-- <v-card outlined width="500px">
                            -->
                            <v-img
                              :src="material.img"
                              max-width="100px"
                              class="d-block ml-auto mr-auto"
                              style="margin-top: 10px"
                            ></v-img>
                            <h3 style="margin-top: 10px">Kasusun saka tema:</h3>
                            <h4
                              class="font-weight-thin black--text d-block ml-auto mr-auto"
                              style="margin-top: 10px"
                            >
                              {{ material.description }}
                            </h4>

                            <v-btn
                              color="#58cc02"
                              class="white--text"
                              rounded
                              block
                              style="margin-top: 20px"
                              @click="openMaterial(material.material_id)"
                            >
                              MULAI
                            </v-btn>
                            <!-- </v-card> -->
                          </v-col>
                        </v-row>
                      </v-col>
                    </v-row>
                  </v-container>
                </v-sheet>
              </v-col>
            </v-col>
            <v-col cols="3">
              <!-- hello user -->
              <v-sheet rounded="lg" style="margin-top: 30px" outlined>
                <v-list color="transparent">
                  <v-list-item>
                    <v-flex>
                      <h2 style="margin-bottom: 10px; margin-top: 20px;">
                        Ayo sinau <strong>{{ user.name }}</strong>
                      </h2>
                      <!-- <v-img
                        width="5px"
                        height="50px"
                        src="@/assets/hand.svg"
                        style="margin-top: 10px"
                      >
                      </v-img> -->
                    </v-flex>
                  </v-list-item>
                </v-list>
              </v-sheet>
              <!-- leaderboard -->
              <!-- <v-sheet rounded="lg" outlined style="margin-top: 20px">
                <v-list color="transparent">
                  <v-list-item>
                    <v-list-item-content>
                      <v-list-item-title>
                        <h2 class="text-center">Leaderboard</h2>
                      </v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>

                  <v-divider></v-divider>
                  <v-virtual-scroll
                    :bench="benched"
                    :items="items"
                    height="250"
                    item-height="64"
                  >
                    <template v-slot:default="{ item }">
                      <v-list-item :key="item">
                        <v-list-item-action>
                          <v-btn
                            fab
                            small
                            depressed
                            color="white"
                            class="green--text"
                          >
                            {{ item }}
                          </v-btn>
                        </v-list-item-action>
                        <v-list-item-content>
                          <v-list-item-title> nama </v-list-item-title>
                        </v-list-item-content>
                        <v-list-item-content>
                          <v-list-item-title> 100 poin </v-list-item-title>
                        </v-list-item-content>
                      </v-list-item>
                      <v-divider></v-divider>
                    </template>
                  </v-virtual-scroll>
                </v-list>
              </v-sheet> -->
               </v-col
          >
          </v-row>
        </v-col>
      </v-row>
    </v-container>
  </v-main>
</template>
<script>
import axios from "axios";
import { mapGetters } from "vuex";
import api_url from "../../utils/api_url";
export default {
  name: "MaterialHome",
  data() {
    return {
      materials: [],
    };
  },
  mounted() {
    this.fetchMaterial();
  },
  methods: {
    async fetchMaterial() {
      try {
        const url = `${api_url}/materials/`;
        const response = await axios.get(url);
        const results = response.data;
        this.materials = results.map((material) => ({
          material_id: material.material_id,
          material_name: material.material_name,
          img: require(`@/assets/material${material.material_id}.png`),
          description: material.material_desc,
        }));
        console.log(response.data);
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
    openMaterial(material_id) {
      this.$router.push({
        name: "MaterialContent",
        params: { data: { material_id } },
      });
    },
  },
  computed: {
    ...mapGetters({
      isLoggedIn: "isLoggedIn",
      user: "user",
    }),
  },
};
</script>
<style>
.flex {
  display: flex;
}
</style>
