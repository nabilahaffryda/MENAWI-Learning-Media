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
          <v-col v-for="item in items" v-bind:key="item.id">
            <v-sheet min-height="55vh" rounded="lg" outlined
              ><v-container fluid>
                <v-row align="center" justify="center">
                  <v-col cols="12">
                    <v-row align="center" justify="space-around">
                      <v-col cols="12" sm="10" class="text-center">
                        <v-flex>
                          <v-col cols="12" sm="4" class="text-center">
                            <v-img
                              :src="item.img"
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
                            <h4 style="margin-top: 30px">Kasusun saka tema:</h4>
                            <h4
                              class="font-weight-thin black--text"
                              style="margin-top: 10px"
                            >
                              {{ item.deskripsi }}
                            </h4>
                          </v-col>
                        </v-flex>
                        <v-btn
                          color="#7ed957"
                          rounded
                          to="materialcontent"
                          style="margin-top: 50px"
                          class="ml-auto mr-auto"
                        >
                          MULAI
                        </v-btn>
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
<style>
.flex {
  display: flex;
}
</style>
<script>
export default {
  name: "MaterialHome",
  data() {
    return {
      items: [
        {
          id: 1,
          name: "one",
          deskripsi:
            "Aku, Kasenenganku, Kegiatanku, Kulawargaku, Pengalaman, Lingkungan Resik Sehat lan Asri, Sato Iwen lan Karang Kitri",
          img: require("@/assets/level1.png"),
        },
        {
          id: 2,
          img: require("@/assets/level2.png"),
          deskripsi:
            "Urip Rukun, Dolanan Ing Lingkunganku, Tugasku Saben Dina, Aku lan Sekolahku, Urip Resik lan Sehat, Banyu, Bumi lan Srengenge, Karang Kitri",
        },
        {
          id: 3,
          img: require("@/assets/level3.png"),
          deskripsi:
            "Welas Asih marang Kewan lan Tetuwuhan, Pengalaman kang Nyenengake, Mangsa, Donya Saisine, Hemat Energi, Dolanan karo Olahraga, Pakulinan Becik",
        },
        {
          id: 4,
          img: require("@/assets/level4.png"),
          deskripsi:
            "Guyub Rukun, Gemi Nggunakake Energi, Perduli Marang Lingkungan, Sregep Makarya, Endahe Nagriku, Gegayuhanku, Panganan lan Gizi",
        },
        {
          id: 5,
          img: require("@/assets/level5.png"),
          deskripsi:
            "Dolanan Tradhisional, Lelakoning Urip, Rukun Agawe Santosa, Rumangsa Handarbeni, Ekosistem, Perangan Awak, Kabudayan Jawa, Srawung ing Lingkungan",
        },
        {
          id: 6,
          img: require("@/assets/level6.png"),
          deskripsi:
            "Njaga Lestarine Alam, Bhineka Tunggal Ika, Tokoh lan Panemu, Globalisasi, Wira Usaha",
        },
      ],
    };
  },
};
</script>