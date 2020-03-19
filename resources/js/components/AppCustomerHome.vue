<template>
    <div>
        <toolbar></toolbar>
        <app-footer></app-footer>
    </div>
</template>

<script>
    import Toolbar from './layout/Toolbar';
    import AppFooter from './layout/AppFooter';

    export default {
        components: {
            toolbar: Toolbar,
            AppFooter: AppFooter,
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
