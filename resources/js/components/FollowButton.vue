<template>
    <div>
        <button class="btn btn-secondary ml-4 test-class" v-on:click="pls">Follow</button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.');
        },

        methods: {
            followUser: function(){
                console.log('asd');
            },
            pls: function () {
                console.error('pls');
            }
        }
    }
</script>
