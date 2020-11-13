require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import FollowButton from './components/FollowButton';

Vue.component('follow', require('./components/FollowButton.vue').default);


const app = new Vue({
    el: '#follow',
    components: {
        FollowButton
    },
    router,
});
