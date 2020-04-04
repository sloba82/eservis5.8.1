<template>
    <div>
        <toolbar></toolbar>
        <router-view>
            <login></login>
        </router-view>
        <dialog-login></dialog-login>
        <app-footer></app-footer>
    </div>
</template>

<script>
    import Toolbar from './Layout/Toolbar';
    import AppFooter from './Layout/AppFooter';
    import Login from "./Login/Login";
    import Dialog from "./Dialog/Dialog";

    export default {
        components: {
            toolbar: Toolbar,
            AppFooter: AppFooter,
            login: Login,
            dialogLogin: Dialog,
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
