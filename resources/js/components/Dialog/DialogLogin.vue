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
                            v-model="email"
                            :error-messages="emailErrors"
                            label="E-mail"
                            required
                            @input="$v.email.$touch()"
                            @blur="$v.email.$touch()"
                        ></v-text-field>
                        <v-text-field
                            v-model="password"
                            :error-messages="nameErrors"
                            :type="'password'"
                            label="Password"
                            required
                            @input="$v.password.$touch()"
                            @blur="$v.password.$touch()"
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
    import { required, email } from 'vuelidate/lib/validators'

    export default {

        mixins: [validationMixin],

        data() {
            return {
                dialog: false,
                password:'',
                email:'',
                form: []
            }
        },

        validations: {
            password: { required, },
            email: { required, },
        },

        computed: {

            nameErrors () {
                const errors = []
                if (!this.$v.password.$dirty) return errors
                !this.$v.password.required && errors.push('Name is required.')
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
                this.form.password = this.password;
                this.form.email = this.email;

               axios.post('/api/auth/login', this.form)
                /*.error(error => console.log(error.response.data));*/
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
