<template>
  <div class="product-card">
    <div class="badge-container">
      <span 
          v-if="product.promotionAsPercentage" class="badge" :class="{
            'hot': product.promotionAsPercentage === 'Hot',
            'sale': product.promotionAsPercentage === 'Sale',
            'discount': product.promotionAsPercentage !== 'Hot' && product.promotionAsPercentage !== 'Sale'
          }"
        >
          {{ product.promotionAsPercentage }}
        </span>

    </div>

    <div class="image-wrapper">
      <img :src="product.image" :alt="product.name" />
    </div>

    <div class="product-content">
      <div class="category">Hodo Foods</div> 
      <h3 class="title" :title="product.name" v-html="product.name "></h3>
      <div class="rating-box">
        <div class="stars">
           <img src="@/assets/star-yellow.png" v-for="n in 4" :key="n" />
           <img src="@/assets/star-gray.png" /> 
        </div>
        <span class="rating-num">({{ product.rating || '4.0' }})</span>
      </div>

      <div class="unit">500 gram</div>

      <div class="card-footer">
        <div class="price-box">
          <div class="current-price">${{ product.price }}</div>
          <div class="old-price">$2.80</div>
        </div>
        <button class="add-btn">
          Add <span class="plus">+</span>
        </button>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
export default {
  name: "ProductComponent",
  props: {
    product: {
      type: Object,
      required: true
    }
  }
}

</script>

<style scoped>
/* Main Card Style */
.product-card {
  width: 280px; 
  background-color: #fff;
  border: 1px solid #ececec;
  border-radius: 15px;
  padding: 18px;
  position: relative;
  transition: all 0.2s ease-in-out;
  cursor: pointer;
  box-sizing: border-box;
}

.product-card:hover {
  border-color: #bce3c9;
  box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
  transform: translateY(-2px);
}

/* Badges */
.badge-container {
  margin-top: 15px;
  position: absolute;
  top: 5px;
  left: 0;
  z-index: 2;
  

}

.badge {
  display: inline-block;
  padding: 8px 20px; 
  font-size: 13px;
  font-weight: bold;
  color: #fff;
  border-radius: 0 10px 10px 0;
  text-transform: capitalize;
  
}

.badge.hot { background-color: #ec1e1e; } 
.badge.sale { background-color: #fabc35; } 
.badge.discount { background-color: #3bb77e; }

/* Image */
.image-wrapper {
  margin-bottom: 10px;
  margin-top: 25px;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 150px; 
}

.image-wrapper img {
  max-width: 100%;
  max-height: 100%;
  object-fit: contain;
  margin-top: 10px;
  
}

/* Typography */
.category {
  font-family: 'Quicksand', sans-serif;
  color: #adadad;
  font-size: 12px;
  margin-bottom: 15px;
}

.title {
  font-family: 'Quicksand', sans-serif;
  font-size: 15px;
  font-weight: 700;
  color: #253d4e;
  margin: 0 0 10px 0;
  min-height: 40px;
  line-height: 1.2;

}

/* Rating */
.rating-box {
  display: flex;
  align-items: center;
  margin-bottom: 10px;
}

.stars {
  display: flex;
  gap: 2px;
  margin-right: 8px;
}

.stars img { width: 12px; height: 12px; } 

.rating-num {
  font-size: 12px;
  color: #b6b6b6;
}

.unit {
  font-size: 12px;
  color: #adadad;
  margin-bottom: 15px;
}

/* Footer Section */
.card-footer {
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
}

.price-box {
  display: flex;
  flex-direction: row;
}

.current-price {
  font-family: 'Quicksand', sans-serif;
  font-size: 18px;
  font-weight: 700;
  color: #3bb77e;

}

.old-price {
  font-size: 14px;
  font-weight: 700;
  color: #adadad;
  text-decoration: line-through;
  margin-left: 5px; 
  margin-top: 3px;
}

/* Button Styling */
.add-btn {
  background-color: #def9ec;
  color: #3bb77e; 
  border: none;
  border-radius: 4px;
  padding: 6px 15px;
  font-weight: 700;
  font-size: 14px;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 5px;
  font-family: 'Quicksand', sans-serif;
  transition: 0.2s;
}

.add-btn:hover {
  background-color: #3bb77e;
  color: #fff;
  transform: translateY(-2px);
}
</style>