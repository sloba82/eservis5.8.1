<template>
    <div class="text-center">
        <v-dialog
            v-model="dialog"
            width="500"
        >
            <v-card>
                <v-card-title
                    class="headline grey lighten-2"
                    primary-title
                >
                    Privacy Policy
                </v-card-title>

                <v-card-text>
                    <form>
                        <v-text-field
                            v-model="name"
                            :error-messages="nameErrors"
                            :counter="10"
                            label="Name"
                            required
                            @input="$v.name.$touch()"
                            @blur="$v.name.$touch()"
                        ></v-text-field>
                        <v-text-field
                            v-model="email"
                            :error-messages="emailErrors"
                            label="E-mail"
                            required
                            @input="$v.email.$touch()"
                            @blur="$v.email.$touch()"
                        ></v-text-field>
                        <v-select
                            v-model="select"
                            :items="items"
                            :error-messages="selectErrors"
                            label="Item"
                            required
                            @change="$v.select.$touch()"
                            @blur="$v.select.$touch()"
                        ></v-select>
                        <v-checkbox
                            v-model="checkbox"
                            :error-messages="checkboxErrors"
                            label="Do you agree?"
                            required
                            @change="$v.checkbox.$touch()"
                            @blur="$v.checkbox.$touch()"
                        ></v-checkbox>

                        <v-btn class="mr-4" @click="submit">submit</v-btn>
                        <v-btn @click="clear">clear</v-btn>
                    </form>
                </v-card-text>

                <v-divider></v-divider>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                        color="primary"
                        text
                        @click="dialog = false"
                    >
                        I accept
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>
<script>
    import EventBus from './../../Helpers/eventBus'

    export default {
        data() {
            return {
                dialog: false,
            }
        },

        /**
         * Show dialog on emited event.
         */
        created() {
            EventBus.$on('dialogLogin', (dialog) => {
                this.dialog = dialog;
            });
        }
    }
</script>
