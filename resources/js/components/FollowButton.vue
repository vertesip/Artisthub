<template>
    <div>
        <button class="btn btn-secondary ml-4 test-class" v-on:click="followUser">Follow</button>
    </div>
</template>

<script>
    export default {
        props: ['userId'],


        mounted() {
            console.log('Component mounted.');
        },

        methods: {
            followUser: function(){
                axios.post('/follow/' + this.userId.userId)
                .then(response => {
                    alert(response.data);
                });
            },
        }
    }
</script>
