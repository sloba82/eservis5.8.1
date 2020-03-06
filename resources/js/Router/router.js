
import Home from './components/Home.vue';



const routes = [
    { path: '/foo', component: Foo },
    { path: '/bar', component: Bar }
]

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
    routes // short for `routes: routes`
})

export default router