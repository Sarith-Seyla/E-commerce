<!-- <template>
  <div>
    <Category
      v-for="category in categories"
      :key="category.name"
      :name="category.name"
      :productCount="category.productCount"
      :color="category.color"
      :image="category.image"
    />

    <Promotion
      v-for="promotion in promotions"
      :key="promotion.title"
      :promotion="promotion"
    />

    <Product
      v-for="product in products"
      :key="product.id"
      :product="product"
    />
  </div>
</template>

<script lang="ts">

import Category from './components/Category.vue';
import Promotion from './components/Promotion.vue';
import Product from './components/MenuComponent.vue';
import axios, { AxiosResponse } from 'axios';

export default {
  components: {
    Category,
    Promotion,
    Product
  },
  data() {
    return {
      categories: [],
      promotions: []
      products: []
    };
  },
  
  methods: {
    fetchCategories() {
      axios.get('http://localhost:3000/api/categories')
        .then((response: AxiosResponse) => {
          this.categories = response.data.map(category => {
            return {
              ...category,
              image: `http://localhost:3000/${category.image.replace(/\\/g, '/')}`
            };
          });
        })
        .catch(error => {
          console.error('Error fetching categories:', error);
        });
    },
    fetchPromotions() {
      axios.get('http://localhost:3000/api/promotions')
        .then((response: AxiosResponse) => {
          this.promotions = response.data.map(promotion => {
            return {
              ...promotion,
              image: `http://localhost:3000/${promotion.image.replace(/\\/g, '/')}`
            };
          });
        })
        .catch(error => {
          console.error('Error fetching promotions:', error);
        });
    }
    fetchProducts() {
      axios.get('http://localhost:3000/api/products')
        .then((response: AxiosResponse) => {
          this.products = response.data.map(product => {
            return {
              ...product,
              image: `http://localhost:3000/${product.image.replace(/\\/g, '/')}`
            };
          });
        })
        .catch(error => {
          console.error('Error fetching products:', error);
        });
    }
  },
  mounted() {
    this.fetchCategories();
    this.fetchPromotions();
    this.fetchProducts();
  }
};
</script> -->






<template>
  <div class="app-container">
    
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
import { useProductStore } from './stores/product.js';

import Category from './components/Category.vue';
import Promotion from './components/Promotion.vue';
import ProductComponent from './components/ProductComponent.vue';
import MenuComponent from './components/MenuComponent.vue';

export default {
  components: {
    Category,
    Promotion,
    ProductComponent,
    MenuComponent
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
  padding: 20px;
  font-family: 'Quicksand', sans-serif;
}

.grid-container {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  margin-bottom: 50px;
  justify-content: flex-start;
  
}
</style>