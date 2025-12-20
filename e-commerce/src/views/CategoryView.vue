<template>
  <div class="app-container">
    <div class="main_header">
      <div class="header">
        <div>
            <img src="../assets/logo.png" alt=""></img>
        </div>
        <div class="SearchBox">
            <SearchBox />
        </div>
        
        <div class="header_menu"> 
            <img src="../assets/account_icon.png"></img>
            <MenuItemComponent label="Account" >   </MenuItemComponent> 

            <img src="../assets/compare_icon.png"></img>
            <MenuItemComponent label="Compare" >   </MenuItemComponent> 

            <img src="../assets/heart_icon.png"></img>
            <MenuItemComponent label="Wishlist" >   </MenuItemComponent> 

            <img src="../assets/shopping_icon.png"></img>
            <MenuItemComponent label="Cart" >   </MenuItemComponent> 
        </div>

      </div>

      <div>
        <ul class="nav-list">
          <div class="menu_box">
            <MenuItemComponent label="Browse All Categories" :allCategories="true" :hasDropdown="true"/>
          </div>
          <MenuItemComponent label="Hot Deals" :isHot="true" />
          <MenuItemComponent label="Home" />
          <MenuItemComponent label="Food" :hasDropdown="true" />
          <MenuItemComponent label="Vegetables" :hasDropdown="true" />
          <MenuItemComponent label="Drink"/>
          <MenuItemComponent label="Cookies"/>
          <MenuItemComponent label="Meat&Seafood" :hasDropdown="true"/>
          <MenuItemComponent label="Bakery"/>

          <div class="call_box">
              <img src="../assets/call_icon.png" alt="" style="width: 50px; height: 50px; margin-right: 10px;"></img>
              <div>
                  <span style="font-size: 24px; color: green; font-weight: bold;">099 777 888</span><br>
                  <span style="font-size: 14px; color: #7E7E7E;">24/7 Support Center</span>
              </div>

          </div>

        </ul>
      </div>
    </div>

    <!-- Category Banner -->
    <div class="category-banner" v-if="currentCategory" :style="{ backgroundColor: currentCategory.color }">
      <div class="banner-content">
        <h1>{{ currentCategory.name }}</h1>
        <div class="breadcrumb">
          <router-link to="/">Home</router-link>
          <span> > </span>
          <router-link to="/">Categories</router-link>
          <span> > </span>
          <span>{{ currentCategory.name }}</span>
        </div>
      </div>
    </div>

  </div>
</template>

<script lang="ts">
import { mapState, mapGetters, mapActions } from 'pinia';
import { useProductStore } from '../stores/product.js';

import MenuComponent from '../components/MenuComponent.vue';
import MenuItemComponent  from '../components/MenuItemComponent.vue';
import SearchBox from '../components/SearchBox.vue';

export default {
    name: 'CategoryView',
    components: {
        MenuComponent,
        MenuItemComponent,
        SearchBox
    },
    computed: {
        ...mapState(useProductStore, ['categories', 'products']),
        ...mapGetters(useProductStore, ['getProductsByCategory']),
        
        categoryId() {
            return this.$route.params.categoryId;
        },
        
        currentCategory() {
            return this.categories.find(cat => cat.id == this.categoryId);
        },
        
        categoryProducts() {
            return this.getProductsByCategory(parseInt(this.categoryId));
        }
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
.main_header{
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  width: 100%;
  background-color: white;
  z-index: 1000;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
.header{
  /* background-color: blue; */
  display: flex;
}
.header .SearchBox{
  align-items: center;
  justify-content: center;
  padding-left: 60px;
}

.nav-list{
  display: flex;
  gap: 50px;
}

.header_menu{
  display: flex;
}
.header_menu img{
  margin-top: 30px;
  width: 20px;
  height: 20px;
  margin-left: 30px;
  margin-right: 5px;
}
.menu_box{
  height: 44px;
  width: 250px;
  background-color: #3BB77E;
  border-radius: 5px;
  align-content: center;
}

.call_box{
  display: flex;
}
.app-container {
  max-width: 1600px;
  margin: 0 auto;
  padding: 5px;
  padding-top: 120px;
  font-family: 'Quicksand', sans-serif;
}

.category-banner {
  padding: 40px 20px;
  margin-top: 50px;
  border-radius: 5px;
  color: #253D4E;
  background-image: url('../assets/bg_showcase.png');
  background-size: 90%;
  background-blend-mode: lighten;
}

.banner-content h1 {
  font-size: 48px;
  font-weight: bold;
  margin: 0 0 20px 0;
}

.breadcrumb {
  font-size: 14px;
}

.breadcrumb a {
  color: #253D4E;
  text-decoration: none;
}

.breadcrumb a:hover {
  text-decoration: underline;
}

.breadcrumb span {
  margin: 0 5px;
}

.products-section {
  margin: 50px 0;
  padding: 20px;
}

.products-section h2 {
  font-size: 28px;
  font-weight: bold;
  margin-bottom: 30px;
  color: #253d4e;
}

.grid-container {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-bottom: 50px;
  align-items: center;
  justify-content: center;
}

.no-products {
  text-align: center;
  padding: 40px 20px;
  color: #999;
  font-size: 18px;
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