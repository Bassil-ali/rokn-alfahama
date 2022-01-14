<template>
  <ul>
    <li :key="index" v-for="(category, index) in categories">
      <a
        href="javascript:void(0)"
        :id="`link${index}`"
        :ref="`link${index}`"
        @click="showsupmenu(`link${index}`, `supmenu${index}`)"
        class="d-flex justify-content-between"
      >
        <span class="title"
          ><figure><img :src="category.image" alt="" /></figure>
          {{ category.name }}</span
        ><i v-show="category.children_count != 0" class="bi bi-chevron-left"></i
      ></a>
      <ul
        :key="i"
        v-for="(w, i) in category.children"
        v-if="w.children_count > 0"
        class="supmenu"
        :ref="`supmenu${index}`"
        :id="`supmenu${index}`"
      >
        <li>
          <a
            href="javascript:void(0)"
            :id="`link${i}${index}`"
            :ref="`link${i}${index}`"
            class="menusup"
            @click="showsupmenu(`link${i}${index}`, `supmenu${i}${index}`)"
          >
            <span class="title"
              ><figure><img :src="w.image" alt="" /></figure>
              {{ w.name }}</span
            ><i  class="bi bi-chevron-left"></i
          ></a>
          <ul
            class="supmenu"
            :ref="`supmenu${i}${index}`"
            :id="`supmenu${i}${index}`"
          >
            <nested-menu :categories="w" />
          </ul>
        </li>
      </ul>
      <ul v-else>
                       <li>
          <a
            href="javascript:void(0)"
            :id="`link${i}${index}`"
            :ref="`link${i}${index}`"
            class="menusup"
            @click="showsupmenu(`link${i}${index}`, `supmenu${i}${index}`)"
          >
            <span class="title"
              ><figure><img :src="w.image" alt="" /></figure>
              {{ w.name }}</span
            ><i  class="bi bi-chevron-left"></i
          ></a>
          <ul
            class="supmenu"
            :ref="`supmenu${i}${index}`"
            :id="`supmenu${i}${index}`"
          >
            <nested-menu :categories="w" />
          </ul>
        </li>
      </ul>
    </li>
  </ul>
</template>

<script>
export default {
  props: ["categories"],
  methods: {
    showsupmenu(e11, e22) {
      let e1 = this.$refs[e11][0].id;
      let e2 = this.$refs[e22][0].id;
      this.$el.querySelector(`#${e1}`).classList.toggle("active");
      this.$el.querySelector(`#${e2}`).classList.toggle("open");
    },
  },
};
</script>

<style>
</style>