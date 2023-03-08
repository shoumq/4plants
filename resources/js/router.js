import VueRouter from 'vue-router'
const Home = { template: '<div>Home1</div>' }
import { createApp } from 'vue';

const routes = [
    { path: '/q', component: Home },
]


const router = VueRouter.createRouter({
    // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
    history: VueRouter.createWebHashHistory(),
    routes, // short for `routes: routes`
})


const app = createApp({})
// Make sure to _use_ the router instance to make the
// whole app router-aware.
app.use(router)

app.mount('#app')
