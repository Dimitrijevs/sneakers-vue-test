<script setup>
import { inject } from 'vue'

const handleOpenDrawer = inject('handleOpenDrawer')
</script>

<template>
  <div class="flex flex-col text-center items-center h-full justify-center">
    <img src="/package-icon.png" alt="package" class="w-32 h-32" />
    <h2 class="text-2xl font bold">The shopping cart is empty</h2>
    <p class="text-gray-400 mb-4">
      Please add a couple of items to the shopping cart
    </p>

    <button
      @click="handleOpenDrawer"
      class="bg-green-600 hover:bg-green-500 active:bg-green-400 hover:text-black duration-300 text-white rounded-2xl cursor-pointer py-3 px-5"
    >
      Go back to the list
    </button>
  </div>
</template>
