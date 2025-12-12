<template>
  <li class="menu-item" :class="{ 'is-hot': isHot }">
    <span v-if="isHot" class="icon">🔥</span>

    <span class="label">{{ label }}</span>

    <span v-if="hasDropdown" class="arrow">⌄</span>
  </li>
</template>

<script setup lang="ts">
import { defineProps } from 'vue';

defineProps({
  label: {
    type: String,
    required: true
  },
  isHot: {
    type: Boolean,
    default: false
  },
  hasDropdown: {
    type: Boolean,
    default: false
  }
});
</script>

<style scoped>
.menu-item {
  display: flex;
  align-items: center;
  gap: 5px;
  cursor: pointer;
  font-family: 'Quicksand', sans-serif;
  font-weight: 700;
  font-size: 15px;
  color: #253d4e; /* Dark blue/grey from your design */
  transition: color 0.2s ease;
  list-style: none; /* Removes bullet points if used in ul */
}

/* Hover Effect */
.menu-item:hover {
  color: #3bb77e; /* Green brand color */
}

/* Arrow Styling */
.arrow {
  font-size: 12px;
  margin-top: 2px; /* Slight visual adjustment */
}

/* Hot Deal Specific Styles */
.is-hot .icon {
  font-size: 16px;
}
</style>