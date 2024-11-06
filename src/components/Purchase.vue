<script setup>
import { inject, onMounted, ref } from 'vue'

import PurchaseCard from './PurchaseCard.vue'

const viewFavorites = inject('viewFavorites')

const purchases = ref([])

const fetchPurchases = async () => {
  try {
    const response = await fetch('http://127.0.0.1:8000/api/v1/purchases')
    const data = await response.json()

    purchases.value = data
  } catch (e) {
    console.error('Something went wrong', e)
  }
}

onMounted(fetchPurchases)
onMounted(() => {
  viewFavorites.value = false
})
</script>

<template>
  <div class="m-10">
    <h1 class="text-3xl font-bold mb-8">Orders</h1>
    <div class="grid grid-cols-4 gap-5" v-auto-animate>
      <PurchaseCard
        v-for="purchase in purchases"
        :key="purchase.id"
        :total_price="purchase.total_price"
        :sneakers_ids="purchase.sneakers_ids"
        :id="purchase.id"
      />
    </div>
  </div>
</template>
