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
      v-key="item.id"
      :price="item.price"
      :image-url="item.imageUrl"
      :title="item.title"
      :is-added-to-cart="true"
      :is-favorite="true"
      :onClickAdd="onClickAdd"
    />
  </div>
</template>
