<template>
  <div class="app-container">



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

    <ShowCase/>

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
import ShowCase from '../components/ShowCase.vue';
import SearchBox from '../components/SearchBox.vue';

export default {
    name: 'HomeView',
    components: {
        Category,
        Promotion,
        ProductComponent,
        MenuComponent,
        MenuItemComponent,
        ShowCase,
        SearchBox
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
  font-family: 'Quicksand', sans-serif;
  background-color: aquamarine;
}

.grid-container {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-bottom: 50px;
  align-items: center;
  justify-content: center;
  background-color: blueviolet;
}
</style>