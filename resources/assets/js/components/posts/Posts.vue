<style scoped>

</style>

<template>
    <div class="entries">
        <post v-for="post in posts" :post="post">
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
        }

    },
    components: {
        post: Post
    }
}
</script>
