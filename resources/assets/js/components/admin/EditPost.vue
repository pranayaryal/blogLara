<style scoped>
article {
    margin-right: 2em;
}
article:last-child {
    margin-right: 0;
}
.entry_title {
    font-size: 23px;
}
.entry_meta {
    padding-left: 0;
}
</style>

<template>
    <article class="entry">
        <header class="entry_header">
            <h4 class="entry_title"><a rel="bookmark" @click="editChild(post)">{{ post.title }} <span v-if="post.status_id !== 3"> &mdash; {{ post.status_id | humanize_status }}</a></h4>
            <div class="entry_meta">
                <div class="author_name">Warwick Anderson</div>
                <div class="category">Posted in: <span v-for="category in categories" v-if="category.id === post.category_id">{{ category.name }}</span></div>
                <time class="entry_date">{{ post.created_at | fromNow }}</time>
            </div>
        </header>
    </article>
</template>

<script>
export default {
    filters: {
        humanize_status(status_id) {
            if (status_id === 1) {
                return 'Archived';
            }

            if (status_id === 2) {
                return 'Draft';
            }

            return 'Published'
        }
    },
    props: ['post', 'editChild', 'deleteChild', 'categories']
}
</script>
