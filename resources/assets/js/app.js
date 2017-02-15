
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


// Global scope Vue Filters
Vue.filter('fromNow', function (date) {
    return moment(date).fromNow();
});

Vue.filter('capitalize', function (string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('posts', require('./components/posts/Posts.vue'));
Vue.component('admin', require('./components/admin/Admin.vue'));
Vue.component('edit-post', require('./components/admin/EditPost.vue'));
Vue.component('post-list', require('./components/posts/PostList.vue'));
Vue.component('profile', require('./components/profile/Profile.vue'));

const app = new Vue({
    el: '#app'
});
