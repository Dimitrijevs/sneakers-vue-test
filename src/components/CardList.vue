<script setup>
import Card from './Card.vue'

const onClickAdd = () => {
  alert('Add to cart')
}
</script>

<template>
  <div class="grid grid-cols-4 gap-5">
    <Card
      :price="120"
      image-url="/sneakers/sneakers-2.jpg"
      title="AirMax 270 - Men's Running Shoes"
      :is-added-to-cart="true"
      :is-favorite="true"
      :onClickAdd="onClickAdd"
    />

    <Card
      :price="145"
      image-url="/sneakers/sneakers-3.jpg"
      title="Air Jordan - Men's Basketball Shoes"
      :is-added-to-cart="false"
      :is-favorite="true"
    />

    <Card
      :price="76"
      image-url="/sneakers/sneakers-4.jpg"
      title="Nike Blazer - Men's Casual Shoes"
      :is-added-to-cart="true"
      :is-favorite="false"
    />

    <Card
      :price="99"
      image-url="/sneakers/sneakers-5.jpg"
      title="Adidas Yeezy - Men's Gym Shoes"
      :is-added-to-cart="false"
      :is-favorite="true"
    />

    <Card
      :price="100"
      image-url="/sneakers/sneakers-1.jpg"
      title="Puma Suede - Men's Lifestyle Shoes"
      :is-added-to-cart="false"
      :is-favorite="true"
    />

    <Card
      :price="45"
      image-url="/sneakers/sneakers-6.jpg"
      title="Converse 1 - Men's Gym Shoes"
      :is-added-to-cart="false"
      :is-favorite="false"
    />
  </div>
</template>
