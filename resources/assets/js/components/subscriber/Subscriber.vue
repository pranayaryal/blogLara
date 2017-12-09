<style scoped>

</style>

<template>
    <div>
        <h3>Join the mailing list.</h3>

        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="input" v-model="subscriberForm.email">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="input" v-model="subscriberForm.name">
            </div>
            <input type="submit" class="btn btn-sm btn-primary" @click="store">
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
