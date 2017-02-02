<style scoped>
    img {
        display: block;
        margin: 0 auto;
        max-width: 100%;
    }

    .content {
        margin: 40px auto;
        max-width: 720px;
    }
</style>

<template>
    <article class="entry">
		<header class="entry_header">
			<h2 class="entry_title"><a href="#" rel="bookmark">{{ post.title }}</a></h2>
			<div class="entry_meta">
    			<div class="author_avatar" style="background-image:url(http://satyr.io/250x250);"></div>
    			<a class="author_name" href="#" title="Warwick Anderson">Warwick Anderson</a>
				<time class="entry_date">3 mins ago</time>
   			</div>
      	</header>

        <div class="entry_image">
			<picture>
				<source srcset="http://satyr.io/1200x16:9" media="(min-width: 1280px)">
				<source srcset="http://satyr.io/980x16:9" media="(min-width: 992px)">
				<source srcset="http://satyr.io/768x16:9" media="(min-width: 768px)">
				<source srcset="http://satyr.io/480x4:3" media="(min-width: 480px)">
				<img srcset="http://satyr.io/320x4:3" alt="">
			</picture>
       	</div>

        <div class="entry_body">
            <div class="content">
                {{ post.content }}
            </div>
        </div>
    </article>
</template>

<script>
export default {
    props: ['post']
}
</script>
