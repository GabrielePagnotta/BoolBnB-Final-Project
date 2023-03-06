import Vue from 'vue'

import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Apartments from './views/Apartments.vue'
import Show from './views/Show.vue'

// Import componenti che fungono da pagine
const router = new VueRouter({
    // Scriverò i path per le diverse pagine
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'Apartments',
            component: Apartments
        },
        {
            path: '/showed/:id',
            name: 'Show',
            component: Show
        }
    ]
})

export default router
