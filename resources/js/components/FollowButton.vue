<template>
    <div>
        <button class="btn btn-secondary ml-4 test-class" v-on:click="followUser">
            {{buttonText}}
        </button>
    </div>
</template>

<script>
    export default {
        props: ['userId', 'follows'],


        mounted() {
        },

        data: function () {
            return {
                status: (this.follows.follows === 'true') ? true : false,
            }
        },

        methods: {
            followUser: function () {
                axios.post('/follow/' + this.userId.userId)
                    .then(response => {
                        this.status = ! this.status;
                        console.log(response.data);
                    });
            }
        },
        computed: {
            buttonText: function() {
                console.log("status", this.status);

                return (this.status) ? 'Unfollow' : 'Follow';
            }
        }

    }
</script>
