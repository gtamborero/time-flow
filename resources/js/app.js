/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

import ExchangeBlock from './components/ExchangeBlock.vue';
Vue.component('exchange-block', ExchangeBlock);

import UserExchange from './components/UserExchange.vue';
Vue.component('user-exchange', UserExchange);

import UserRating from './components/UserRating.vue';
Vue.component('user-rating', UserRating);

import StarRating from 'vue-dynamic-star-rating';
Vue.component('star-rating', StarRating);

// Use internationalization -> martinlindhe/laravel-vue-i18n-generator
import VueInternationalization from 'vue-i18n';
import Locale from './vue-i18n-locales.generated';

Vue.use(VueInternationalization);

 //determine your current app locale
 const lang = document.documentElement.lang.substr(0, 2);

 const i18n = new VueInternationalization({
     locale: lang,
     messages: Locale
 });

 const app = new Vue({
     el: '#app',
     i18n
 });
