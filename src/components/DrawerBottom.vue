<script setup>
import EuroSign from './EuroSign.vue'
</script>

<template>
  <div class="flex flex-col gap-2">
    <div class="flex gap-4">
      <span>Together:</span>
      <div class="flex-1 border-b-4 border-dashed"></div>
      <span class="font-bold">384 <EuroSign /></span>
    </div>

    <div class="flex gap-4 mb-2">
      <span>Tax:</span>
      <div class="flex-1 border-b-4 border-dashed"></div>
      <span class="font-bold">21%</span>
    </div>

    <button
      class="bg-green-600 text-white p-3 disabled:bg-slate-500 disabled:text-white rounded-xl cursor-pointer hover:bg-green-500 active:bg-green-400 active:text-white hover:text-black duration-300"
    >
      Get order
    </button>
  </div>
</template>
