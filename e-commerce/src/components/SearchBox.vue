<script lang="ts">
import { ref } from 'vue'

const searchQuery = ref('')
</script>

<template>
  <div class="search-container">
    <div class="search-bar">
      <select class="category-select">
        <option>All Categories</option>
      </select>
      <div class="divider">|</div>
      <input 
        type="text" 
        v-model="searchQuery" 
        placeholder="Search for items..." 
      />
      <div class="search-icon">
        <img src="../assets/search_icon.png" alt="">
      </div>
    </div>
  </div>
</template>

<style scoped>
.search-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1rem 2rem;
}

.search-bar {
  display: flex;
  align-items: center;
  border: 1px solid #ddd;
  padding: 10px;
  border-radius: 4px;
  width: 700px;
  background-color: white;
}

.search-icon{
    height: 15px;
    width: 15px;
    padding-right: 15px;
    padding-bottom: 7px;
}
.category-select {
  border: none;
  background: transparent;
  font-weight: bold;
}

input {
  border: none;
  flex-grow: 1;
  padding: 0.5rem;
  outline: none;
}
</style>