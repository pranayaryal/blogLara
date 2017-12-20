
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('subscriber', require('./components/subscriber/Subscriber.vue'));

const app = new Vue({
    el: '#mailing_list'
});

// Search Toggle
var searchToggle = document.querySelectorAll('.search-button, .search-overlay');
var searchBox = document.querySelector('.site-search');
for (var i = 0; i < searchToggle.length; i++) {
    searchToggle[i].addEventListener('click',searchOpen,false);
}
function searchOpen(){
    document.body.classList.toggle('site-search-open');
}

// require('./bulma-extensions');
