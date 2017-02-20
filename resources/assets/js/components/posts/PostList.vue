<style scoped>
.entry--list h2 {
    font-size: 24px;
}

.entry.entry--list {
    margin-bottom: 20px;
}
</style>
<template>
    <article class="entry entry--list">
        <header class="entry_header">
            <h2 class="entry_title"><a @click="singlePostChild(post)" rel="bookmark">{{ post.title }}</a></h2>
            <div class="entry_meta">
                <div class="author_avatar" style="background-image:url(http://satyr.io/100x100);"></div>

                <div class="author_name"><a href="#" title="Warwick Anderson">Warwick Anderson</a></div>
                <div class="category">Posted in: <a @click="categoryChild(post.category_id)" v-for="category in categories" v-if="category.id === post.category_id">{{ category.name }}</a></div>
                <time class="entry_date">{{ post.created_at | fromNow }}</time>
            </div>
        </header>
    </article>
</template>
<script>
    export default {
        props: ['post', 'categories', 'categoryChild', 'singlePostChild']
    }
</script>
