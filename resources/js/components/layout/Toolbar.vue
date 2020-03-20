<template>
    <v-card>
        <v-toolbar dense>
            <v-app-bar-nav-icon></v-app-bar-nav-icon>
            <v-toolbar-title>Title</v-toolbar-title>
            <v-spacer></v-spacer>
            <div>
                <v-btn text>Link one</v-btn>
                <v-btn text>Link two</v-btn>
                <v-btn text @click="">Dialog login</v-btn>
                <router-link to="/login">
                    <v-btn text>Login</v-btn>
                </router-link>
            </div>
        </v-toolbar>
    </v-card>
</template>

<script>

    export default {

    }
</script>
