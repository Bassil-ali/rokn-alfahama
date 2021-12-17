<template>
  <v-container id="regular-tables" fluid tag="section">
    <base-v-component :heading="$t('categories_form')" />

    <base-material-card
      icon="mdi-clipboard-text"
      title="category_form"
      class="px-5 py-3"
    >
      <v-form>
        <v-row>
          <v-col cols="3">
            <v-text-field v-model="item.name" :label="$t('name')" dense />
          </v-col>
          <v-col cols="3">
            <v-autocomplete
              v-model="item.parent_id"
              :label="$t('parent')"
              dense
              :items="categories"
              item-text="name"
              item-value="id"
            />
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="3">
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
            <!-- <v-img :src="get_url(image)" width="300"></v-img> -->
          </v-col>
        </v-row>
        <v-row>
          <v-col> </v-col>
        </v-row>
        <v-row>
          <v-col cols="12">
            <v-textarea
              v-model="item.brief"
              outlined
              :label="$t('Item_brief')"
              dense
            >
            </v-textarea>
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
import UploadAdapter from "../../../plugins/uploadAdapter";
function UploadAdapterPlugin(editor) {
  editor.plugins.get("FileRepository").createUploadAdapter = (loader) => {
    return new UploadAdapter(loader);
  };
}
export default {
  name: "ItemForm",
  data() {
    return {
      images: [],
      cover_image: {
        id: null,
        url: null,
      },
      language: this.$store.state.locales.locale,
      item: {},
    };
  },
  mounted() {
    // this.$store.dispatch("type/index");
    if (this.$route.params.id) {
      this.$store.dispatch("category/show", { id: this.$route.params.id });
    }
    this.$store.dispatch("category/index");
    if (this.$props.item.id) {
      this.$store
        .dispatch("item/show", { id: this.$props.item.id })
        .then((res) => {
          this.cover_image = res.gallery.cover_image;
          this.item.categories = res.category_ids;
          this.item.tags = res.tag_ids;
          this.images = res.gallery.media;
        });
    }
  },
  methods: {
    clearCategories() {
      this.item.item_type == 1 ? (this.item.categories = null) : "";
    },
    AddNew_Item() {
      this.NewTags.push(this.NewTags);
    },
    runDialog() {
      this.dialog = !this.dialog;
    },
    ...mapActions("category", ["store"]),
    get_url(image) {
      return typeof image.url != "string"
        ? URL.createObjectURL(image.url)
        : image.url;
    },
    handleFileUpload(e) {
      console.log(e);
      let files = e.target.files;
      for (var i = 0; i < files.length; i++) {
        this.images.push({ url: files[i] });
      }
    },
    async save(item) {
      let cover_image = null;
      if (typeof this.cover_image.url != "string") {
        cover_image = await this.$store.dispatch("media/store", {
          file: this.cover_image.url,
          is_file: true,
        });
      }

      item.cover_image_id = cover_image.id;
      console.log("ahmad hassouna");
      let item_data = await this.$store.dispatch("category/store", item);
      console.log("ahmad hassouna");
    },

    remove_image(image, index) {
      if (image.id) {
        this.$store.dispatch("gallery_media/delete", {
          gallery_id: image.gallery_id,
          id: image.id,
        });
      }
      this.images.splice(index, 1);
    },
  },

  computed: {
    ...mapState({
      // types: (state) => state.type.all,
      categories: (state) => state.category.all,
      one: (state) => state.category.one,
    }),
  },
  watch: {
    one(val) {
      if (val) {
        this.item = JSON.parse(JSON.stringify(val));
      }
    },
  },
};
</script>