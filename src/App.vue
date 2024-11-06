<script setup>
import { provide, onMounted, ref } from 'vue'
import Header from './components/Header.vue'

import Drawer from './components/Drawer.vue'

const openDrawer = ref(false)

const items = ref([])

const sortOrder = ref('no_sort')
const search = ref('')

const isPurchaseLoading = ref(false)
const isPurchaseFinished = ref(false)
const lastPurchaseId = ref(null)

const favorites = ref([])
const viewFavorites = ref(false)

const cart = ref([])
const totalCost = ref(0)

const handleOpenDrawer = () => {
  openDrawer.value = !openDrawer.value

  if (openDrawer.value) {
    fetchCart()
  }
}

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

const handlePurchase = async () => {
  isPurchaseLoading.value = true
  const total_price = totalCost.value * 1.21
  const sneakers_ids = cart.value.map(cartItem => cartItem.id)

  console.log(total_price, sneakers_ids)

  try {
    const response = await fetch('http://localhost:8000/api/v1/purchase', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ total_price, sneakers_ids }),
    })

    const data = await response.json()

    items.value = data.sneakers
    lastPurchaseId.value = data.purchase_id

    cart.value = []
    totalCost.value = 0
  } catch (e) {
    console.error('Something went wrong', e)
  } finally {
    isPurchaseLoading.value = false
    isPurchaseFinished.value = true

    setTimeout(() => {
      isPurchaseFinished.value = false
      lastPurchaseId.value = null
    }, 10 * 1000)
  }
}

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

const addToCart = async id => {
  try {
    items.value = items.value.map(item => {
      if (item.id === id) {
        return {
          ...item,
          is_added_to_cart: !item.is_added_to_cart,
        }
      }

      return item
    })

    try {
      await fetch(`http://127.0.0.1:8000/api/v1/cart/${id}`, {
        method: 'POST',
        credentials: 'include',
      })
    } catch (e) {
      console.error('Something went wrong', e)
    }

    fetchCart()
  } catch (e) {
    console.error('Something went wrong', e)
  } finally {
    isPurchaseFinished.value = false
  }
}

const fetchCart = async () => {
  try {
    const response = await fetch('http://127.0.0.1:8000/api/v1/cart')
    const data = await response.json()

    cart.value = data
    handleTotalPrice()
  } catch (e) {
    console.error('Something went wrong', e)
  }
}

const handleTotalPrice = () => {
  totalCost.value = 0
  cart.value.forEach(cartItem => {
    totalCost.value += cartItem.price
  })
}

onMounted(fetchCart)
onMounted(fetchSneakers)

provide('handleOpenDrawer', handleOpenDrawer)
provide('totalCost', totalCost)
provide('cart', cart)
provide('handleOpenDrawer', handleOpenDrawer)
provide('openDrawer', openDrawer)
provide('fetchCart', fetchCart)
provide('addToFavorites', addToFavorites)
provide('addToCart', addToCart)
provide('handlePurchase', handlePurchase)
provide('isPurchaseLoading', isPurchaseLoading)
provide('isPurchaseFinished', isPurchaseFinished)
provide('lastPurchaseId', lastPurchaseId)
provide('items', items)
provide('favorites', favorites)
provide('viewFavorites', viewFavorites)
provide('handleSortChange', handleSortChange)
provide('handleSearch', handleSearch)
provide('fetchSneakers', fetchSneakers)
provide('fetchFavorites', fetchFavorites)
provide('handleFavoritesClick', handleFavoritesClick)
</script>

<template>
  <Drawer v-if="openDrawer" />

  <div class="w-4/5 mx-auto bg-white rounded-xl shadow-xl mt-16 pb-1 mb-16">
    <Header
      @favoritesClick="handleFavoritesClick"
      :click="viewFavorites"
      :handleOpenDrawer="handleOpenDrawer"
      :totalCost="totalCost"
    />

    <router-view></router-view>
  </div>
</template>

<style scoped></style>
