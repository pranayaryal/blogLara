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

            <!-- Category -->
            <div class="form-group">
                <div class="col-md-3">Category</div>
                <div class="col-md-7">
                    <select class="form-control" v-model="createForm.category_id">
                        <option v-for="category in createForm.categories" :value="category.id">{{ category.name | capitalize }}</option>
                    </select>
                    <div class="help-block">Select your posts category</div>
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

            <!-- Category -->
            <div class="form-group">
                <div class="col-md-3">Status</div>
                <div class="col-md-7">
                    <select class="form-control" v-model="createForm.status_id">
                        <option v-for="status in createForm.statuses" :value="status.id">{{ status.name | capitalize }}</option>
                    </select>
                    <div class="help-block">Select your posts status</div>
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
            categories: [],
            category_id: '',
            content: '',
            created_at: '',
            errors: [],
            featured_image: 'http://satyr.io/1200x16:9',
            title: '',
            status_id: '',
            statuses: [],
            updated_at: '',
        }
    }
}
export default {
    data() {
        return createFormInitialState()
    },
    mounted() {
        this.$http.get('api/categories')
            .then(response => {
                this.createForm.categories = response.data
            });

        this.$http.get('api/statuses')
            .then(response => {
                this.createForm.statuses = response.data
            });
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
                    form.category_id = '';
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
