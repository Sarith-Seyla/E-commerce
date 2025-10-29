<script setup lang="ts">
import Btn from '../components/Button.vue'
defineProps(['modelValue', 'title', 'image'])
defineEmits(['update:modelValue'])

const getButtonColor = (id: number) => {
  switch (id) {
    case 1:
      return '#3bb77e'
    case 2:
      return '#3bb77e'
    case 3:
      return '#FDC040'
  }
}
</script>
<template>
  <!-- <div class="pro_container">
    <img src="../assets/onion.jpg" alt="" />
    <h4 class="text">
      Everyday Fresh & <br />
      Clean with Our <br />
      Products
    </h4>
    <Btn class="Btn" />
  </div> -->
  <div class="pro_container" :class="`pro_container-${modelValue}`">
    <img :src="image" :alt="title" :class="{ 'juice-image': title.includes('Breakfast') }" />
    <div class="text">{{ title }}</div>
    <Btn class="Btn" :button-color="getButtonColor(modelValue)" />
  </div>
</template>

<style scoped>
.pro_container {
  width: 470px;
  height: 290px;
  background-color: #f0e8d5;
  border-radius: 10px;
  margin-top: 20px;
}
.pro_container-1 {
  background-color: #f0e8d5;
}
.pro_container-2 {
  background-color: #f3e8e8;
}
.pro_container-3 {
  background-color: #e7eaf3;
}
.Btn {
  position: absolute;
  margin-top: 170px;
  padding-left: 40px;
}
.text {
  position: absolute;
  font-family: 'Poppins', sans-serif;
  font-size: 20px;
  font-weight: 700;
  text-align: left;
  color: #253d4e;
  padding-top: 70px;
  padding-left: 40px;
  white-space: pre-line;
}
img {
  position: absolute;
  width: 420px;
  height: 210px;
  margin-left: 50px;
  margin-top: 75px;
}
.juice-image {
  width: 204px;
  height: 252px;
  margin-left: 265px;
  margin-top: 30px;
}
</style>
