import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from '../components/Login/Login'
import AppCustomerHome from "../components/AppCustomerHome";

Vue.use(VueRouter);

let customerHome = '/customer';
const routes = [
    { path: '/customer', component: AppCustomerHome },
    { path: '/login', component: Login },
    // { path: '/bar', component: Bar }
]

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
    base:'/customer',
    mode: 'history',
    routes // short for `routes: routes`
})

export default router
