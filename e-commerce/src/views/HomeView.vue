<template>
  <div class="app-container">
    <!-- <MenuItemComponent 
      title="Melon" 
      :items="categories" 
    /> -->

    <MenuComponent 
      title="Featured Categories" 
      :items="categories" 
    />
    
    <div class="grid-container">
      <Category
        v-for="category in categories"
        :key="category.name"
        :name="category.name"
        :productCount="category.productCount"
        :color="category.color"
        :image="category.image"
      />
    </div>

    <div class="grid-container">
      <Promotion
        v-for="promotion in promotions"
        :key="promotion.title"
        :promotion="promotion"
      />
    </div>

    <MenuComponent 
      title="Popular Products" 
      :items="categories" 
    />

    <div class="grid-container">
      <ProductComponent
        v-for="product in popularProducts"
        :key="product.id"
        :product="product"
      />
    </div>

  </div>
</template>

<script lang="ts">
import { mapState, mapActions } from 'pinia';
import { useProductStore } from '../stores/product.js';

import Category from '../components/Category.vue';
import Promotion from '../components/Promotion.vue';
import ProductComponent from '../components/ProductComponent.vue';
import MenuComponent from '../components/MenuComponent.vue';
import MenuItemComponent  from '../components/MenuItemComponent.vue';

export default {
    name: 'HomeView',
    components: {
        Category,
        Promotion,
        ProductComponent,
        MenuComponent,
        MenuItemComponent
    },
    computed: {

        ...mapState(useProductStore, {
        categories: 'categories',
        promotions: 'promotions',
        popularProducts: 'getPopularProducts' 
        })
    },
    methods: {
        ...mapActions(useProductStore, ['fetchAllData'])
    },
    mounted() {
        this.fetchAllData();
    }
};
</script>

<style>

.app-container {
  max-width: 1600px;
  margin: 0 auto;
  padding: 5px;
  font-family: 'Quicksand', sans-serif;

}

.grid-container {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-bottom: 50px;
  align-items: center;
  justify-content: center;
  
}
</style>