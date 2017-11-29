<style scoped>
</style>

<template>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Posts</h1>
                <a class="action-link" @click="showCreatePostForm">
                    Create New post
                </a>
            </div>
            <div class="panel-body">
               <div class="entries">
                <edit-post v-for="post in posts" :key="post.id" :post="post" :edit-child="edit" :delete-child="destroy" :categories="createForm.categories"></edit-post>
               </div>
            </div>
        </div>

        <!-- Create post -->
        <div class="modal fade" id="modal-create-post" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title">
                            Create Post
                        </h4>
                    </div>

                    <div class="modal-body">
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

                        <form class="form-horizontal" role="form">
                            <!-- title -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Title</label>

                                <div class="col-md-7">
                                    <input id="create-post-title" type="text" class="form-control" @keyup.enter="store" v-model="createForm.title">

                                    <span class="help-block">
                                        The title of your post. Ex.) How we kick ass
                                    </span>
                                </div>
                            </div>

                            <!-- title -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Featured Image</label>

                                <div class="col-md-7">
                                    <!-- v-bind:value="createForm.featured_image" -->
                                    <input disabled id="create-post-title" type="text" class="form-control" @keyup.enter="store" v-model="createForm.featured_image" placeholder="Todo">
                                </div>
                            </div>

                            <!-- Category -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Category</label>
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
                                <label class="col-md-3 control-label">Status</label>
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
                </div>
            </div>
        </div>

        <!-- Edit post -->
        <div class="modal fade" id="modal-edit-post" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title">
                            Edit {{ editForm.title }}
                        </h4>
                    </div>

                    <div class="modal-body">
                        <!-- Form Errors -->
                        <div class="alert alert-danger" v-if="editForm.errors.length > 0">
                            <p><strong>Whoops!</strong> Something went wrong!</p>
                            <br>
                            <ul>
                                <li v-for="error in editForm.errors">
                                    {{ error }}
                                </li>
                            </ul>
                        </div>

                        <form class="form-horizontal" role="form">
                            <!-- title -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Title</label>

                                <div class="col-md-7">
                                    <input id="create-post-title" type="text" class="form-control" @keyup.enter="store" v-model="editForm.title">

                                    <span class="help-block">
                                        The title of your post. Ex.) How we kick ass
                                    </span>
                                </div>
                            </div>

                            <!-- title -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Featured Image</label>

                                <div class="col-md-7">
                                    <!-- v-bind:value="editForm.featured_image" -->
                                    <input disabled id="create-post-title" type="text" class="form-control" @keyup.enter="store" v-model="editForm.featured_image" placeholder="Todo" >
                                </div>
                            </div>

                            <!-- Category -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Category</label>
                                <div class="col-md-7">
                                    <select class="form-control" v-model="editForm.category_id">
                                        <option v-for="category in editForm.categories" :value="category.id">{{ category.name | capitalize }}</option>
                                    </select>
                                    <div class="help-block">Select your posts category</div>
                                </div>
                            </div>

                            <!-- post content -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Content</label>

                                <div class="col-md-7">
                                    <textarea class="form-control" @keyup.enter="store" v-model="editForm.content"></textarea>

                                    <span class="help-block">
                                        Content of your post. Ex.) We began kicking ass by &hellip;
                                    </span>
                                </div>
                            </div>

                            <!-- Category -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Status</label>
                                <div class="col-md-7">
                                    <select class="form-control" v-model="editForm.status_id">
                                        <option v-for="status in editForm.statuses" :value="status.id">{{ status.name | capitalize }}</option>
                                    </select>
                                    <div class="help-block">Select your posts status</div>
                                </div>
                            </div>

                            <div class="col-md-7 col-md-offset-3">
                                <button type="button" class="btn btn-primary" @click="update">
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import EditPost from './EditPost.vue';

function postsInitialState() {
    return {
        posts: [
            {
                categories: [],
                category_id: '',
                content: '',
                created_at: '',
                featured_image: '',
                title: '',
            },
        ]
    };
}

function formInitialState() {
    return {
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
export default {
    data() {
        return {
            createForm: formInitialState(),
            editForm: formInitialState(),
            posts: postsInitialState()
        }
    },
    mounted() {
        this.prepareComponent()
    },
    methods: {
        prepareComponent() {
            this.getPosts()
            this.getCategories()
            this.getStatuses()
        },

        getCategories() {
            this.$http.get('api/categories')
                .then(response => {
                    this.createForm.categories = response.data
                    this.editForm.categories = response.data
                });
        },

        getStatuses() {
            this.$http.get('api/statuses')
                .then(response => {
                    this.createForm.statuses = response.data
                    this.editForm.statuses = response.data
                });
        },
        /**
         * Show the form for creating new posts.
         */
        showCreatePostForm() {
            $('#modal-create-post').modal('show');
        },
        /**
         * Display edit form modal and set form values
         */
        edit(post) {
            this.editForm.category_id = post.category_id;
            this.editForm.content = post.content;
            this.editForm.featured_image = post.featured_image;
            this.editForm.id = post.id;
            this.editForm.title = post.title;
            this.editForm.status_id = post.status_id;
            $('#modal-edit-post').modal('show');
        },
        /**
         * Destroy the given post.
         */
        destroy(goal_id) {
            let confirmed = confirm('Are you sure you want to delete?');
            if (confirmed) {
                this.$http.delete('/api/post-delete/' + goal_id)
                    .then(response => {
                        this.getPosts();
                    });
            }
        },
        store() {
            this.persistPost('post', '/api/save-post', this.createForm, '#modal-create-post');
        },
        update() {
            this.persistPost('put', '/api/update-post', this.editForm, '#modal-edit-post');
        },
        persistPost(method, uri, form, modal) {
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
                    form.status_id = '';
                    $(modal).modal('hide');
                    this.posts = this.getPosts();
                })
                .catch(response => {
                    if (typeof response.data === 'object') {
                        form.errors = _.flatten(_.toArray(response.data));
                    } else {
                        form.errors = ['Something went wrong. Please try again.'];
                    }
                });
        },
        getPosts() {
            this.$http.get('/api/all-posts')
                .then(response => {
                    this.posts = response.data;
                });
        }
    },
    components: {
        EditPost
    },
    props: {
        editChild: Function,
        deleteChild: Function,
        categories: Object
    }
}
</script>
