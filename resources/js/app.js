require('./bootstrap');

window.Vue = require('vue');

//Main pages
import App from './views/app.vue'


const app = new Vue({
    el: '#app',
    components: { App }
});
