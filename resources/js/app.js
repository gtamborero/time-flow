/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries.
 */

require('./bootstrap');
window.Vue = require('vue');

// Add capitalize function on strings
String.prototype.capitalize = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}

import ExchangeBlock from './components/ExchangeBlock.vue';
Vue.component('exchange-block', ExchangeBlock);

import TwoUsers from './components/TwoUsers.vue';
Vue.component('two-users', TwoUsers);

import UserRatingResults from './components/UserRatingResults.vue';
Vue.component('user-rating-results', UserRatingResults);

import StarRating from './components/starRating.vue';
Vue.component('star-rating', StarRating);

import StarRatingDirect from './components/StarRatingDirect.vue';
Vue.component('star-rating-direct', StarRatingDirect);

import CommentExchange from './components/commentExchange.vue';
Vue.component('comment-exchange', CommentExchange);

import RequestSendButton from './components/request-send-button.vue';
Vue.component('request-send-button', RequestSendButton);

import ProfileGeoloc from './components/profileGeoloc.vue';
Vue.component('profile-geoloc', ProfileGeoloc);

import Vuex from 'vuex';
Vue.use(Vuex);

import VueSwal from 'vue-swal' //https://github.com/anteriovieira/vue-swal -> Sweet Alert
Vue.use(VueSwal);

// Get laravel Data from blade <script>
import StoreData from './store.vue';
const store = new Vuex.Store(StoreData);

// Use internationalization -> martinlindhe/laravel-vue-i18n-generator
import VueInternationalization from 'vue-i18n';
import Locale from '../lang/es/vue-i18n-locales';

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
