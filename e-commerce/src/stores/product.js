// stores/product.js
import { defineStore } from 'pinia'
import axios from 'axios'

const API_URL = 'http://localhost:3000';

export const useProductStore = defineStore('product', {
  state: () => ({
    categories: [],
    promotions: [],
    products: [],
    groups: [] 
  }),

  getters: {
    getCategoriesByGroup: (state) => {
      return (groupName) => state.categories.filter((c) => c.group === groupName);
    },
   
    getPopularProducts: (state) => {
      return state.products.filter((p) => p.countSold > 10);
    },
  
    getProductsByCategory: (state) => {
      return (categoryId) => state.products.filter((p) => p.categoryId === categoryId);
    }
  },

  actions: {
    async fetchAllData() {
      try {
        const [catRes, promoRes, prodRes] = await Promise.all([
          axios.get(`${API_URL}/api/categories`),
          axios.get(`${API_URL}/api/promotions`),
          axios.get(`${API_URL}/api/products`)
        ]);


        const fixImage = (item) => ({
          ...item,
          image: `${API_URL}/${item.image.replace(/\\/g, '/')}`
        });

        this.categories = catRes.data.map(fixImage);
        this.promotions = promoRes.data.map(fixImage);
        this.products = prodRes.data.map(fixImage);

      } catch (error) {
        console.error("Error loading store data:", error);
      }
    }
  }
})