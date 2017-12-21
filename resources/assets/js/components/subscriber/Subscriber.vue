<style scoped>

</style>

<template>
    <div>
        <h3>subscriberForm()</h3>
        <p>Habitasse venenatis viverra rutrum odio leo varius lacinia turpis, pretium ut maecenas.</p>

        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="sr-only">Email address</label>
                <input type="email" class="input is-medium" v-model="subscriberForm.email" placeholder="Email address">
            </div>
            <input type="submit" class="button is-primary is-medium is-expanded" @click="store">
        </form>
    </div>
</template>

<script>
    function subscriberFormInitialState() {
        return {
            email: '',
            name: ''
        }
    }

    export default {
        data() {
            return {
                subscriberForm: subscriberFormInitialState()
            }
        },
        mounted() {
            this.prepareComponent()
        },
        methods: {
            prepareComponent() {console.log('mounted')},
            store() {
                this.persistPost('post', '/api/subscriber', this.subscriberForm);
            },
            persistPost(method, uri, form) {
                this.$http[method](uri, form)
                    .then(response => {
                        console.log(response.data);
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
