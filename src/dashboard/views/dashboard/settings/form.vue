<template>
  <v-container id="regular-tables" fluid tag="section">
    <base-v-component :heading="$t('site_settings')" />

    <base-material-card
      icon="mdi-clipboard-text"
      :title="$t('contct_form')"
      class="px-5 py-3"
    >
      <v-form>
        <v-row>
          <v-col cols="12" lg="3">
            <v-text-field v-model="item.phone" :label="$t('phone')" dense />
          </v-col>
          <v-col cols="12" lg="3">
            <v-text-field v-model="item.mobile" :label="$t('mobile')" dense />
          </v-col>
          <v-col cols="12" lg="3">
            <v-text-field
              v-model="item.facebook"
              hint="https://www.facebook.com/username"
              :label="$t('facebook_link')"
              dense
            />
          </v-col>
          <v-col cols="12" lg="3">
            <v-text-field
              v-model="item.instgram"
              hint="https://www.instagram.com/username"
              :label="$t('instagram_link')"
              dense
            />
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="12" lg="3">
            <v-text-field
              v-model="item.contect_email"
              :label="$t('contact_email')"
              dense
            />
          </v-col>
          <v-col cols="12" lg="3">
            <v-text-field
              v-model="item.address_ar"
              :label="$t('address_in_ar')"
              dense
            />
          </v-col>
          <v-col cols="12" lg="3">
            <v-text-field
              v-model="item.address_en"
              :label="$t('address_in_en')"
              dense
            />
          </v-col>
        </v-row>
      </v-form>
    </base-material-card>
    <base-material-card
      icon="mdi-clipboard-text"
      :title="$t('who_us_form')"
      class="px-5 py-3"
    >
      <v-form>
        <v-row>
          <v-col cols="12" lg="6">
            <v-row>
              <v-col cols="12" lg="6">
                <v-textarea
                  v-model="item.who_us[0].content_ar"
                  :label="$t('firts_paragraph_ar')"
                  dense
                >
                </v-textarea>
                <v-textarea
                  v-model="item.who_us[0].content_en"
                  :label="$t('firts_paragraph_en')"
                  dense
                >
                </v-textarea>
              </v-col>
              <v-col cols="12" lg="6">
                <v-file-input
                  rounded
                  v-model="item.who_us[0].image_url"
                  :label="$t('cover_image')"
                  hide-details
                ></v-file-input>
                <v-img
                  v-if="item.who_us[0].image_url"
                  :src="get_url(item.who_us[0].image_url)"
                  width="300"
                >
                </v-img>
              </v-col>
            </v-row>
          </v-col>

          <v-col cols="12" lg="6">
            <v-row>
              <v-col style="display: block" cols="12" lg="6">
                <v-textarea
                  v-model="item.who_us[1].content_ar"
                  :label="$t('second_paragraph_ar')"
                  dense
                >
                </v-textarea>
                <v-textarea
                  v-model="item.who_us[1].content_en"
                  :label="$t('second_paragraph_en')"
                  dense
                >
                </v-textarea>
              </v-col>
              <v-col cols="12" lg="6">
                <v-file-input
                  rounded
                  v-model="item.who_us[1].image_url"
                  :label="$t('cover_image')"
                  hide-details
                ></v-file-input>
                <v-img
                  v-if="item.who_us[1].image_url"
                  :src="get_url(item.who_us[1].image_url)"
                  width="300"
                >
                </v-img>
              </v-col>
            </v-row>
          </v-col>
        </v-row>
      </v-form>
    </base-material-card>
    <base-material-card
      icon="mdi-clipboard-text"
      :title="$t('common_questions_form')"
      class="px-5 py-3"
    >
      <v-form>
        <v-row class="mt-5 mb-5">
          <v-btn @click="addQuestion()" icon>
            <v-icon color="green"> fas fa-plus </v-icon>
          </v-btn>
        </v-row>
        <v-row
          style="border: lightgrey solid 1px"
          :key="index"
          v-for="(question, index) in item.questions"
        >
          <v-col cols="12">
            <v-row>
              <v-col cols="12" md="2">
                <v-text-field
                  dense
                  outlined
                  v-model="question.title_ar"
                  :label="$t('quastion_title_ar')"
                >
                  <template v-slot:prepend>
                    {{ "(" + (index + 1) }}
                  </template>
                </v-text-field>
              </v-col>
              <v-col cols="12" md="2">
                <v-text-field
                  dense
                  outlined
                  v-model="question.title_en"
                  :label="$t('quastion_title_en')"
                >
                </v-text-field>
              </v-col>
              <v-col cols="12" md="3">
                <v-textarea
                  outlined
                  dense
                  height="20px"
                  v-model="question.answer_ar"
                  :label="$t('answer_ar')"
                >
                </v-textarea>
              </v-col>
              <v-col cols="12" md="3">
                <v-textarea
                  dense
                  outlined
                  height="20px"
                  v-model="question.answer_en"
                  :label="$t('answer_en')"
                >
                </v-textarea>
              </v-col>
              <v-col cols="1">
                <v-btn @click="deleteQuestion(index)" icon>
                  <v-icon color="red"> fas fa-times </v-icon>
                </v-btn>
              </v-col>
            </v-row>
          </v-col>
        </v-row>
      </v-form>
    </base-material-card>
    <base-material-card
      icon="mdi-clipboard-text"
      :title="$t('Terms_of_use')"
      class="px-5 py-3"
    >
      <v-form>
        <v-row class="mt-5 mb-5">
          <v-btn @click="addCondition()" icon>
            <v-icon color="green"> fas fa-plus </v-icon>
          </v-btn>
        </v-row>
        <v-row
          style="border: lightgrey solid 1px"
          :key="index"
          v-for="(condition, index) in item.conditions"
        >
          <v-col cols="12">
            <v-row>
              <v-col cols="12" md="2">
                <v-text-field
                  dense
                  outlined
                  v-model="condition.title_ar"
                  :label="$t('condition_title_ar')"
                >
                  <template v-slot:prepend>
                    {{ "(" + (index + 1) }}
                  </template>
                </v-text-field>
              </v-col>
              <v-col cols="12" md="2">
                <v-text-field
                  dense
                  outlined
                  v-model="condition.title_en"
                  :label="$t('condition_title_en')"
                >
                </v-text-field>
              </v-col>
              <v-col cols="12" md="3">
                <v-textarea
                  outlined
                  dense
                  height="20px"
                  v-model="condition.paragraph_ar"
                  :label="$t('paragaph_ar')"
                >
                </v-textarea>
              </v-col>
              <v-col cols="12" md="3">
                <v-textarea
                  dense
                  outlined
                  height="20px"
                  v-model="condition.paragraph_en"
                  :label="$t('paragaph_en')"
                >
                </v-textarea>
              </v-col>
              <v-col cols="1">
                <v-btn @click="deleteCondition(index)" icon>
                  <v-icon color="red"> fas fa-times </v-icon>
                </v-btn>
              </v-col>
            </v-row>
          </v-col>
        </v-row>
        <!-- <v-row>
          <v-col cols="12">
            <v-btn dark color="primary" block @click="save(item)">
              <v-icon> mdi-check </v-icon>
              {{ $t("save") }}
            </v-btn>
          </v-col>
        </v-row> -->
      </v-form>
    </base-material-card>
    <base-material-card
      icon="mdi-clipboard-text"
      :title="$t('order info')"
      class="px-5 py-3"
    >
      <v-form>
        <v-row>
          <v-col cols="12" md="3">
            <v-text-field
              type="number"
              v-model="item.limit_price_for_shipment"
              :label="$t('shipment amount')"
            ></v-text-field>
          </v-col>
          <v-col cols="12" md="3">
            <v-text-field
              type="number"
              v-model="item.shipment_amount"
              :label="$t('shipment limit price')"
            ></v-text-field>
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
  name: "ItemForm",
  data() {
    return {
      item: {
        who_us: [
          { content_en: null, content_ar: null, image_url: null },
          { content_en: null, content_ar: null, image_url: null },
        ],
        questions: [{}],
        conditions: [{}],
        limit_price_for_shipment: 0,
        shipment_amount: 0,
      },
    };
  },
  mounted() {
    this.$store.dispatch("setting/index");
  },
  methods: {
    addCondition() {
      this.item.conditions.push({});
    },
    deleteCondition(index) {
      this.item.conditions.splice(index, 1);
    },
    addQuestion() {
      this.item.questions.push({});
    },
    deleteQuestion(index) {
      this.item.questions.splice(index, 1);
    },
    async save(item) {
      if (item.who_us[1].image_url) {
        if (typeof item.who_us[1].image_url != "string") {
          let new_image = await this.$store.dispatch("media/store", {
            file: item.who_us[1].image_url,
            is_file: true,
          });
          item.who_us[1].image_url = new_image.url;
        }
      }
      if (item.who_us[0].image_url) {
        if (typeof item.who_us[0].image_url != "string") {
          let new_image = await this.$store.dispatch("media/store", {
            file: item.who_us[0].image_url,
            is_file: true,
          });
          item.who_us[0].image_url = new_image.url;
        }
      }

      this.$store.dispatch("setting/store", { settings: { ...item } });
    },
    get_url(image) {
      return typeof image != "string" ? URL.createObjectURL(image) : image;
    },
  },

  computed: {
    ...mapState({
      all: (state) => state.setting.all,
    }),
  },
  watch: {
    all(val) {
      if (val) {
        let newItem = JSON.parse(JSON.stringify(val));
        this.item = newItem
          .map((i) => {
            return { [i.key]: i.value };
          })
          .reduce((c, n) => {
            let new_item = {
              who_us: [
                { content_en: null, content_ar: null, image_url: null },
                { content_en: null, content_ar: null, image_url: null },
              ],
              questions: [{}],
              conditions: [{}],
              ...c,
              ...n,
            };
            return new_item;
          });
      }
    },
  },
};
</script>