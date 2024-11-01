<script setup>
import CloseButton from './CloseButton.vue'
import EuroSign from './EuroSign.vue'
</script>

<template>
  <div class="border border-slate-200 p-3 rounded-xl flex gap-3">
    <img src="/sneakers/sneakers-1.jpg" alt="" class="w-16 h-16" />

    <div class="flex justify-between items-center">
      <div class="">
        <p class="mb-1">AirMax 270 - Men's Running Shoes</p>

        <div class="flex gap-2">
          <p>Price:</p>
          <span class="font-bold">120 <EuroSign /></span>
        </div>
      </div>

      <CloseButton />
    </div>
  </div>
</template>
