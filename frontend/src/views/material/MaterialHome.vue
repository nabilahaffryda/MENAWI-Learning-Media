<template>
  <v-main>
    <v-container>
      <v-row>
         <v-col cols="12" lg="6" class="mx-auto">
          <v-row>
            <v-col >
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
                            <v-img
                              :src="material.img"
                              max-width="100px"
                              class="d-block ml-auto mr-auto"
                              style="margin-top: 10px"
                            ></v-img>
                            <h3 style="margin-top: 10px">Kasusun saka tema:</h3>
                            <h4
                              class="font-weight-regular black--text d-block ml-auto mr-auto"
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
        const url = `${api_url}/materials`;
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
@media only screen and (max-width: 600px) {
  /* For mobile phones: */
  [class*="cols="] {
    width: 100%;
  }
}
</style>
