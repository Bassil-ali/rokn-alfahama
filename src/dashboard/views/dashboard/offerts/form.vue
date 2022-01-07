<template>
  <v-container id="regular-tables" fluid tag="section">
    <base-v-component :heading="$t('items_form')" />

    <base-material-card
      icon="mdi-clipboard-text"
      title="Item Form"
      class="px-5 py-3"
    >
      <v-form @submit.prevent="save(item)">
        <v-row>
          <v-col cols="12" lg="3">
            <v-text-field
              v-model="item.translations[0].value"
              :label="$t('offer name')"
            >
            </v-text-field
          ></v-col>
          <v-col cols="12" lg="3">
            <v-text-field
              v-model="item.translations[1].value"
              :label="$t('english offer name')"
            >
            </v-text-field
          ></v-col>
          <v-col cols="12" lg="3">
            <v-text-field
              type="number"
              v-model="item.percentage"
              :label="$t('discount percentage')"
            >
            </v-text-field
          ></v-col>
          <v-col cols="12" lg="3">
            <v-text-field
              v-model="item.translations[2].value"
              :label="$t('offer breif')"
            >
            </v-text-field
          ></v-col>
          <v-col cols="12" lg="3">
            <v-text-field
              v-model="item.translations[3].value"
              :label="$t('english offer breif')"
            >
            </v-text-field
          ></v-col>
          <v-col cols="12" lg="3">
            <v-text-field
              v-model="item.start_date"
              type="date"
              :label="$t('offer start date')"
            >
            </v-text-field
          ></v-col>
          <v-col cols="12" lg="3">
            <v-text-field
              v-model="item.end_date"
              type="date"
              :label="$t('offer end date')"
            >
            </v-text-field
          ></v-col>
          <v-col cols="12" lg="3">
            <v-autocomplete
              v-model="offer_items_ids"
              :items="items"
              item-value="id"
              item-text="name"
              multiple
            >
            </v-autocomplete>
          </v-col>
          <v-col cols="12" lg="3">
            <v-file-input
              v-model="cover_image.url"
              :label="$t('cover_image')"
              hide-details
            ></v-file-input>
            <v-img
              v-if="cover_image.url"
              :src="get_url(cover_image)"
              width="300"
            >
            </v-img>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="12">
            <v-btn dark color="primary" block @click="save(item)">
              <v-icon> mdi-check </v-icon>
              {{ $t("save") }}
            </v-btn>
          </v-col>
        </v-row>
      </v-form>
    </base-material-card>
  </v-container>
</template>
<script>
import { mapActions, mapState } from "vuex";
export default {
  name: "effortForm",
  data() {
    return {
      item: {
        translations: [
          {
            field: "name",
            value: "",
            locale: "ar",
          },
          {
            field: "name",
            value: "",
            locale: "en",
          },
          {
            field: "brief",
            value: "",
            locale: "ar",
          },
          {
            field: "brief",
            value: "",
            locale: "en",
          },
        ],
      },
      cover_image: {},
      offer_items_ids: [],
    };
  },
  mounted() {
    this.$store.dispatch("item/index");
  },
  computed: {
    ...mapState({
      items: (state) => state.item.all,
    }),
  },
  methods: {
    get_url(image) {
      return typeof image.url != "string"
        ? URL.createObjectURL(image.url)
        : image.url;
    },
    async save(item) {
      let cover_image_id = null;
      if (typeof this.cover_image.url != "string") {
        let cover_image = await this.$store.dispatch("media/store", {
          file: this.cover_image.url,
          is_file: true,
        });
        cover_image_id = cover_image.id;
      }
      item.start_date = this.dateFormat(item.start_date);
      item.end_date = this.dateFormat(item.end_date);
      item.image_id = cover_image_id;
      let new_offer = await this.$store.dispatch("offer/store", item);
      if (this.offer_items_ids.length > 0) {
        this.$store.dispatch("offer_item/store", {
          offer_id: new_offer.id,
          items_ids: this.offer_items_ids,
        });
      }
    },
    dateFormat(date) {
      return date;
      return new Date(date).toISOString().slice(0, 19).replace("T", " ");
    },
  },
};
</script>