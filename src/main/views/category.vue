<template>
  <div class="entry-content category">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="siadbar">
            <div class="box">
              <h2><i class="bi bi-list"></i>{{ $t("Categories") }}</h2>
              <ul class="category">
                <!-- <li
                  @click="selected_category = category"
                  :key="index"
                  v-for="(category, index) in categories"
                >
                  <a class="d-flex justify-content-between">
                    <span class="title">
                      <figure>
                        <img :src="category.image" alt="" />
                      </figure>
                      {{ category.name }}
                    </span>
                    <i class="bi bi-chevron-left"></i>
                  </a>
                </li> -->

                <li
                  @click="
                    category.children_count > 0
                      ? ''
                      : (selected_category = category)
                  "
                  :key="index"
                  v-for="(category, index) in categories"
                >
                  <a
                    href="javascript:void(0)"
                    :id="`link${index}`"
                    :ref="`link${index}`"
                    @click="showsupmenu(`link${index}`, `supmenu${index}`)"
                    class="d-flex justify-content-between"
                  >
                    <span class="title">
                      <figure>
                        <img :src="category.image" alt="" />
                      </figure>
                      {{ category.name }}
                    </span>
                    <i
                      v-if="category.children_count > 0"
                      class="bi bi-chevron-left"
                    ></i>
                  </a>
                  <ul
                    class="supmenu"
                    :ref="`supmenu${index}`"
                    :id="`supmenu${index}`"
                  >
                    <li
                      v-if="w.children_count > 0"
                      :key="w.children_count"
                      v-for="(w, i) in category.children"
                    >
                      <a
                        href="javascript:void(0)"
                        :id="`link${index}${i}`"
                        :ref="`link${index}${i}`"
                        class="menusup"
                        @click="
                          showsupmenu(`link${index}${i}`, `supmenu${index}${i}`)
                        "
                      >
                        <span class="title">
                          <figure>
                            <img :src="w.image" alt="" />
                          </figure>
                          {{ w.name }}
                        </span>

                        <i class="bi bi-chevron-left"></i
                      ></a>
                      <ul
                        class="supmenu"
                        :ref="`supmenu${index}${i}`"
                        :id="`supmenu${index}${i}`"
                      >
                        <li v-for="(cc, index) in w.children" :key="index">
                          <a @click="selected_category = cc">
                            <span class="title">
                              <figure>
                                <img :src="cc.image" alt="" />
                              </figure>
                              {{ cc.name }}
                            </span>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li @click="selected_category = w" v-else>
                      <a
                        href="javascript:void(0)"
                        class="d-flex justify-content-between"
                      >
                        <span class="title">
                          <figure>
                            <img :src="w.image" alt="" />
                          </figure>
                          {{ w.name }}
                        </span>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="box">
              <h2>{{ $t("filter") }}</h2>
              <div>
                <div class="min-max-slider" data-legendnum="2">
                  <div class="row">
                    <div class="col-6">
                      {{ value_2[0] }}$ - {{ value_2[1] }}$
                    </div>
                    <div class="col-2">
                      <button @click="slider_search()">
                        <i class="bi bi-search"></i>
                      </button>
                    </div>
                    <div class="col-4">
                      <span class="model">{{ $t("the_average") }}</span>
                    </div>
                  </div>
                  <div>
                    <VueSlider
                      v-model="value_2"
                      :railStyle="{ backgroundColor: '#c99820' }"
                      :processStyle="{ backgroundColor: '#c99820' }"
                      :dotStyle="{ borderColor: '#c99820' }"
                      tooltip="none"
                      :max="3000"
                    ></VueSlider>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="box">
              <h2>{{ $t("Reviews") }}</h2>
              <div>
                <div class="rating">
                  <label id="star"
                    ><i class="bi bi-star-fill"></i>
                    <input type="radio" name="starValue" value="5" />
                  </label>
                  <label id="star"
                    ><i class="bi bi-star-fill"></i>
                    <input type="radio" name="starValue" value="4" />
                  </label>
                  <label id="star"
                    ><i class="bi bi-star-fill"></i>
                    <input type="radio" name="starValue" value="3" />
                  </label>
                  <label id="star"
                    ><i class="bi bi-star-fill"></i>
                    <input type="radio" name="starValue" value="2" />
                  </label>
                  <label id="star"
                    ><i class="bi bi-star-fill"></i>
                    <input type="radio" name="starValue" value="1" />
                  </label>
                </div>
              </div>
            </div> -->
          </div>
        </div>
        <div class="col-md-9">
          <div class="head-block">
            <div class="d-flex justify-content-between align-items-center">
              <div class="right-block">
                <div class="d-flex align-items-center">
                  <h2>
                    {{
                      selected_category.name ||
                      selected_global_category.name ||
                      $t("latest items")
                    }}
                  </h2>

                  <span v-if="Object.keys(selected_category).length != 0">
                    {{
                      selected_category.items_count > 0
                        ? selected_category.items_count
                        : 0
                    }}
                    {{ $t("Available_item") }}</span
                  >
                  <span
                    v-else-if="
                      Object.keys(selected_global_category).length != 0
                    "
                  >
                    {{
                      meta.last_page > 1
                        ? 15 * meta.last_page
                        : category_items[0].all_items_count
                    }}
                    {{ $t("Available_item") }}</span
                  >
                  <span v-else
                    >{{
                      category_items[0] ? category_items[0].all_items_count : 0
                    }}
                    {{ $t("Available_item") }}
                  </span>
                </div>
              </div>
              <div class="left-block">
                <div class="d-flex">
                  <ul
                    class="select-form"
                    ref="show1"
                    id="show1"
                    @click="show_ul('show1')"
                  >
                    <li>{{ $t("count") }}</li>
                    <ul style="z-index: 9999">
                      <li><a @click.prevent="per_page = 30">30</a></li>
                      <li><a @click.prevent="per_page = 20">20</a></li>
                      <li><a @click.prevent="per_page = 15">15</a></li>
                      <li><a @click.prevent="per_page = 10">10</a></li>
                    </ul>
                  </ul>
                  <ul
                    class="select-form"
                    ref="show2"
                    id="show2"
                    @click="show_ul('show2')"
                  >
                    <li>{{ $t("must_classification") }}</li>
                    <ul style="z-index: 9999">
                      <li>
                        <a @click.prevent="sort_filter(lowest_price)">{{
                          $t("lowest_price")
                        }}</a>
                      </li>
                      <li>
                        <a @click.prevent="sort_filter(highest_price)">{{
                          $t("the_highest_price")
                        }}</a>
                      </li>
                      <li>
                        <a @click.prevent="sort_filter(most_liked)">{{
                          $t("most_liked")
                        }}</a>
                      </li>
                    </ul>
                  </ul>
                  <div class="option-show">
                    <div class="d-flex align-items-center">
                      <a href="" id="col"
                        ><img src="@/main/assets/images/col.svg" alt=""
                      /></a>
                      <a href="" id="grid"
                        ><img src="@/main/assets/images/grid.svg" alt=""
                      /></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="product">
            <div class="row">
              <div v-if="category_items == 0">
                <h4 style="text-align: center">
                  {{ $t("not data avialble") }}
                </h4>
              </div>
              <div
                :key="index"
                v-for="(category_item, index) in category_items"
                class="col-md-4"
              >
                <product :item="category_item" />
              </div>
            </div>
          </div>

          <div style="padding: 50px; display: flex; justify-content: center">
            <div class="pagination">
              <a @click.prevent="prev()">&laquo;</a>

              <a
                @click.prevent="to_page(index + 1)"
                :key="index"
                v-for="(meta1, index) in meta.last_page > 8
                  ? 8
                  : meta.last_page"
                href="#"
                :class="meta.current_page == index + 1 ? 'active' : ''"
              >
                {{ index + 1 }}
              </a>
              <span v-if="meta.last_page > 8"> ...... </span>
              <a
                v-show="meta.last_page > 8"
                @click.prevent="to_page(meta.last_page)"
                href="#"
                :class="meta.current_page == meta.last_page ? 'active' : ''"
              >
                {{ meta.last_page }}
              </a>

              <a @click.prevent="next()">&raquo;</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from "vuex";
