<script setup lang="ts">
defineProps(['buttonColor'])
</script>
<template>
  <div>
    <div class="shop_button" :style="{ backgroundColor: buttonColor }">
      <div class="txt">Shop Now</div>
      <img src="../assets/arrow.png" alt="arrow" />
    </div>
  </div>
</template>

<style scoped>
.shop_button {
  display: flex;
  width: 109.83px;
  height: 31px;
  background-color: #3bb77e;
  color: white;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 3px;
}

.txt {
  font-family: 'Roboto', sans-serif;
  font-weight: 700;
  font-size: 12px;
  margin: auto;
}
img {
  width: 10.83px;
  height: 9.51px;
  margin: auto 15px auto 3px;
}
</style>
