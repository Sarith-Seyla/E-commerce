<template>
  <li class="menu-item" :class="{ 'is-hot': isHot }">
    <span v-if="isHot" class="icon"><img src="../assets/fire_icon.png" alt=""></span>
    <span v-if="allCategories" class="icon"><img src="../assets/box_list_icon.png" alt="" style="margin-left: 30px;"></span>

    <span class="label">{{ label }} </span>

    <span v-if="hasDropdown" class="arrow" ><img src="../assets/dropdown.png" alt=""></span>
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
  },
  allCategories: {
    type: Boolean,
    default: false
  },
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
  color: #253d4e; 
  transition: color 0.2s ease;
  list-style: none;
}


.menu-item:hover {
  color: #3bb77e;
}

.arrow {
  font-size: 12px;
  margin-top: 0px; 
}

.is-hot .icon {
  font-size: 16px;
}
.label{
  color: black;
}
</style>