<template>
  <div class="menu-container">
    <h3 class="section-title">{{ title }}</h3>
    <ul class="menu-list">
      <li 
        v-for="item in items" 
        :key="item.id" 
        class="menu-item"
        @click="$emit('select', item.id)"
      >
        {{ item.name }}
      </li>
    </ul>
  </div>
</template>

<script lang="ts">
export default {
  name: "MenuComponent",
  props: {
    title: { type: String, default: "Section Title" },
    items: { type: Array, default: () => [] }
  }
}
</script>

<style scoped>
.menu-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin: 30px 0 20px 0;
  width: 100%;
}

.section-title {
  font-family: 'Arial Black', sans-serif;
  font-size: 24px;
  color: #253d4e;
}

.menu-list {
  display: flex;
  list-style: none;
  gap: 20px;
}

.menu-item {
  cursor: pointer;
  font-family: 'Arial', sans-serif;
  font-size: 14px;
  color: #253d4e;
  transition: color 0.3s;
}

.menu-item:hover {
  color: #3bb77e;
}
</style>