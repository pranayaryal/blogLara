<style scoped>
    img {
        display: block;
        margin: 0 auto;
        max-width: 100%;
    }

    .content {
        margin: 0 auto;
        max-width: 80%;
    }
</style>

<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>{{ post.title }}</h2>
        </div>
        <picture>
            <source srcset="http://satyr.io/1200x16:9" media="(min-width: 1280px)">
            <source srcset="http://satyr.io/980x16:9" media="(min-width: 992px)">
            <source srcset="http://satyr.io/768x16:9" media="(min-width: 768px)">
            <source srcset="http://satyr.io/480x4:3" media="(min-width: 480px)">
            <img srcset="http://satyr.io/320x4:3" alt="">
        </picture>

        <div class="panel-body">
            <div class="content">
                {{ post.content }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['post']
}
</script>
