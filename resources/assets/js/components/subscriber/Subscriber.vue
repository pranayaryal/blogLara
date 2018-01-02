<style scoped>

</style>

<template>
    <div>
         <transition name="slide-fade">
            <div v-if="notification.isVisable" class="notification is-primary" v-bind:class="{ 'is-danger': notification.isError }">
                <button class="delete" @click="toggleNotificationState"></button>
                <span>{{ notification.message }}</span>
            </div>
        </transition>

        <h3>subscriberForm()</h3>

        <p>Habitasse venenatis viverra rutrum odio leo varius lacinia turpis, pretium ut maecenas.</p>

        <div class="form-horizontal" role="form">
            <div class="form-group">
                <label class="sr-only">Email address</label>
                <input type="email" class="input is-medium" v-model="subscriberForm.email" placeholder="Email address">
            </div>
            <input type="submit" class="button is-primary is-medium is-expanded" @click="store">
        </div>
    </div>
</template>

<script>
    function subscriberFormInitialState() {
        return {
            email: ''
        }
    }

    function notificationInitialState() {
        return {
            isError: false,
            isVisable: false,
            message: ''
        }
    }

    export default {
        data() {
            return {
                subscriberForm: subscriberFormInitialState(),
                notification: notificationInitialState(),
            }
        },
        methods: {
            store() {
                this.validateEmail(this.subscriberForm);
            },
            persistPost(uri, form) {
                axios.post(uri, form)
                    .then(response => {
                        this.notification.isError = response.data.error;
                        this.notification.message = response.data.message;
                        this.notification.isVisable = true;

                        if (!this.notification.isError) {
                            this.clearForm();
                        }
                    })
                    .catch(response => {
                        if (typeof response.data === 'object') {
                            form.errors = _.flatten(_.toArray(response.data));
                        } else {
                            form.errors = ['Something went wrong. Please try again.'];
                        }
                    });
            },
            toggleNotificationState() {
                this.notification.isVisable = !this.notification.isVisable
            },
            clearForm() {
                this.subscriberForm.email = '';
            },
            validateEmail(form) {
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.email)) {
                    this.persistPost('/api/subscriber', form);
                } else {
                    this.notification.message = 'Please enter a valid email.';
                    this.notification.isVisable = true;
                    this.notification.isError = true;
                }
            }
        }
    }
</script>
