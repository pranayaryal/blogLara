<style scoped>

</style>

<template>
    <article class="entry">
		<header class="entry_header">
			<h2 class="entry_title"><a href="#" rel="bookmark">{{ post.title }}</a></h2>
			<div class="entry_meta">
    			<div class="author_avatar" style="background-image:url(http://satyr.io/100x100);"></div>

    			<a class="author_name" href="#" title="Warwick Anderson">Warwick Anderson</a>
				<time class="entry_date">{{ post.created_at | fromNow }}</time>
   			</div>
      	</header>

        <div class="entry_block entry_block--content">
            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit est sollicitudin, natoque magna ornare justo ac aenean volutpat dictumst cum, feugiat augue varius tristique auctor convallis sociosqu purus. Dui maecenas dis velit elementum aptent fusce laoreet varius ad.</p>
        </div>

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
    props: ['post']
}
</script>
