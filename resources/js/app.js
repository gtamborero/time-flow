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
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('user-exchange', require('./components/UserExchange.vue').default);
Vue.component('user-exchange-status', require('./components/UserExchangeStatus.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Use martinlindhe/laravel-vue-i18n-generator
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
