<template>
    <div>
        <button class="btn btn-secondary ml-4 test-class" v-on:click="followUser" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {
        props: ['userId', 'follows'],


        mounted() {
            console.log('Component mounted.');
        },

        data: function () {
            return {
                status: this.follows,
            }
        },

        methods: {
            followUser: function () {
                axios.post('/follow/' + this.userId.userId)
                    .then(response => {
                        console.log(response.data);
                    });
            }
        },
        computed: {
            buttonText() {
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        }

    }
</script>
