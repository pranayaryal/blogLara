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
      <h3 class="entry_title"><a @click="singlePostChild(post)" rel="bookmark">{{ post.title }}</a></h3>
      <div class="entry_meta">
        <div class="author_avatar" style="background-image:url(http://placecorgi.com/200);"></div>
        <div class="entry_details"><a class="author_name" href="#" title="Warwick Anderson">Warwick Anderson</a></div>
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
