<template>
  <div class="pro_container" :style="{ backgroundColor: promotion.color }">
    <img :src="promotion.image" alt="Promotion Image" :class="{ 'juice-image': promotion.title.includes('Breakfast') }" />
    <div class="text" v-html="promotion.title"></div>
    <Btn class="Btn" :buttonColor="promotion.buttonColor" @click="shopNow(promotion)" />
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import type { PropType } from 'vue'
import Btn from './Button.vue'

export default defineComponent({
  name: 'PromotionComponent',
  components: { Btn },
  props: {
    promotion: {
      type: Object as PropType<Record<string, any>>,
      required: true
    }
  },
  emits: ['shop'],
  methods: {
    shopNow(promotion: Record<string, any>) {
      alert("Let's shop: " + promotion.title)
      this.$emit('shop', promotion)
    }
  }
})

</script>

<style scoped>
.pro_container {
  width: 470px;
  height: 290px;
  background-color: #f0e8d5;
  border-radius: 10px;
  margin: 10px;
  float: left;
}
.Btn {
  position: absolute;
  margin-top: 170px;
  padding-left: 40px;
}
.text {
  position: absolute;
  font-family: 'Poppins', sans-serif;
  font-size: 20px;
  font-weight: 700;
  text-align: left;
  color: #253d4e;
  padding-top: 70px;
  padding-left: 40px;
  white-space: pre-line;
}
img {
  position: absolute;
  width: 420px;
  height: 210px;
  margin-left: 50px;
  margin-top: 75px;
}
.juice-image {
  width: 204px;
  height: 252px;
  margin-left: 265px;
  margin-top: 30px;
}
</style>
