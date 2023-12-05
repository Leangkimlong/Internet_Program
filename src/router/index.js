import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/products/:productId',
      name: 'product',
      component: () => import('../views/ProductView.vue'),
    },
    {
      path: '/categories/:categoriesId',
      name: 'category',
      component: ()=> import('../views/CategoryView.vue')
    },
  ]
})

export default router
