<template>
    <v-card>
        <v-toolbar dense>
            <v-app-bar-nav-icon></v-app-bar-nav-icon>
            <v-toolbar-title>Title</v-toolbar-title>
            <v-spacer></v-spacer>
            <div>
                <v-btn text>Link one</v-btn>
                <v-btn text>Link two</v-btn>
                <v-btn text @click="dialogLogin">Dialog login</v-btn>
            </div>
        </v-toolbar>
    </v-card>
</template>

<script>
    import EventBus from './../../Helpers/eventBus'

    export default {
        methods: {
            /**
             * Create event for login dialog.
             */
            dialogLogin() {
                EventBus.$emit('dialogLogin', true);
            }

        }
    }
</script>
