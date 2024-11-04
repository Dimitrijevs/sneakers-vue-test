<script setup>
import Card from './Card.vue'

import { defineProps } from 'vue'

defineProps({
  items: Array,
})
</script>

<template>
  <div class="grid grid-cols-4 gap-5">
    <Card
      v-for="item in items"
      :key="item.id"
      :id="item.id"
      :price="item.price"
      :image-url="item.imageUrl"
      :title="item.title"
      :is-added-to-cart="item.is_added_to_cart"
      :is-favorite="item.is_favorite"
    />
  </div>
</template>
