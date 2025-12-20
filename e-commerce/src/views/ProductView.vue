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

    <!-- Breadcrumb Navigation -->
    <div class="breadcrumb-wrapper" v-if="currentProduct">
      <div class="breadcrumb">
        <router-link to="/">Home</router-link>
        <span> / </span>
        <router-link to="/">{{ currentProduct.category || 'Products' }}</router-link>
        <span> / </span>
        <span>{{ currentProduct.name }}</span>
      </div>
    </div>

    <!-- Product Detail Section -->
    <div class="product-detail" v-if="currentProduct">
      <!-- Left side - Image Gallery -->
      <div class="detail-left">
        <div class="main-image">
          <img :src="currentProduct.image" :alt="currentProduct.name" />
        </div>
        <div class="thumbnail-images">
          <img 
            v-for="(image, index) in [currentProduct.image]" 
            :key="index"
            :src="image" 
            :alt="`Thumbnail ${index}`"
            class="thumbnail"
            @click="selectedImage = image"
          />
        </div>
      </div>

      <!-- Right side - Details -->
      <div class="detail-right">
        <div class="status-badge" v-if="currentProduct.countSold">In Stock</div>
        
        <h1 class="product-title">{{ currentProduct.name }}</h1>
        
        <div class="rating-box">
          <div class="stars">
            <img src="@/assets/star-yellow.png" v-for="n in 4" :key="n" />
            <img src="@/assets/star-gray.png" /> 
          </div>
          <span class="rating-num">({{ currentProduct.rating || '4.0' }})</span>
        </div>

        <div class="price-section">
          <span class="current-price">${{ currentProduct.price }}</span>
          <span class="old-price" v-if="currentProduct.oldPrice">${{ currentProduct.oldPrice }}</span>
        </div>

        <p class="description">
          {{ currentProduct.description || 'High-quality product with excellent features and durability.' }}
        </p>

        <div class="actions">
          <div class="quantity-control">
            <button class="qty-btn" @click="quantity > 1 ? quantity-- : null">-</button>
            <input type="number" v-model.number="quantity" min="1" />
            <button class="qty-btn" @click="quantity++">+</button>
          </div>
          <button class="add-to-cart-btn">
            <img src="@/assets/shopping_icon.png" alt="cart" /> Add To Cart
          </button>
          <button class="wishlist-btn">
            <img src="@/assets/heart_icon.png" alt="wishlist" />
          </button>
        </div>

        <div class="info-section">
          <div class="info-item">
            <span class="label">Vendor:</span>
            <span class="value">{{ currentProduct.vendor || 'NextMart' }}</span>
          </div>
          <div class="info-item">
            <span class="label">SKU:</span>
            <span class="value">{{ currentProduct.sku || 'N/A' }}</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Tabs Section -->
    <div class="tabs-section" v-if="currentProduct">
      <div class="tabs">
        <button 
          v-for="tab in tabs" 
          :key="tab"
          :class="['tab-btn', { active: activeTab === tab }]"
          @click="activeTab = tab"
        >
          {{ tab }}
        </button>
      </div>

      <div class="tab-content">
        <div v-if="activeTab === 'Description'" class="tab-pane">
          <p>{{ currentProduct.description || 'Uninhibited carnally hired played in whimpered dear gorilla koala depending and much yikes off far quetzal goodness and from for grimaced goodness unaccountably and meadowlark near unblushingly crucial scallop tightly neurotic hungrily some and dear furiously this apart. Spluttered narrowly yikes left moth in yikes bowed this that grizzly much hello on spoon-fed that alas rethought much decently richly and wow against the frequent fluidly at formidable acceptably flapped besides and much circa far over the bucolically hey precarious goldfinch mastodon goodness gnashed a jellyfish and one however because. ' }}</p>
        </div>
        <div v-if="activeTab === 'Additional Info'" class="tab-pane">
          <p>Additional information: This is a premium quality product sourced from trusted suppliers. Guaranteed fresh and authentic.</p>
        </div>
        <div v-if="activeTab === 'Reviews'" class="tab-pane">
          <p>No reviews yet. Be the first to review this product!</p>
        </div>
      </div>
    </div>

  </div>
</template>

<script lang="ts">
import { mapState, mapActions } from 'pinia';
import { useProductStore } from '../stores/product.js';

import ProductComponent from '../components/ProductComponent.vue';
import MenuItemComponent from '../components/MenuItemComponent.vue';
import SearchBox from '../components/SearchBox.vue';

