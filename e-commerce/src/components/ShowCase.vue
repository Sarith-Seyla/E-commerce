<script setup>
import { ref } from 'vue'

const email = ref('')

const subscribe = () => {
  alert(`Subscribed with ${email.value}`)
}
</script>

<template>
  <div class="hero-wrapper">
    <div class="hero-content">
      <div class="text-section">
        <h1>Don't miss amazing<br>grocery deals</h1>
        <p>Sign up for the daily newsletter</p>
        
        <form @submit.prevent="subscribe" class="subscribe-form">
          <span class="paper-plane">✉️</span>
          <input 
            type="email" 
            v-model="email" 
            placeholder="Your email address" 
          />
          <button type="submit">Subscribe</button>
        </form>
      </div>
      
      <div class="image-section">
        <img src="../assets/big_apple.png" alt="Fresh Vegetables" />
      </div>
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
  background-color: #FDF0D5; /* Light beige background */
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

.subscribe-form {
  background: white;
  display: inline-flex;
  padding: 5px;
  border-radius: 30px;
  align-items: center;
  width: 100%;
  max-width: 450px;
}

.subscribe-form input {
  border: none;
  padding: 10px;
  flex-grow: 1;
  outline: none;
}

.subscribe-form button {
  background-color: #3BB77E;
  color: white;
  border: none;
  padding: 12px 30px;
  border-radius: 30px;
  font-weight: bold;
  cursor: pointer;
}

.paper-plane {
  padding-left: 15px;
  color: #7E7E7E;
}
</style>