/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries.
 */

require('./bootstrap');
window.Vue = require('vue');

import ExchangeBlock from './components/ExchangeBlock.vue';
Vue.component('exchange-block', ExchangeBlock);

import UserExchange from './components/UserExchange.vue';
Vue.component('user-exchange', UserExchange);

import UserRating from './components/UserRating.vue';
Vue.component('user-rating', UserRating);

import StarRating from './components/starRating.vue';
Vue.component('star-rating', StarRating);

import StarRatingDirect from './components/StarRatingDirect.vue';
Vue.component('star-rating-direct', StarRatingDirect);

import CommentExchange from './components/commentExchange.vue';
Vue.component('comment-exchange', CommentExchange);

import Vuex from 'vuex';
import VueSwal from 'vue-swal' //https://github.com/anteriovieira/vue-swal
Vue.use(Vuex);
Vue.use(VueSwal);

// Get laravel Data from blade <script>
import StoreData from './store.vue';
const store = new Vuex.Store(StoreData);

// Use internationalization -> martinlindhe/laravel-vue-i18n-generator
import VueInternationalization from 'vue-i18n';
import Locale from './vue-i18n-locales.generated';

// VueInternationalization config
Vue.use(VueInternationalization);
const lang = document.documentElement.lang.substr(0, 2);
const i18n = new VueInternationalization({
     locale: lang,
     messages: Locale
 });

// START VUE!
 const app = new Vue({
     el: '#app',
     store,
     i18n
 });
