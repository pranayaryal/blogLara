<style scoped>
.entry--list h2 {
    font-size: 24px;
}

.entry.entry--list {
    margin-bottom: 20px;
}
</style>
<template>
  <article class="post entry--list">
    <header class="post_header">
      <h3 class="post_title"><a @click="singlePostChild(post)" rel="bookmark">{{ post.title }}</a></h3>
      <div class="post_meta">
        <div class="author_avatar" style="background-image:url(http://placecorgi.com/200);"></div>
        <div class="post_details"><a class="author_name" href="#" title="Warwick Anderson">Warwick Anderson</a></div>
        <time class="post_date">{{ post.created_at | fromNow }}</time>
      </div>
    </header>
  </article>
</template>
<script>
    export default {
        props: ['post', 'categories', 'categoryChild', 'singlePostChild']
    }
</script>
