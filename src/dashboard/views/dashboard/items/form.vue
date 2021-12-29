<template>
  <v-container id="regular-tables" fluid tag="section">
    <base-v-component :heading="$t('items_form')" />

    <base-material-card
      icon="mdi-clipboard-text"
      title="Item Form"
      class="px-5 py-3"
    >
      <v-form>
        <v-row>
          <v-col cols="3">
            <v-text-field
              v-model="item.translations[0].value"
              :label="$t('name_ar')"
              dense
            />
          </v-col>
          <v-col cols="3">
            <v-text-field
              v-model="item.translations[1].value"
              :label="$t('name_ar')"
              dense
            />
          </v-col>
          <!-- <v-col cols="3">
            <v-autocomplete
              dense
              v-model="item.parent_id"
              :items="items"
              item-text="name"
              item-value="id"
              :label="$t('accessor_for')"
            >
            </v-autocomplete>
          </v-col> -->
          <v-col cols="3">
            <v-text-field v-model="item.code" :label="$t('code')" dense />
          </v-col>
          <v-col cols="3">
            <v-autocomplete
              :items="units"
              item-text="name"
              item-value="id"
              v-model="item.unit_id"
              :label="$t('unit')"
              dense
            />
          </v-col>
          <v-col cols="3">
            <v-autocomplete
              :items="taxes"
              item-text="name"
              item-value="id"
              v-model="item.tax_id"
              :label="$t('tax')"
              dense
            />
          </v-col>
          <v-col cols="3">
            <v-text-field
              v-model="item.selling_price"
              :label="$t('price')"
              dense
            />
          </v-col>
          <v-col cols="3">
            <v-text-field
              v-model="item.quantity"
              :label="$t('quantity')"
              dense
            />
          </v-col>
          <v-col cols="3">
            <v-autocomplete
              :items="categories"
              item-text="name"
              item-value="id"
              v-model="item.category_id"
              :label="$t('category')"
              dense
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
            <v-img  :src="item.image" width="300"> </v-img>
            <!-- <v-img :src="get_url(image)" width="300"></v-img> -->
          </v-col>
        </v-row>
        <v-row>
          <v-col> </v-col>
        </v-row>
        <v-row>
          <v-col cols="12">
            <v-textarea
              v-model="item.translations[2].value"
              outlined
              :label="$t('Item_brief_ar')"
              dense
            >
            </v-textarea>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="12">
            <v-textarea
              v-model="item.translations[3].value"
              outlined
              :label="$t('Item_brief_en')"
              dense
            >
            </v-textarea>
          </v-col>
        </v-row>

        <v-row>
          <v-col cols="12">
            <ckeditor
              :editor="editor"
              v-model="item.translations[4].value"
              :config="editorConfig"
            ></ckeditor>
          </v-col>
          <v-col cols="12">
            <ckeditor
              :editor="editor"
              v-model="item.translations[5].value"
              :config="editorConfig"
            ></ckeditor>
          </v-col> </v-row
        ><v-row>
          <v-col cols="12">
            <v-card>
              <v-card-title>
                {{ $t("item_images") }}
              </v-card-title>
              <v-card-text>
                <v-row>
                  <v-col cols="4" :key="index" v-for="(image, index) in images">
                    <v-hover>
                      <template v-slot:default="{ hover }">
                        <v-img :src="get_url(image)" width="300">
                          <v-fade-transition>
                            <v-overlay v-if="hover" absolute color="#e4e4e4">
                              <v-btn
                                icon
                                dark
                                color="#222222"
                                size="64"
                                @click="remove_image(image, index)"
                              >
                                <v-icon>fas fa-minus</v-icon></v-btn
                              >
                            </v-overlay>
                          </v-fade-transition>
                        </v-img>
                      </template>
                    </v-hover>
                  </v-col>
                  <v-col cols="4">
                    <v-btn @click="$refs.inputUpload.click()" icon>
                      <v-icon> fas fa-plus</v-icon>
                      <input
                        v-show="false"
                        ref="inputUpload"
                        type="file"
                        @change="handleFileUpload"
                        multiple
                      />
                      <!-- <v-img :src="get_url(image)" width="300"></v-img> -->
                    </v-btn>
                  </v-col>
                </v-row>
              </v-card-text>
            </v-card>
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
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
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
      item: {
        translations: [
          {
            field: "name",
            value: "",
            locale: "en",
          },
          {
            field: "name",
            value: "",
            locale: "ar",
          },
          {
            field: "brief",
            value: "",
            locale: "en",
          },
          {
            field: "brief",
            value: "",
            locale: "ar",
          },
          {
            field: "description",
            value: "",
            locale: "en",
          },
          {
            field: "description",
            value: "",
            locale: "ar",
          },
        ],
      },
      radio: null,
      NewTags: { name: null },
      dialog: false,
      images: [],
      cover_image: {
        id: null,
        url: null,
      },
      editor: ClassicEditor,
      new_tag: null,
      editorConfig: {
        toolbar: {
          items: [
            "heading",
            "|",
            "bold",
            "fontFamily",
            "fontBackgroundColor",
            "fontColor",
            "fontSize",
            "italic",
            "highlight",
            "link",
            "bulletedList",
            "numberedList",
            "removeFormat",
            "strikethrough",
            "superscript",
            "subscript",
            "underline",
            "|",
            "alignment",
            "indent",
            "outdent",
            "|",
            "imageUpload",
            "blockQuote",
            "insertTable",
            "mediaEmbed",
            "undo",
            "redo",
          ],
        },
        language: this.$store.state.locales.locale,
        image: {
          toolbar: [
            "imageTextAlternative",
            "imageStyle:full",
            "imageStyle:side",
          ],
        },
        table: {
          contentToolbar: ["tableColumn", "tableRow", "mergeTableCells"],
        },
        extraPlugins: [UploadAdapterPlugin],
      },
    };
  },
  mounted() {
    // this.$store.dispatch("type/index");
    this.$store.dispatch("category/index");
    this.$store.dispatch("unit/index");
    this.$store.dispatch("tax/index");
    if (this.$route.params.id) {
      this.$store
        .dispatch("item/show", { id: this.$route.params.id })
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
    ...mapActions("item", ["store"]),

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
      let cover_image_id = null;
      if (typeof this.cover_image.url != "string") {
        let cover_image = await this.$store.dispatch("media/store", {
          file: this.cover_image.url,
          is_file: true,
        });
        cover_image_id = cover_image.id;
      }
      item.cover_image_id = cover_image_id;
      let item_data = await this.$store
        .dispatch("item/store", item)
        .then(() => {
          console.log("item CREATED !!!!");
        });
      if (this.images.length > 0) {
        this.images.map((image) => {
          if (image.id) {
            this.$store.dispatch("media/delete", { image });
          }
          if (!image.id) {
            image = {
              file: image.url,
              is_file: true,
              item_id: item_data.id,
            };
            console.table(image);
            this.$store.dispatch("item_media/store", image);
          }
        });
      }
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
      categories: (state) => state.category.all,
      units: (state) => state.unit.all,
      taxes: (state) => state.tax.all,
      one: (state) => state.item.one,
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