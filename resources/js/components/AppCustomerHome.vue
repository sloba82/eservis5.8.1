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
    import Toolbar from './layout/Toolbar';
    import AppFooter from './layout/AppFooter';
    import Login from "./Login/Login";
    import DialogLogin from "./Login/DialogLogin";

    export default {
        components: {
            toolbar: Toolbar,
            AppFooter: AppFooter,
            login: Login,
            dialogLogin: DialogLogin,
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
