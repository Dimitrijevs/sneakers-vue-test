<script setup>
import { inject } from 'vue'

const lastPurchaseId = inject('lastPurchaseId')
</script>

<template>
  <div class="flex flex-col justify-center text-center items-center h-full">
    <img
      src="/order-success-icon.png"
      alt="purchase finihsed"
      class="w-32 h-40 mb-2"
    />
    <h2 class="text-2xl font-bold">Order placed!</h2>
    <p class="text-gray-400">
      Your order number is
      <span class="text-black cursor-pointer hover:text-green-700 duration-300"
        >#{{ lastPurchaseId }}</span
      >. Our customer service specialist will contact you soon
    </p>

    <button
      @click="handleOpenDrawer"
      class="bg-green-600 hover:bg-green-500 active:bg-green-400 hover:text-black duration-300 text-white rounded-2xl cursor-pointer py-3 px-5 mt-4"
    >
      Go back to the list
    </button>
  </div>
</template>
