/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


//require('~bootstrap.bundle.min.js');
//C:\Users\andry\Boolean\laravel-pizze\node_modules\bootstrap\dist\js\bootstrap.bundle.min.js

window.Vue = require('vue');

window.axios = require('axios');

import App from './App.vue';
import router from './routes';


const app = new Vue({
    el: '#app',
    router,
    render :h => h(App)
});


