<script setup>
import Header from './components/Header.vue'
import CardList from './components/CardList.vue'
// import Drawer from './components/Drawer.vue'
</script>

<template>
  <!-- <Drawer /> -->
  <div class="w-4/5 mx-auto bg-white rounded-xl shadow-xl mt-16">
    <Header />

    <div class="p-10">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-3xl font-bold">All Shoes</h2>

        <div class="flex gap-4">
          <select
            name=""
            id=""
            class="p-4 border border-slate-200 rounded-xl outline-green-600"
          >
            <option value="">From cheapest to most expensive</option>
            <option value="">From most expenive to cheapest</option>
          </select>

          <div class="relative">
            <img
              src="/search.svg"
              alt="search icon"
              class="absolute left-3.5 top-4 w-6 h-6"
            />

            <input
              type="text"
              class="border border-slate-200 rounded-xl p-4 pl-12 outline-green-600 duration-300"
              placeholder="Search ..."
            />
          </div>
        </div>
      </div>

      <CardList />
    </div>
  </div>
</template>

<style scoped></style>
