<script setup>
import { RouterLink } from 'vue-router'
import EuroSign from './EuroSign.vue'

import { defineEmits } from 'vue'

defineProps({
  click: Boolean,
  handleOpenDrawer: Function,
  totalCost: Number,
})

const emit = defineEmits(['favoritesClick'])

function handleFavoritesClick() {
  const favouritesClick = true
  emit('favoritesClick', favouritesClick)
}
</script>

<template>
  <header class="flex justify-between border-b border-slate-300 p-8">
    <div>
      <router-link to="/" class="flex gap-3 items-center">
        <img src="/logo.png" alt="Logo" class="w-10" />
        <div class="">
          <h2 class="text-xl font-bold uppercase">Vue Sneakers</h2>
          <p class="text-slate-500">Shop of the best sneakers</p>
        </div>
      </router-link>
    </div>

    <ul class="flex items-center gap-10">
      <li
        class="flex items-center cursor-pointer gap-2 text-gray-500 group"
        @click="handleOpenDrawer"
      >
        <img src="/cart.svg" alt="" />
        <b class="group-hover:text-black">{{ totalCost }} <EuroSign /></b>
      </li>

      <li class="cursor-pointer group">
        <router-link to="/">
          <button
            @click="handleFavoritesClick"
            class="flex items-center gap-2 text-gray-500 group"
          >
            <img :src="click ? 'like-2.svg' : '/heart.svg'" alt="" />
            <span class="group-hover:text-black">Favorites</span>
          </button>
        </router-link>
      </li>

      <li>
        <RouterLink
          to="/purchases"
          class="flex items-center cursor-pointer gap-2 text-gray-500 group"
        >
          <img src="/profile.svg" alt="" />
          <span class="group-hover:text-black">Purchases</span>
        </RouterLink>
      </li>
    </ul>
  </header>
</template>
