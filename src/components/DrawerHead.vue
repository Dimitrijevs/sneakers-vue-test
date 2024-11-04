<script setup>
import CloseButton from './CloseButton.vue'

import { inject } from 'vue'

const handleOpenDrawer = inject('handleOpenDrawer')
</script>

<template>
  <div class="flex items-start gap-3">
    <CloseButton @click="handleOpenDrawer" />

    <h2 class="font-bold text-2xl">Shopping cart</h2>
  </div>
</template>