export default {
    name: 'ProductView',
    components: {
        ProductComponent,
        MenuItemComponent,
        SearchBox
    },
    data() {
        return {
            quantity: 1,
            activeTab: 'Description',
            tabs: ['Description', 'Additional Info', 'Reviews'],
            selectedImage: ''
        }
    },
    computed: {
        ...mapState(useProductStore, ['products']),
        
        productId() {
            return this.$route.params.productId;
        },
        
        currentProduct() {
            return this.products.find(prod => prod.id == this.productId);
        },
        
        relatedProducts() {
            if (!this.currentProduct) return [];
            // Show other products from the same category or first 6 products
            return this.products.filter(p => p.id !== this.currentProduct.id).slice(0, 6);
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

<style scoped>
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

/* Breadcrumb */
.breadcrumb-wrapper {
  padding: 20px 0;
  font-size: 14px;
}

.breadcrumb {
  color: #999;
}

.breadcrumb a {
  color: #3BB77E;
  text-decoration: none;
}

.breadcrumb a:hover {
  text-decoration: underline;
}

.breadcrumb span {
  margin: 0 5px;
}

/* Detail Layout */
.product-detail {
  display: flex;
  gap: 40px;
  margin: 30px 0;
  padding: 20px 0;
}

.detail-left {
  flex: 1;
  min-width: 300px;
}

.main-image {
  background: #f9f9f9;
  border-radius: 10px;
  padding: 20px;
  text-align: center;
  margin-bottom: 15px;
}

.main-image img {
  max-width: 100%;
  height: auto;
  max-height: 500px;
}

.thumbnail-images {
  display: flex;
  gap: 10px;
}

.thumbnail {
  width: 80px;
  height: 80px;
  border: 2px solid #ddd;
  border-radius: 8px;
  cursor: pointer;
  object-fit: cover;
  transition: border-color 0.3s;
}

.thumbnail:hover {
  border-color: #3BB77E;
}

.detail-right {
  flex: 1;
  min-width: 300px;
}

.status-badge {
  display: inline-block;
  background-color: #c6f5e0;
  color: #3BB77E;
  padding: 6px 12px;
  border-radius: 20px;
  font-size: 12px;
  font-weight: bold;
  margin-bottom: 15px;
}

.product-title {
  font-size: 32px;
  font-weight: bold;
  color: #253d4e;
  margin: 15px 0;
  line-height: 1.3;
}

.rating-box {
  display: flex;
  align-items: center;
  gap: 10px;
  margin: 15px 0;
}

.stars {
  display: flex;
  gap: 4px;
}

.stars img {
  width: 16px;
  height: 16px;
}

.rating-num {
  color: #999;
  font-size: 14px;
}

.price-section {
  display: flex;
  align-items: center;
  gap: 15px;
  margin: 20px 0;
  font-size: 24px;
  font-weight: bold;
}

.current-price {
  color: #3BB77E;
  font-size: 32px;
}

.old-price {
  color: #999;
  text-decoration: line-through;
  font-size: 18px;
}

.description {
  color: #666;
  font-size: 14px;
  line-height: 1.6;
  margin: 20px 0;
}

.actions {
  display: flex;
  gap: 15px;
  align-items: center;
  margin: 30px 0;
}

.quantity-control {
  display: flex;
  align-items: center;
  border: 1px solid #ddd;
  border-radius: 5px;
  overflow: hidden;
}

.qty-btn {
  background: none;
  border: none;
  width: 36px;
  height: 36px;
  font-size: 16px;
  cursor: pointer;
  color: #999;
  transition: background 0.3s;
}

.qty-btn:hover {
  background: #f5f5f5;
}

.quantity-control input {
  width: 50px;
  border: none;
  text-align: center;
  font-size: 14px;
}

.quantity-control input:focus {
  outline: none;
}

.add-to-cart-btn {
  flex: 1;
  padding: 12px 20px;
  background-color: #3BB77E;
  color: white;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  transition: opacity 0.3s;
}

.add-to-cart-btn:hover {
  opacity: 0.9;
}

.add-to-cart-btn img {
  width: 18px;
  height: 18px;
}

.wishlist-btn {
  width: 40px;
  height: 40px;
  border: 1px solid #ddd;
  background: white;
  border-radius: 5px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: background 0.3s;
}

.wishlist-btn:hover {
  background: #f5f5f5;
}

.wishlist-btn img {
  width: 18px;
  height: 18px;
}

.info-section {
  margin-top: 30px;
  padding-top: 20px;
  border-top: 1px solid #ddd;
}

.info-item {
  display: flex;
  justify-content: space-between;
  padding: 10px 0;
  font-size: 14px;
}

.info-item .label {
  color: #666;
  font-weight: 500;
}

.info-item .value {
  color: #253d4e;
}

/* Tabs */
.tabs-section {
  margin: 50px 0;
  padding: 20px 0;
  border-top: 1px solid #ddd;
}

.tabs {
  display: flex;
  gap: 30px;
  border-bottom: 1px solid #ddd;
  margin-bottom: 20px;
}

.tab-btn {
  background: none;
  border: none;
  padding: 15px 0;
  font-size: 14px;
  color: #999;
  cursor: pointer;
  border-bottom: 3px solid transparent;
  transition: all 0.3s;
}

.tab-btn:hover {
  color: #3BB77E;
}

.tab-btn.active {
  color: #3BB77E;
  border-bottom-color: #3BB77E;
}

.tab-content {
  padding: 20px 0;
}

.tab-pane {
  color: #666;
  line-height: 1.8;
}

/* Related Products */
.related-section {
  margin: 80px 0;
  padding: 20px;
}

.related-section h2 {
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
</style>
