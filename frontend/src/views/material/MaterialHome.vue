<template>
  <v-main class="white">
    <v-container>
      <v-row>
        <v-col cols="7" class="d-block ml-auto mr-auto">
          <v-img
            class="d-block ml-auto mr-auto"
            max-width="200px"
            src="@/assets/materi-title.png"
            style="margin-bottom: 20px; margin-top: 20px"
          >
          </v-img>
          <v-col
            v-for="material in materials"
            v-bind:key="material.material_id"
          >
            <v-sheet height="50vh" rounded="lg" outlined
              ><v-container fluid>
                <v-row align="center" justify="center">
                  <v-col cols="12">
                    <v-row align="center" justify="space-around">
                      <v-col cols="12" sm="10" class="text-center">
                        <v-flex>
                          <v-col cols="12" sm="4" class="text-center">
                            <v-img
                              :src="material.img"
                              max-width="120px"
                              style="margin-top: 30px"
                            ></v-img>
                          </v-col>
                          <v-divider
                            vertical
                            style="
                              margin-top: 30px;
                              margin-right: 20px;
                              margin-left: 20px;
                            "
                          ></v-divider>
                          <v-col cols="12" sm="8" class="text-center">
                            <h3 style="margin-top: 30px">Kasusun saka tema:</h3>
                            <h4
                              class="font-weight-thin black--text"
                              style="margin-top: 10px"
                            >
                              {{ material.description }}
                            </h4>
                          </v-col>
                        </v-flex>
                        <div>
                        <v-btn
                          color="#58cc02" class="white--text"
                          rounded
                          style="margin-top: 30px"
                          @click="openMaterial(material.material_id)"
                        >
                          MULAI
                        </v-btn></div>
                      </v-col>
                    </v-row>
                  </v-col>
                </v-row>
              </v-container>
            </v-sheet>
          </v-col>
        </v-col>
      </v-row>
    </v-container>
  </v-main>
</template>
<script>
import axios from "axios";
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
        const url = `http://localhost:8000/api/materials/`;
        const response = await axios.get(url);
        const results = response.data;
        this.materials = results.map((material) => ({
          material_id: material.material_id,
          material_name: material.material_name,
          img: require(`@/assets/material${material.material_id}.png`),
          description: material.material_desc,
        }));
        console.log(response.data)
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
    openMaterial(material_id){
      this.$router.push({name: 'MaterialContent', params: {data: {material_id}}});
    }
  },
};
</script>
<style>
.flex {
  display: flex;
}
</style>
