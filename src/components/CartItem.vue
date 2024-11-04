<script setup>
import CloseButton from './CloseButton.vue'
import EuroSign from './EuroSign.vue'

import { defineProps, inject } from 'vue'

const { cartItem } = defineProps({
  cartItem: Object,
})

const addToCart = inject('addToCart')

const handleCart = () => {
  addToCart(cartItem.id)
}
</script>

<template>
  <div class="border border-slate-200 p-3 rounded-xl flex gap-3">
    <img :src="cartItem.imageUrl" alt="" class="w-16 h-16" />

    <div class="flex justify-between items-center w-full">
      <div class="">
        <p class="mb-1">{{ cartItem.title }}</p>

        <div class="flex gap-2">
          <p>Price:</p>
          <span class="font-bold">{{ cartItem.price }} <EuroSign /></span>
        </div>
      </div>

      <CloseButton @click="handleCart" />
    </div>
  </div>
</template>
