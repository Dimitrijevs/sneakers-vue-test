<script setup>
import { inject } from 'vue'
import EuroSign from './EuroSign.vue'

const totalCost = inject('totalCost')

const handleTax = () => {
  return (totalCost.value * 1.21).toFixed(2)
}
</script>

<template>
  <div class="flex flex-col gap-2">
    <div class="flex gap-4">
      <span>Together:</span>
      <div class="flex-1 border-b-4 border-dashed"></div>
      <span class="font-bold">{{ totalCost }} <EuroSign /></span>
    </div>

    <div class="flex gap-4">
      <span>Tax:</span>
      <div class="flex-1 border-b-4 border-dashed"></div>
      <span class="font-bold">21%</span>
    </div>

    <div class="flex gap-4 mb-12">
      <span>Total:</span>
      <div class="flex-1 border-b-4 border-dashed"></div>
      <span class="font-bold">{{ handleTax() }}</span>
    </div>

    <button
      class="bg-green-600 text-white p-3 disabled:bg-slate-500 disabled:text-white rounded-xl cursor-pointer hover:bg-green-500 active:bg-green-400 active:text-white hover:text-black duration-300"
    >
      Get order
    </button>
  </div>
</template>
