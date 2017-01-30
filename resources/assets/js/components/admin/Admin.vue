<style scoped>

</style>

<template>
    <div class="container">
        <!-- Form Errors -->
        <div class="alert alert-danger" v-if="createForm.errors.length > 0">
            <p><strong>Whoops!</strong> Something went wrong!</p>
            <br>
            <ul>
                <li v-for="error in createForm.errors">
                    {{ error }}
                </li>
            </ul>
        </div>

        <!-- Create post -->
        <form class="form-horizontal" role="form">
            <!-- title -->
            <div class="form-group">
                <label class="col-md-3 control-label">Title</label>

                <div class="col-md-7">
                    <input id="create-post-title" type="text" class="form-control" @keyup.enter="store" v-model="createForm.title">

                    <span class="help-block">
                        The name of your post. Ex.) How we kick ass
                    </span>
                </div>
            </div>

            <!-- title -->
            <div class="form-group">
                <label class="col-md-3 control-label">Featured Image</label>

                <div class="col-md-7">
                    <input disabled id="create-post-title" type="text" class="form-control" @keyup.enter="store" v-model="createForm.featured_image" placeholder="Todo" v-bind:value="createForm.featured_image">
                </div>
            </div>

            <!-- post content -->
            <div class="form-group">
                <label class="col-md-3 control-label">Content</label>

                <div class="col-md-7">
                    <textarea class="form-control" @keyup.enter="store" v-model="createForm.content"></textarea>

                    <span class="help-block">
                        Content of your post. Ex.) We began kicking ass by &hellip;
                    </span>
                </div>
            </div>

            <div class="col-md-7 col-md-offset-3">
                <button type="button" class="btn btn-primary" @click="store">
                    Create
                </button>
            </div>
        </form>
    </div>
</template>

<script>
function createFormInitialState() {
    return {
        createForm: {
            title: '',
            featured_image: 'http://satyr.io/1200x16:9',
            content: '',
            created_at: '',
            updated_at: '',
            errors: []
        }
    }
}
export default {
    data() {
        return createFormInitialState()
    },
    methods: {
        store() {
            this.persistPost('post', '/api/save-post', this.createForm);
        },
        update() {
            this.persistPost('put', '/api/update-post', this.editForm);
        },
        persistPost(method, uri, form) {
            form.errors = [];

            this.$http[method](uri, form)
                .then(response => {
                    form.id = '';
                    form.title = '';
                    form.featured_image = '';
                    form.content = '';
                    form.created_at = '';
                    form.updated_at = '';
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
