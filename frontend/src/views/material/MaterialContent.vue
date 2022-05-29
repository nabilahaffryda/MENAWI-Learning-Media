<template>
  <v-main class="white"
    ><v-container>
      <v-row>
        <v-col cols="8" class="d-block ml-auto mr-auto">
          <v-flex>
            <v-btn
              style="margin-right: 20px; margin-top: 10px; margin-bottom: 10px;"
              to="materialhome"
              text
              fab
              ><v-icon>mdi-window-close</v-icon></v-btn
            >
          </v-flex>
          <v-sheet height="55vh" rounded="lg" outlined>
            <v-container fluid>
              <v-col
                cols="12"
                sm="12"
                class="text-center"
                v-if="currentDescription"
              >
                <v-flex justify-center>
                  <v-col sm="4" class="text-center">
                    <v-img
                      :src="`http://localhost:8000/storage/${currentDescription.desc_pict}`"
                      height="170px"
                      width="170px"
                      class="d-block ml-auto mr-auto"
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
                  <v-col cols="12" sm="6" class="text-center">
                    <h3 style="margin-top: 30px">
                      {{ currentDescription.description }}
                    </h3>
                  </v-col>
                </v-flex>
              </v-col>
            </v-container>
          </v-sheet>
          <v-divider style="margin-top: 30px"></v-divider>
          <v-btn
            class="float-left"
            rounded
            style="margin-top: 30px" 
            @click="handleButtonBack()"
          >
            <h4>KEMBALI</h4></v-btn
          >
          <v-btn
            rounded
            class="primary float-right"
            style="margin-top: 30px"
            @click="handleButtonNext()"
          >
            <h4>LANJUT</h4></v-btn
          >
        </v-col>
      </v-row>
    </v-container>
  </v-main>
</template>
<script>
import axios from "axios";
export default {
  name: "MaterialContent",
  data: () => ({
    descriptions: [],
    index: 0,
  }),
  mounted() {
    if (this.$route.params.data) {
      this.getDescByMaterial();
    } else {
      this.$router.push("/materialhome");
    }
  },
  computed: {
    currentDescription() {
      if (this.descriptions !== []) {
        return this.descriptions[this.index];
      }
      return null;
    },
  },
  methods: {
    async getDescByMaterial() {
      try {
        const url = `http://localhost:8000/api/materials/${this.$route.params.data.material_id}`;
        const response = await axios.get(url, {
          headers: {
            "content-type": "multipart/form-data",
          },
        });
        const results = response.data;
        console.log(response.data);
        this.descriptions = results.map((description) => ({
          desc_id: description.desc_id,
          description: description.description,
          desc_pict: description.desc_pict,
          material_id: description.material_id,
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
    handleButtonNext() {
      if (this.index < this.descriptions.length - 1) {
        setTimeout(
          function () {
            this.index += 1;
          }.bind(this),
          1000
        );
      }
    },
    handleButtonBack() {
      if (this.index < this.descriptions.length + 1) {
        setTimeout(
          function () {
            this.index -= 1;
          }.bind(this),
          1000
        );
      }
    },
  },
};
</script>
