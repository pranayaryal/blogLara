<style scoped>

</style>

<template>
    <article class="entry">
      <header class="entry_header">
          <h2 class="entry_title"><a @click="singlePostChild(post)" rel="bookmark">{{ post.title }}</a></h2>
          <div class="entry_meta">
            <div class="author_avatar" style="background-image:url(http://placecorgi.com/200);"></div>
            <div class="entry_details"><a class="author_name" href="#" title="Warwick Anderson">Warwick Anderson</a> in <a class="category_name" @click="categoryChild(post.category_id)" v-for="category in categories" v-if="category.id === post.category_id">{{ category.name }}</a></div>
            <time class="entry_date">{{ post.created_at | fromNow }}</time>
          </div>
      </header>

      <div class="entry_block entry_block--image">
        <picture>
          <source srcset="http://satyr.io/1200x16:9" media="(min-width: 1280px)">
          <img srcset="http://satyr.io/1200x16:9" alt="">
        </picture>
      </div>

      <div class="entry_block entry_block--content">
        {{ post.content }}
      </div>
    </article>
</template>

<script>
export default {
    props: ['post', 'categories', 'categoryChild', 'singlePostChild']
}
</script>
