<template>
  <div class="container" :style="{ backgroundColor: color }">
    <img :src="image" alt="Category Image" />
    <div class="title">{{ name }}</div>
    <div class="item_num">{{ productCount }} items</div>
  </div>
</template>

<script lang="ts">
export default {
  props: ['name', 'productCount', 'color', 'image']
};
</script>

<style scoped>
.container {
  width: 137px;
  height: 177px;
  border-radius: 10px;
  float: left;
}

img {
  width: 100px;
  height: auto;
  display: block;
  margin-left: auto;
  margin-right: auto;
}
.title {
  font-family: 'Arial Black', Gadget, sans-serif;
  font-size: 16px;
  font-weight: 700;
  text-align: center;
  color: #253d4e;
}
.item_num {
  font-family: 'Arial', sans-serif;
  font-size: 12px;
  font-weight: 400;
  text-align: center;
  color: #b6b6b6;
}
</style>
