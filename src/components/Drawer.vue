<script setup>
import { defineProps } from 'vue'

import CartItemList from './CartItemList.vue'
import DrawerHead from './DrawerHead.vue'
import DrawerBottom from './DrawerBottom.vue'

defineProps({
  handleOpenDrawer: Function,
})
</script>

<template>
  <div class="fixed top-0 left-0 h-full w-full bg-black opacity-60 z-10"></div>

  <div class="bg-white w-96 h-full fixed right-0 top-0 z-20 p-8 flex flex-col">
    <DrawerHead />

    <div class="flex-1 overflow-y-auto mb-4">
      <CartItemList />
    </div>

    <DrawerBottom />
  </div>
</template>