import VueSlider from "vue-slider-component";
import "vue-slider-component/theme/antd.css";
export default {
  components: {
    VueSlider,
  },
  data() {
    return {
      per_page: null,
      value_2: [0, 3000],
      lowest_price: { lowest_price: true },
      highest_price: { highest_price: true },
      most_liked: { most_liked: true },
      testtype: null,
      toggle: null,
      myNavbar: null,
      selected_category: {},
      selected_global_category: {},
      my_categories: {},
      selected_category_items: null,
    };
  },
  mounted() {
    this.$store.dispatch("category/index", { null_parent_id: true });
    this.toggle = document.getElementById("toggle");
    this.myNavbar = document.getElementById("primary-menu");
    let loader = this.$loading.show({
      canCancel: false, // default false
      color: "#7c4707",
      loader: "spinner",
      width: 64,
      height: 64,
      backgroundColor: "#ffffff",
      opacity: 0.7,
      zIndex: 999,
    });
    if (this.$route.query.search) {
      this.$store
        .dispatch("item/index", {
          search: this.$route.query.search,
        })
        .then((data) => {
          loader.hide();
        });
    } else if (this.$route.params.id) {
      this.$store
        .dispatch("category/show", { id: this.$route.params.id })
        .then((category) => {
          if (category.children[0]) {
            this.selected_category_items = category.children.map((v) => v.id);
            this.selected_global_category = category;
            if (this.selected_category_items.length > 0) {
              this.$store
                .dispatch("item/index", {
                  category_ids: this.selected_category_items,
                })
                .then((data) => {
                  loader.hide();
                });
            }
          } else {
            this.selected_category = category;
            loader.hide();

          }
        });
    } else {
      this.$store.dispatch("item/index", { per_page: 15 }).then((data) => {
        loader.hide();
      });
    }
  },
  computed: {
    ...mapState({
      categories: (state) => state.category.all,
      category_items: (state) => state.item.all || [],
      locale: (state) => state.locales.locale,
      meta: (state) => state.item.meta,
      links: (state) => state.item.links,
    }),
    search() {
      return this.$route.query.search;
    },
  },
  watch: {
    per_page(val) {
      let loader = this.$loading.show({
        canCancel: false, // default false
        color: "#7c4707",
        loader: "spinner",
        width: 64,
        height: 64,
        backgroundColor: "#ffffff",
        opacity: 0.7,
        zIndex: 999,
      });
      this.$store
        .dispatch("item/index", { per_page: parseInt(val) })
        .then((data) => {
          loader.hide();
        });
    },
    selected_category(val) {
      let loader = this.$loading.show({
        canCancel: false, // default false
        color: "#7c4707",
        loader: "spinner",
        width: 64,
        height: 64,
        backgroundColor: "#ffffff",
        opacity: 0.7,
        zIndex: 999,
      });
      if (val) {
        this.selected_category_items = null;
        //  this.my_categories =  this.my_categories.filter()
        this.$store
          .dispatch("item/index", {
            category_id: val.id,
          })
          .then((data) => {
            loader.hide();
          });
      }
    },
    categories(val) {
      // if (val) {
      //   this.my_categories = JSON.parse(JSON.stringify(val));
      // }
    },
  },
  methods: {
    to_page(i) {
      let loader = this.$loading.show({
        canCancel: false, // default false
        color: "#7c4707",
        loader: "spinner",
        width: 64,
        height: 64,
        backgroundColor: "#ffffff",
        opacity: 0.7,
        zIndex: 999,
      });
      if (this.links.next || this.links.prev) {
        this.$store
          .dispatch("item/index", {
            page: i,
            category_id: this.selected_category?.id || null,
            category_ids: this.selected_category_items,
          })
          .then((data) => {
            loader.hide();
          });
      }
    },
    next() {
      let loader = this.$loading.show({
        canCancel: false, // default false
        color: "#7c4707",
        loader: "spinner",
        width: 64,
        height: 64,
        backgroundColor: "#ffffff",
        opacity: 0.7,
        zIndex: 999,
      });
      if (this.links.next) {
        let link = this.links.next;
        let page_num = link.slice(link.indexOf("=") + 1, link.length);
        this.$store
          .dispatch("item/index", {
            page: page_num,
            category_id: this.selected_category?.id || null,
            category_ids: this.selected_category_items,
          })
          .then((data) => {
            loader.hide();
          });
      }
    },
    prev() {
      let loader = this.$loading.show({
        canCancel: false, // default false
        color: "#7c4707",
        loader: "spinner",
        width: 64,
        height: 64,
        backgroundColor: "#ffffff",
        opacity: 0.7,
        zIndex: 999,
      });
      if (this.links.prev) {
        let link = this.links.prev;
        let page_num = link.slice(link.indexOf("=") + 1, link.length);
        this.$store
          .dispatch("item/index", {
            page: page_num,
            category_id: this.selected_category?.id || null,
            category_ids: this.selected_category_items,
          })
          .then((data) => {
            loader.hide();
          });
      }
    },
    sort_filter(type) {
      let loader = this.$loading.show({
        canCancel: false, // default false
        color: "#7c4707",
        loader: "spinner",
        width: 64,
        height: 64,
        backgroundColor: "#ffffff",
        opacity: 0.7,
        zIndex: 999,
      });
      this.$store
        .dispatch("item/index", { per_page: 15, ...type })
        .then((data) => {
          loader.hide();
        });
    },
    slider_search() {
      let loader = this.$loading.show({
        canCancel: false, // default false
        color: "#7c4707",
        loader: "spinner",
        width: 64,
        height: 64,
        backgroundColor: "#ffffff",
        opacity: 0.7,
        zIndex: 999,
      });
      this.$store
        .dispatch("item/index", {
          per_page: 15,
          slider: this.value_2,
        })
        .then((data) => {
          loader.hide();
        });
    },
    show_ul(elm) {
      var elm = document.getElementById(elm);
      elm.classList.toggle("active");
    },
    showsupmenu(e11, e22) {
      let e1 = this.$refs[e11][0].id;
      let e2 = this.$refs[e22][0].id;
      this.$el.querySelector(`#${e1}`).classList.toggle("active");
      this.$el.querySelector(`#${e2}`).classList.toggle("open");
    },
    filterIfNestedChiled(chiled) {
      if (chiled.chiledren_count > 0) {
      }
    },
  },
};
</script>
<style scoped>
.vue-slider-process {
  background-color: yellow !important;
}
.vue-slider-process:hover {
  background-color: red !important;
}
</style>
