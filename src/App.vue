<script setup>
import { onMounted, ref, provide } from 'vue'

import Header from './components/Header.vue'
import CardList from './components/CardList.vue'
import AppHeader from './components/AppHeader.vue'
import FavoritesHeader from './components/FavoritesHeader.vue'

// import Drawer from './components/Drawer.vue'

const items = ref([])
const sortOrder = ref('no_sort')
const search = ref('')

const viewFavorites = ref(false)
const favorites = ref([])

const fetchSneakers = async () => {
  try {
    const response = await fetch(
      `http://127.0.0.1:8000/api/v1/sneakers?title=${search.value}&sortOrder=${sortOrder.value}`,
    )
    const data = await response.json()

    items.value = data
  } catch (error) {
    console.error('Something went wrong', error)
  }
}

const fetchFavorites = async () => {
  try {
    const response = await fetch('http://127.0.0.1:8000/api/v1/favorites')
    const data = await response.json()

    favorites.value = data
  } catch (error) {
    console.error('Something went wrong', error)
  }
}

onMounted(fetchSneakers)

const handleSortChange = newSortOrder => {
  sortOrder.value = newSortOrder
  fetchSneakers()
}

const handleSearch = searchValue => {
  search.value = searchValue.toLowerCase().trim()
  fetchSneakers()
}

const handleFavoritesClick = () => {
  viewFavorites.value = !viewFavorites.value
  fetchFavorites()
}

const addToFavorites = async id => {
  items.value = items.value.map(item => {
    if (item.id === id) {
      return {
        ...item,
        is_favorite: !item.is_favorite,
      }
    }

    return item
  })

  favorites.value = favorites.value.filter(favorite => favorite.id !== id)

  try {
    await fetch(`http://127.0.0.1:8000/api/v1/favorites/${id}`, {
      method: 'POST',
      credentials: 'include',
    })
  } catch (error) {
    console.error('Something went wrong', error)
  }
}

provide('addToFavorites', addToFavorites)
</script>

<template>
  <!-- <Drawer /> -->
  <div class="w-4/5 mx-auto bg-white rounded-xl shadow-xl mt-16">
    <Header @favoritesClick="handleFavoritesClick" :click="viewFavorites" />

    <div class="p-10">
      <FavoritesHeader v-if="viewFavorites" />

      <AppHeader
        v-if="!viewFavorites"
        @sortChange="handleSortChange"
        @search="handleSearch"
      />

      <CardList :items="viewFavorites ? favorites : items" />
    </div>
  </div>
</template>

<style scoped></style>
