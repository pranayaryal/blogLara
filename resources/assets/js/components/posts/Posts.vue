<style scoped></style>

<template>
    <div class="entries">
        <div class="entries_header">
          <h3 v-if="this.view !== false">{{ this.view | currentView }}</h3>
        </div>
        <template v-for="(post, index) in posts">
            <post :post="post" :category-child="getPostsByCategory" :single-post-child="singlePost" :categories="categories" v-if="post.featured_post === true"></post>
            <post-list :post="post" :category-child="getPostsByCategory" :single-post-child="singlePost" :categories="categories" v-else></post-list>
        </template>
    </div>
</template>

<script>
import Post from './Post.vue';
function postsInitialState() {
    return {
        view: 'all_posts',
        categories: {},
        posts: [
            {
                category_id: '',
                content: '',
                created_at: '',
                featured_image: '',
                title: '',
                featured_post: false
            },
        ]
    };
}

export default {
    data () {
        return postsInitialState()
    },
    mounted () {
        this.prepareComponent()
    },
    methods: {
        prepareComponent() {
            this.getPosts();
            this.getCategories();
        },
        getPosts() {
            this.$http.get('/api/published-posts')
                .then(response => {
                    this.posts = response.data;
                    this.posts[0].featured_post = true;
                });
        },
        getCategories() {
            this.$http.get('/api/categories')
            .then(response => {
                this.categories = response.data
            });
        },
        getPostsByCategory(category_id) {
             this.$http.get('/api/category/' + category_id)
                .then(response => {
                    this.posts = response.data;
                    this.posts[0].featured_post = true;
                    this.view = this.posts[0].category_id;
                });
        },
        singlePost(post) {
            this.posts = [];
            this.posts[0] = {};
            this.posts[0].category_id = post.category_id;
            this.posts[0].content = post.content;
            this.posts[0].created_at = post.created_at;
            this.posts[0].status_id = post.status_id;
            this.posts[0].title = post.title;
            this.posts[0].featured_post = true;
            this.view = false;
        }
    },
    components: {
        post: Post
    },
    props: {
        categoryChild: Function,
        singlePostChild: Function
    }
}
</script>
