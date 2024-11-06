<script setup>
import CartItem from './CartItem.vue'

import { inject } from 'vue'

const cart = inject('cart')
</script>

<template>
  <div class="mt-4 gap-y-4 flex flex-col" v-auto-animate>
    <CartItem
      v-for="cartItem in cart"
      :key="cartItem.id"
      :cartItem="cartItem"
    />
  </div>
</template>
