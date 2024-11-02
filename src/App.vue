<script setup>
import { onMounted, ref } from 'vue'

import Header from './components/Header.vue'
import CardList from './components/CardList.vue'
import AppHeader from './components/AppHeader.vue'

// import Drawer from './components/Drawer.vue'

const items = ref([])
const sortOrder = ref('no_sort')
const search = ref('')

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

onMounted(fetchSneakers)

const handleSortChange = newSortOrder => {
  sortOrder.value = newSortOrder
  fetchSneakers()
}

const handleSearch = searchValue => {
  search.value = searchValue.toLowerCase().trim()
  fetchSneakers()
}
</script>

<template>
  <!-- <Drawer /> -->
  <div class="w-4/5 mx-auto bg-white rounded-xl shadow-xl mt-16">
    <Header />

    <div class="p-10">
      <AppHeader @sortChange="handleSortChange" @search="handleSearch" />

      <CardList :items="items" />
    </div>
  </div>
</template>

<style scoped></style>
