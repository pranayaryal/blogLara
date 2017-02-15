<style scoped>

</style>

<template>
    <div class="entries">
        <post v-for="post in posts" :post="post" :category-child="getPostsByCategory" :single-post-child="singlePost">
    </div>
</template>

<script>
import Post from './Post.vue';
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

export default {
    data () {
        return postsInitialState()
    },
    mounted () {
        this.prepareComponent()
    },
    methods: {
        prepareComponent() {
            this.getPosts()
        },
        getPosts() {
            this.$http.get('/api/published-posts')
                .then(response => {
                    this.posts = response.data;
                });
        },
        getPostsByCategory(category_id) {
             this.$http.get('/api/category/' + category_id)
                .then(response => {
                    this.posts = response.data;
                });
        },
        singlePost(post) {
            // debugger;
            this.posts = [];
            this.posts[0] = {};
            this.posts[0].title = post.title;
            this.posts[0].content = post.content;
            this.posts[0].category_id = post.category_id;
            this.posts[0].status_id = post.status_id;
            this.posts[0].created_at = post.created_at;
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
