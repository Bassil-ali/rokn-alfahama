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
            <div class="box">
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
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="head-block">
            <div class="d-flex justify-content-between align-items-center">
              <div class="right-block">
                <div class="d-flex align-items-center">
                  <h2>{{ selected_category.name || $t("latest items") }}</h2>

                  <span v-if="!selected_category">
                    {{
                      selected_category.items_count > 0
                        ? selected_category.items_count
                        : 0
                    }}
                    عنصر متوفر</span
                  >
                  <span v-else
                    >{{
                      category_items[0] ? category_items[0].all_items_count : 0
                    }}
                    عنصر متوفر
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
                    <li>الاكثر تصنيفاً</li>
                    <ul style="z-index: 9999">
                      <li>
                        <a @click.prevent="sort_filter(lowest_price)"
                          >الاقل سعر</a
                        >
                      </li>
                      <li>
                        <a @click.prevent="sort_filter(highest_price)"
                          >الاعلي سعر</a
                        >
                      </li>
                      <li>
                        <a @click.prevent="sort_filter(most_liked)"
                          >الاكثر اعجابا</a
                        >
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
              <div
                :key="index"
                v-for="(category_item, index) in category_items"
                class="col-md-4"
              >
                <product :item="category_item" />
              </div>
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
      my_categories: {},
    };
  },
  mounted() {
    this.toggle = document.getElementById("toggle");
    this.myNavbar = document.getElementById("primary-menu");
    this.$store.dispatch("category/index", { null_parent_id:true });
    if (this.$route.query.search) {
      this.$store.dispatch("item/index", { search: this.$route.query.search });
    } else {
      this.$store.dispatch("item/index");
    }
    // if (this.$route.query.type) {
    //   let type = this.$route.query.type;
    //   if (this.categories.length >= 1) {
    //     this.selected_category = this.categories.find((v) => v.id == type);
    //   }
    // }
  },
  computed: {
    ...mapState({
      categories: (state) => state.category.all,
      category_items: (state) => state.item.all || [],
      locale: (state) => state.locales.locale,
    }),
    search() {
      return this.$route.query.search;
    },
  },
  watch: {
    per_page(val) {
      this.$store.dispatch("item/index", { per_page: val });
    },
    selected_category(val) {
      if (val) {
        //  this.my_categories =  this.my_categories.filter()
        this.$store.dispatch("item/index", { category_id: val.id });
      }
    },
    categories(val) {
      // if (val) {
      //   this.my_categories = JSON.parse(JSON.stringify(val));
      // }
    },
  },
  methods: {
    sort_filter(type) {
      this.$store.dispatch("item/index", type);
    },
    slider_search() {
      this.$store.dispatch("item/index", { slider: this.value_2 });
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
 
