<script setup>
import CartItemList from './CartItemList.vue'
import DrawerHead from './DrawerHead.vue'
import DrawerBottom from './DrawerBottom.vue'
</script>

<template>
  <div class="fixed top-0 left-0 h-full w-full bg-black opacity-60 z-10"></div>

  <div class="bg-white w-96 h-full fixed right-0 top-0 z-20 p-8">
    <DrawerHead />

    <CartItemList class="mb-4" />

    <DrawerBottom />
  </div>
</template>
