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
              :label="$t('name_en')"
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
              type="number"
              v-model="item.selling_price"
              :label="$t('price')"
              dense
            />
          </v-col>
          <v-col cols="3">
            <v-text-field
              type="number"
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
          </v-col>
        </v-row>
        <v-row>
          <v-col> </v-col>
        </v-row>
        <v-row>
          <v-col cols="12">
            <v-textarea
              v-model="item.translations[4].value"
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
              v-model="item.translations[5].value"
              outlined
              :label="$t('Item_brief_en')"
              dense
            >
            </v-textarea>
          </v-col>
        </v-row>

        <v-row>
          <v-col cols="12">
            <h4>
              {{ $t("arabic item description") }}
            </h4>
            <pre></pre>
            <ckeditor
              :editor="editor"
              v-model="item.translations[2].value"
              :config="editorConfig"
            ></ckeditor>
          </v-col>
          <v-col cols="12">
            <h4>
              {{ $t("english item description") }}
            </h4>
            <pre></pre>
            <ckeditor
              :editor="editor"
              v-model="item.translations[3].value"
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
      </v-form>
    </base-material-card>
    <base-material-card
      icon="mdi-clipboard-text"
      title="add shipment"
      class="px-5 py-3"
    >
      <v-form>
        <v-row class="mt-5 mb-5">
          <v-btn @click="addShipment()" icon>
            <v-icon color="green"> fas fa-plus </v-icon>
          </v-btn>
        </v-row>
        <v-row :key="index" v-for="(shipment, index) in shipments">
          <v-col cols="12" md="2"
            ><v-text-field
              v-model="shipment.price"
              :label="$t('price')"
              dense
            ></v-text-field
          ></v-col>
          <v-col cols="12" md="2">
            <v-autocomplete
              v-model="shipment.shipping_id"
              :items="shippings"
              item-value="id"
              dense
              item-text="name"
              :label="$t('shipping type')"
            >
            </v-autocomplete
          ></v-col>
          <!-- <v-col cols="12" md="2"
            ><v-btn @click="removeShipment(index, shipment)" icon>
              <v-icon> fac fa-times </v-icon>
            </v-btn></v-col
          > 
           -->
        </v-row>
      </v-form>
    </base-material-card>

    <!-- no -->
    <base-material-card
      icon="mdi-clipboard-text"
      title="add properties"
      class="px-5 py-3"
      v-if="has_proparty"
    >
      <v-form>
        <v-row class="mt-5 mb-5">
          <v-btn @click="addProperty()" icon>
            <v-icon color="green"> fas fa-plus </v-icon>
          </v-btn>
        </v-row>
        <v-row :key="index" v-for="(property, index) in properties">
          <v-dialog width="fit-content" v-model="addColorDilaog">
            <v-card>
              <v-card-title>
                {{ $t("add new color") }}
              </v-card-title>
              <v-card-text>
                <v-row>
                  <v-col>
                    <v-row>
                      <v-col cols="6">
                        <v-text-field
                          v-model="color.translations[0].value"
                          :label="$t('arabic color name')"
                        >
                          <template v-slot:prepend-inner>
                            <v-btn :color="side_color" exact depressed small>
                            </v-btn>
                          </template>
                        </v-text-field>
                      </v-col>
                      <v-col cols="6">
                        <v-text-field
                          :label="$t('english color name')"
                          v-model="color.translations[1].value"
                        >
                        </v-text-field>
                      </v-col>
                    </v-row>
                  </v-col>
                  <v-col>
                    <v-color-picker
                      v-model="side_color"
                      hide-inputs
                      dot-size="25"
                      swatches-max-height="200"
                    ></v-color-picker>
                  </v-col>
                </v-row>
              </v-card-text>
              <v-card-actions class="justify-center">
                <v-row justify="center" no-gutters dense>
                  <v-btn @click="saveColor()" class="primary">
                    {{ $t("save") }}
                  </v-btn>
                </v-row>
              </v-card-actions>
            </v-card>
          </v-dialog>
          <v-col cols="12" md="3"
            ><v-text-field
              v-model="property.qty"
              :label="$t('quantity')"
            ></v-text-field
          ></v-col>

          <v-col cols="12" md="3">
            <v-autocomplete
              v-model="property.color_id"
              :items="colors"
              item-value="id"
              item-text="name"
              dense
              :label="$t('color')"
            >
              <template v-slot:append>
                <v-btn @click="addColorDilaog = true" icon>
                  <v-icon small> fas fa-plus </v-icon>
                </v-btn>
              </template>
              <template v-slot:item="{ item }">
                <div :style="`background-color: ${item.hex_code};width:100%`">
                  {{ item.name }}
                </div>
              </template>
            </v-autocomplete>
          </v-col>

          <v-col cols="12" md="2"
            ><v-text-field
              v-model="property.price"
              :label="$t('price')"
              dense
            ></v-text-field
          ></v-col>
          <v-col cols="12" md="2">
            <v-dialog width="fit-content" v-model="addSizeDilaog">
              <v-card>
                <v-card-title>
                  {{ $t("add new size") }}
                </v-card-title>
                <v-card-text>
                  <v-row>
                    <v-col>
                      <v-text-field v-model="size.name" :label="$t('name')">
                      </v-text-field>
                    </v-col>
                  </v-row>
                </v-card-text>
                <v-card-actions class="justify-center">
                  <v-row justify="center" no-gutters dense>
                    <v-btn @click="saveSize()" class="primary">
                      {{ $t("save") }}
                    </v-btn>
                  </v-row>
                </v-card-actions>
              </v-card>
            </v-dialog>
            <v-autocomplete
              v-model="property.size_id"
              :items="sizes"
              item-value="id"
              dense
              item-text="name"
              :label="$t('size')"
            >
              <template v-slot:append>
                <v-btn @click="addSizeDilaog = true" icon>
                  <v-icon small> fas fa-plus </v-icon>
                </v-btn>
              </template>
            </v-autocomplete></v-col
          >
          <v-col cols="12" md="2"
            ><v-btn @click="removeProperty(index, property)" icon>
              <v-icon> fac fa-times </v-icon>
            </v-btn></v-col
          >
        </v-row>
      </v-form>
    </base-material-card>
    <v-row>
      <v-col cols="12">
        <v-btn dark color="primary" block @click="save(item)">
          <v-icon> mdi-check </v-icon>
          {{ $t("save") }}
        </v-btn>
      </v-col>
    </v-row>
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
      addColorDilaog: false,
      addSizeDilaog: false,

      size: {},
      side_color: "",

      properties: [],
      shipments: [{}],
      globalIndex: 0,
      has_proparty: true,
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
            field: "description",
            value: "",
            locale: "ar",
          },
          {
            field: "description",
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
      color: {
        translations: [
          { field: "name", value: "", locale: "ar" },
          { field: "name", value: "", locale: "en" },
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
    this.$store.dispatch("category/index", { per_page: -1 });
    this.$store.dispatch("unit/index", { per_page: -1 });
    this.$store.dispatch("tax/index", { per_page: -1 });
    this.$store.dispatch("color/index", { per_page: -1 });
    this.$store.dispatch("size/index", { per_page: -1 });
    this.$store.dispatch("shipping/index");

    if (this.$route.params.id) {
      this.$store.dispatch("item/show", { id: this.$route.params.id });
      this.$store.dispatch("shippinga/index", {
        ids: [this.$route.params.id],
      });
      this.$store.dispatch("property/index", {
        item_id: this.$route.params.id,
      });
    }
  },
  methods: {
    addProperty() {
      this.properties.push({});
    },
    addShipment() {
      if (this.shipments[0]) return;
      this.shipments.push({});
    },
    removeProperty(index, item) {
      this.properties.splice(index, 1);
      this.$store.dispatch("property/delete", item);
    },
    // removeShipment(index, item) {
    //   this.properties.splice(index, 1);
    //   this.$store.dispatch("shipping/delete", item);
    // },
    get_url(image) {
      return typeof image.url != "string"
        ? URL.createObjectURL(image.url)
        : image.url;
    },

    handleFileUpload(e) {
      // console.log(e);
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
      if (item.id) {
        ("start update ");
        if (this.images.length > 0) {
          this.images.map((image) => {
            if (typeof image.url != "string") {
              this.$store.dispatch("item_media/store", {
                file: image.url,
                is_file: true,
                item_id: item.id,
              });
            }
          });
        }
        if (this.properties.length > 0) {
          this.properties.map((property) => {
            property.item_id = item.id;
          });
          // console.log(this.properties);
          this.$store.dispatch("property/store", this.properties);
        }
        if (this.shipments[0]) {
          this.shipments.map((shipment) => {
            if (shipment.item_id) {
              this.$store.dispatch("shippinga/update", shipment);
            } else {
              shipment.item_id = item.id;
              this.$store.dispatch("shippinga/store", this.shipments);
            }
          });
        }
        await this.$store.dispatch("item/store", item).then(() => {
          this.$router.push("/items");
        });
        // console.log("end update ");
      } else {
        let new_item = await this.$store.dispatch("item/store", item);
        if (this.images.length > 0) {
          this.images.map((image) => {
            if (typeof image.url != "string") {
              this.$store.dispatch("item_media/store", {
                file: image.url,
                is_file: true,
                item_id: new_item.id,
              });
            }
          });
        }
        if (this.properties.length > 0) {
          this.properties.map((property) => {
            property.item_id = new_item.id;
          });

          this.$store.dispatch("property/store", this.properties);
        }
        if (this.shipments[0]) {
          this.shipments.map((shipment) => {
            if (shipment.item_id) {
              this.$store.dispatch("shippinga/update", shipment);
            } else {
              shipment.item_id = new_item.id;
              this.$store.dispatch("shippinga/store", this.shipments);
            }
          });
        }
        this.$router.push("/items");
      }
    },

    remove_image(image, index) {
      if (image.id) {
        this.$store.dispatch("media/delete", {
          // gallery_id: image.gallery_id,
          id: image.id,
        });
      }
      this.images.splice(index, 1);
    },
    saveColor() {
      this.color.hex_code = this.side_color;

      this.$store.dispatch("color/store", this.color).then(() => {
        this.side_color = "";
      });
    },
    saveSize() {
      this.$store.dispatch("size/store", this.size);
    },
  },

  computed: {
    ...mapState({
      categories: (state) => state.category.all,
      units: (state) => state.unit.all,
      taxes: (state) => state.tax.all,
      one: (state) => state.item.one,
      colors: (state) => state.color.all,
      sizes: (state) => state.size.all,
      all_properties: (state) => state.property.all,
      shippings: (state) => state.shipping.all,
      shippinga: (state) => state.shippinga.all,
    }),
  },
  watch: {
    one(val) {
      if (val) {
        this.item = JSON.parse(JSON.stringify(val));
        this.images = this.item.media;
        this.cover_image = this.item.cover_image;
      }
    },
    all_properties(val) {
      if (val) {
        this.properties = JSON.parse(JSON.stringify(val));
      }
    },
    shippinga(val) {
      this.shipments = val;
    },
  },
};
</script>