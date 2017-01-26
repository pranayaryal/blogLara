<style scoped>

</style>

<template>
    <div class="container">
        <post v-for="post in posts" >
    </div>
</template>

<script>
import Post from './components/posts/Post.vue';
function postsInitialState() {
    return {
        post: {
            title: '',
            featured_image: '',
            content: '',
            created_at: ''
        }
    }
}
export default {
    data() {
        this.posts = postsInitialState()
    },
    props: {
        post: Post
    }
}

</script>
