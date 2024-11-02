<script setup>
import { defineEmits } from 'vue'

const emit = defineEmits(['sortChange', 'search'])

const handleSortChange = event => {
  const selectedValue = event.target.value
  emit('sortChange', selectedValue)
}

const handleSearch = event => {
  const searchValue = event.target.value
  emit('search', searchValue)
}
</script>

<template>
  <div class="flex justify-between items-center mb-4">
    <h2 class="text-3xl font-bold">All Shoes</h2>

    <div class="flex gap-4">
      <select
        name=""
        id=""
        @change="handleSortChange"
        class="p-4 border border-slate-200 rounded-xl outline-green-600"
      >
        <option value="no_sort">Most recent</option>
        <option value="cheapest">From cheapest to most expensive</option>
        <option value="expensive">From most expenive to cheapest</option>
      </select>

      <div class="relative">
        <img
          src="/search.svg"
          alt="search icon"
          class="absolute left-3.5 top-4 w-6 h-6"
        />

        <input
          @change="handleSearch"
          type="text"
          class="border border-slate-200 rounded-xl p-4 pl-12 outline-green-600 duration-300"
          placeholder="Search ..."
        />
      </div>
    </div>
  </div>
</template>
