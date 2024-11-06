<script setup>
import { defineProps, inject } from 'vue'

import CartItemList from './CartItemList.vue'
import DrawerHead from './DrawerHead.vue'
import DrawerBottom from './DrawerBottom.vue'
import InfoBlock from './InfoBlock.vue'
import PurchaseFinihsed from './PurchaseFinihsed.vue'

const totalCost = inject('totalCost')
const isPurchaseFinished = inject('isPurchaseFinished')

defineProps({
  handleOpenDrawer: Function,
})
</script>

<template>
  <div class="fixed top-0 left-0 h-full w-full bg-black opacity-60 z-10"></div>

  <div class="bg-white w-96 h-full fixed right-0 top-0 z-20 p-8 flex flex-col">
    <DrawerHead />

    <div class="flex-1 overflow-y-auto mb-4">
      <CartItemList v-if="totalCost" />

      <PurchaseFinihsed v-if="!totalCost && isPurchaseFinished" />

      <InfoBlock v-if="!totalCost" />
    </div>

    <DrawerBottom v-if="totalCost" />
  </div>
</template>
