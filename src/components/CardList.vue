<script setup>
defineProps({
  items: Array,
})

import Card from './Card.vue'

const onClickAdd = () => {
  alert('Add to cart')
}
</script>

<template>
  <div class="grid grid-cols-4 gap-5">
    <Card
      v-for="item in items"
      :key="item.id"
      :price="item.price"
      :image-url="item.imageUrl"
      :title="item.title"
      :is-added-to-cart="item.is_added_to_cart"
      :is-favorite="item.is_favorite"
      :onClickAdd="onClickAdd"
    />
  </div>
</template>
