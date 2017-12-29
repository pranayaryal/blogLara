<style scoped>

</style>

<template>
    <div>
        <h3>subscriberForm()</h3>
        <p>Habitasse venenatis viverra rutrum odio leo varius lacinia turpis, pretium ut maecenas.</p>

        <div class="form-horizontal" role="form">
            <div class="form-group">
                <label class="sr-only">Email address</label>
                <input type="email" class="input is-medium" v-model="subscriberForm.email" placeholder="Email address">
            </div>
            <input type="submit" class="button is-primary is-medium is-expanded" @click="store">
        </div>

        <div :class="notifcationClasses">
            <button class="delete"></button>
            {{ subscriberMessage }}
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
            notifcationClasses: 'notification is-primary is-hidden',
            subscriberMessage: ''
        }
    }

    export default {
        data() {
            return {
                subscriberForm: subscriberFormInitialState(),
                notifcation: notificationInitialState()
            }
        },
        methods: {
            store() {
                this.persistPost('/api/subscriber', this.subscriberForm);
            },
            persistPost(uri, form) {
                axios.post(uri, form)
                    .then(response => {
                        alert(response.data);
                    })
                    .catch(response => {
                        if (typeof response.data === 'object') {
                            form.errors = _.flatten(_.toArray(response.data));
                        } else {
                            form.errors = ['Something went wrong. Please try again.'];
                        }
                    });
            }
        }
    }
</script>
