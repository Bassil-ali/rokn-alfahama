<template>
  <div class="item">
    <a :href="`/main/category`">
      <figure>
        <img :src="item.image" alt="" />
      </figure>
      <span>{{ item.name }}</span>
    </a>
  </div>
</template>
<script>
export default {
  props: ["item"],
};
</script>