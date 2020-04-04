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
                            v-model="form.name"
                            :error-messages="nameErrors"
                            :counter="15"
                            label="Name"
                            required
                            @input="$v.name.$touch()"
                            @blur="$v.name.$touch()"
                        ></v-text-field>
                        <v-text-field
                            v-model="form.email"
                            :error-messages="emailErrors"
                            label="E-mail"
                            required
                            @input="$v.email.$touch()"
                            @blur="$v.email.$touch()"
                        ></v-text-field>
                        <v-btn class="mr-4" @click="login">submit</v-btn>
                        <v-btn @click="clear">clear</v-btn>
                    </form>
                </v-card-text>

                <v-divider></v-divider>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                        color="primary"
                        text
                        @click="closeDialog"
                    >
                        Close
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>
<script>
    import EventBus from './../../Helpers/eventBus'
    import { validationMixin } from 'vuelidate'
    import { required, maxLength, email } from 'vuelidate/lib/validators'

    export default {

        mixins: [validationMixin],

        data() {
            return {
                dialog: false,
                form: {
                    name: '',
                    email: '',
                },
            }
        },

        validations: {
            name: { required, maxLength: maxLength(15) },
            email: { required, email },
            select: { required },
            checkbox: {
                checked (val) {
                    return val
                },
            },
        },

        computed: {

            nameErrors () {
                const errors = []
                if (!this.$v.name.$dirty) return errors
                !this.$v.name.maxLength && errors.push('Name must be at most 10 characters long')
                !this.$v.name.required && errors.push('Name is required.')
                return errors
            },
            emailErrors () {
                const errors = []
                if (!this.$v.email.$dirty) return errors
                !this.$v.email.email && errors.push('Must be valid e-mail')
                !this.$v.email.required && errors.push('E-mail is required')
                return errors
            },
        },

        methods: {
            login() {
               axios.post('/api/auth/login',this.form)
                .then(res => console.log(res.data))
                .error(error => console.log(error.response.data));
            },

            closeDialog() {
                this.clear();
                this.dialog = false;
            },
            clear () {
                this.$v.$reset()
                this.form.name = ''
                this.form.email = ''
            },

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
