import { createWebHistory, createRouter } from 'vue-router'

import Home from '../components/Home.vue'
import Purchase from '../components/Purchase.vue'

const routes = [
  { path: '/', component: Home },
  { path: '/purchases', component: Purchase },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
