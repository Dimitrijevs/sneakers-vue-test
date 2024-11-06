<script setup>
import { defineProps } from 'vue'
import EuroSign from './EuroSign.vue'

defineProps({
  total_price: Number,
  sneakers_ids: Array,
  id: Number,
})
</script>

<template>
  <router-link to="/purchasese/1">
    <div
      class="bg-white rounded-xl p-6 border border-1 border-slate-200 shadow-md hover:-translate-y-2 hover:shadow-xl duration-300 cursor-pointer"
    >
      <img src="/package-closed.jpeg" alt="cart" />
      <h2 class="font-bold mb-2">Order Nr. {{ id }}.</h2>
      <p class="text-slate-400">Price:</p>
      <p>
        <span class="font-bold">{{ total_price }}</span> <EuroSign />
      </p>
    </div>
  </router-link>
</template>
