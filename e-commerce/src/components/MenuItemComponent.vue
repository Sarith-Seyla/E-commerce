<template>
  <div class="menu-container">
    <!-- <h3 class="section-title">{{ title }}</h3> -->
     <div class="section-logo">
        <img src="../assets/logo.png" alt="">
        <div class ="section-logo text">
            <h3> Melon </h3>
            <h2> MART & GROCERY</h2>
        </div>
     </div>
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

.section-logo {
  color: #199500;
  display: flex;
  flex-wrap: wrap;

  background-color: aquamarine;
}
.section-logo .text{
    text-align: center;
    background-color: #eaf120;
    display: block;
}
.section-logo .text h3{
    font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 30px;
    color: #199500;

}
.section-logo .text h2{
    font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 10px;
    color: #000000;
    
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