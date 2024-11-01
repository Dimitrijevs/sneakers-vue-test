<script setup>
import EuroSign from './EuroSign.vue'

defineProps({
  imageUrl: String,
  title: String,
  price: Number,
  isFavorite: Boolean,
  isAddedToCart: Boolean,
  onClickAdd: Function,
  onClickFavorite: Function,
})
</script>

<template>
  <div
    class="relative border border-slate-100 bg-white rounded-3xl shadow-md p-6 cursor-pointer hover:-translate-y-2 hover:shadow-xl duration-200"
  >
    <img
      :src="isFavorite ? '/like-2.svg' : '/like-1.svg'"
      @click="onClickFavorite"
      alt="like 1 image"
      class="absolute top-10 left-10"
    />
    <img :src="imageUrl" alt="sneakers" />
    <p class="mt-2">{{ title }}</p>

    <div class="flex justify-between mt-5">
      <div class="flex flex-col">
        <span class="text-slate-400">Price:</span>
        <p>{{ price }} <EuroSign /></p>
      </div>
      <img
        @click="onClickAdd"
        :src="isAddedToCart ? '/checked.svg' : '/plus.svg'"
        alt="plus"
      />
    </div>
  </div>
</template>
