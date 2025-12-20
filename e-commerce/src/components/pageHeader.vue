<script lang="ts">
import { ref } from 'vue'


</script>

<template>
  <div class="hero-wrapper">
    <div class="hero-content">
      
    </div>
  </div>
</template>

<style scoped>
.hero-wrapper {
  padding: 2rem;
}

.text-section{
    padding-left: 6rem;

}
.hero-content {
  background-color: #FDF0D5;
  background-image: url('../assets/bg_showcase.png');
  background-size: 50%;
  border-radius: 20px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  position: relative;
  overflow: hidden;
}
.hero-content img{
    height: 520px;
    width: 800px;

}
h1 {
  font-size: 3.5rem;
  color: #253D4E;
  margin-bottom: 1rem;
  line-height: 1.2;
}

p {
  color: #7E7E7E;
  font-size: 1.2rem;
  margin-bottom: 2rem;
}


.paper-plane {
  padding-left: 15px;
  color: #7E7E7E;
}
</style>