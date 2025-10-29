<script setup lang="ts">
import { ref } from 'vue'
import Category from './components/Category.vue'
import Promotion from './components/Promotion.vue'

const categories = ref([
  {
    id: 1,
    title: 'Cake & Milk',
    itemCount: '14 items',
    imgPath: '../src/assets/cake_milk.png',
  },
  {
    id: 2,
    title: 'Peach',
    itemCount: '17 items',
    imgPath: '../src/assets/peach.png',
  },
  {
    id: 3,
    title: 'Oganic Kiwi',
    itemCount: '21 items',
    imgPath: '../src/assets/Oganic Kiwi.png',
  },
  {
    id: 4,
    title: 'Red Apple',
    itemCount: '68 items',
    imgPath: '../src/assets/apple.png',
  },
  {
    id: 5,
    title: 'Snack',
    itemCount: '34 items',
    imgPath: '../src/assets/snack.png',
  },
  {
    id: 6,
    title: 'Black Plun',
    itemCount: '25 items',
    imgPath: '../src/assets/black_plum.png',
  },
  {
    id: 7,
    title: 'Vegetables',
    itemCount: '65 items',
    imgPath: '../src/assets/vegetable.png',
  },
  {
    id: 8,
    title: 'Headphone',
    itemCount: '33 items',
    imgPath: '../src/assets/headphone.png',
  },
  {
    id: 9,
    title: 'Cake & Milk',
    itemCount: '54 items',
    imgPath: '../src/assets/cake.png',
  },
  {
    id: 10,
    title: 'Orange',
    itemCount: '63 items',
    imgPath: '../src/assets/orange.png',
  },
])

const promotions = ref([
  {
    id: 1,
    title: 'Everyday Fresh & \nClean with Our \nProducts',
    imgPath: '../src/assets/onion.jpg',
  },
  {
    id: 2,
    title: 'Make your Breakfast \nHealthy and Easy',
    imgPath: '../src/assets/juice.png',
  },
  {
    id: 3,
    title: 'The best Organic \nProducts Online',
    imgPath: '../src/assets/organic.jpg',
  },
])
</script>

<template>
  <div class="box">
    <Category
      class="category-list"
      v-for="category in categories"
      :key="category.id"
      :model-value="category.id"
      :title="category.title"
      :item="category.itemCount"
      :image="category.imgPath"
    />
  </div>
  <Promotion
    class="promotion"
    v-for="promotion in promotions"
    :key="promotion.id"
    :model-value="promotion.id"
    :title="promotion.title"
    :image="promotion.imgPath"
  />
</template>

<style scoped>
.category-list {
  margin: 10px;
}

.box {
  display: flex;
  margin: 0;
}
.promotion {
  margin: 10px;
  float: left;
}
</style>
