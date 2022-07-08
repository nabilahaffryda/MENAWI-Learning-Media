<template>
  <v-main
    ><v-container>
      <v-row>
        <v-col cols="12" lg="8" class="d-block ml-auto mr-auto">
          <v-btn style="margin-bottom: 10px" to="materialhome" text fab small
            ><v-icon>mdi-window-close</v-icon></v-btn
          >
          <v-sheet elevation="1" rounded="lg" outlined>
            <v-container fluid>
              <v-col v-if="currentDescription">
                <v-row>
                  <v-col cols="12" md="6">
                    <v-img
                      :src="`https://admin.menawi.com/storage/app/public/${currentDescription.desc_pict}`"
                      height="300px" class="d-block ml-auto mr-auto"
                      width="300px"
                      style="margin-top: 10px"
                    ></v-img>
                  </v-col>
                  <v-col cols="12" md="6">
                    <h3 style="margin-top: 20px" class="d-block ml-auto mr-auto text-center">
                      {{ currentDescription.description }}
                    </h3>
                  </v-col>
                </v-row>
              </v-col>
            </v-container>
          </v-sheet>
          <v-divider style="margin-top: 30px"></v-divider>
          <v-btn
            class="float-left"
            rounded
            style="margin-top: 30px"
            v-if="index > 0"
            @click="handleButtonBack()"
          >
            <h4>Mbalik</h4></v-btn
          >
          <v-btn
            rounded
            class="primary float-right"
            style="margin-top: 30px"
            v-if="index < descriptions.length - 1"
            @click="handleButtonNext()"
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
import api_url from "../../utils/api_url";
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
        const url = `${api_url}/materials/${this.$route.params.data.material_id}`;
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
<style>
@media only screen and (max-width: 600px) {
  /* For mobile phones: */
  [class*="cols="] {
    width: 100%;
  }
}
</style>
