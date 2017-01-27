<style scoped>

</style>

<template>
    <div class="container">
        <post v-for="post in posts" :post="post">
    </div>
</template>

<script>
import Post from './Post.vue';
function postsInitialState() {
    return {
        posts: [
            {
                title: '',
                featured_image: '',
                content: '',
                created_at: ''
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
            this.$http.get('/api/posts')
                .then(response => {
                    this.posts = response.data;
                });
        }
    },
    components: {
        post: Post
    }
}

</script>
