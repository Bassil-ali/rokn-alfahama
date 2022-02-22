<template>
  <div class="entry-content category">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="siadbar">
            <div class="box">
              <h2><i class="bi bi-list"></i>{{ $t("Categories") }}</h2>
              <!-- <ul class="category">
                <nested-menu :categories="categories"></nested-menu>
              </ul> -->
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <div
            @click.self ="test"
            style="border: green solid 1px; background-color: green"
          >
            parent
            <div
              style="border: red solid 1px; width: 50%; background-color: red"
            >
              child
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from "vuex";
export default {
  data() {
    return {
      toggle: null,
      myNavbar: null,
      selected_category: {},
      my_categories: {},
    };
  },
  mounted() {
    this.$store.dispatch("category/index", { null_parent_id: true });
  },
  computed: {
    ...mapState({
      categories: (state) => state.category.all,
      category_items: (state) => state.item.all,
      locale: (state) => state.locales.locale,
    }),
  },
  watch: {
    selected_category(val) {
      if (val) {
        //  this.my_categories =  this.my_categories.filter()
        this.$store.dispatch("item/index", { category_id: val.id });
      }
    },
  },
  methods: {
    test(event) {
      // console.log("AAAA7AAA");
      // console.log(event);
      // console.log("AAAA7AAA");
    },
    showsupmenu(e11, e22) {
      // console.log("NOT nested");
      // console.log(this.$refs);
      // console.log(this.$refs);
      // console.log(this.$refs);
      // console.log(this.$refs);
      // console.log(this.$refs);
      // console.log(this.$refs);
      // console.log(this.$refs);
      // console.log("NOT nested");

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
 