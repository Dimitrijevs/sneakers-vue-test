<script setup>
import { inject } from 'vue'

import CardList from './CardList.vue'
import AppHeader from './AppHeader.vue'
import FavoritesHeader from './FavoritesHeader.vue'

const items = inject('items')
const favorites = inject('favorites')
const viewFavorites = inject('viewFavorites')
const handleSortChange = inject('handleSortChange')
const handleSearch = inject('handleSearch')
</script>

<template>
  <div class="p-10">
    <FavoritesHeader v-if="viewFavorites" />

    <AppHeader
      v-if="!viewFavorites"
      @sortChange="handleSortChange"
      @search="handleSearch"
    />

    <CardList :items="viewFavorites ? favorites : items" />
  </div>
</template>

<style scoped></style>
