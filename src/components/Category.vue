<script setup lang="ts">
defineProps(['modelValue', 'title', 'item', 'image'])
defineEmits(['update:modelValue'])

// image = "../assets/Oganic Kiwi.png";
// title = "Oganic Kiwi";
// item = "21 items";
</script>

<template>
  <div class="container" :class="`container-${modelValue}`">
    <img :src="image" :alt="title" />
    <div class="title">{{ title }}</div>
    <div class="item_num">{{ item }}</div>
  </div>
</template>

<style scoped>
.container {
  width: 137px;
  height: 177px;
  border-radius: 10px;
}
.container-1 {
  background-color: #f2fce4;
}
.container-2 {
  background-color: #fff3eb;
}
.container-3 {
  background-color: #feefea;
}
.container-4 {
  background-color: #fff3ff;
}
.container-5 {
  background-color: #f2fce4;
}
.container-6 {
  background-color: #feefea;
}
.container-7 {
  background-color: #def9ec;
}
.container-8 {
  background-color: #fef4d5;
}
.container-9 {
  background-color: #f2fce4;
}
.container-10 {
  background-color: #feefea;
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
