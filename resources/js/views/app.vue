<template>
    <div>
        <button v-on:click="testFunc" class="btn btn-secondary ml-4">Follow</button>
    </div>
</template>


<script>
    export default {
    mounted(){
        console.log('mounted');
    },
        methods: {
            testFunc: function() {
                console.log('I got clicked bitch');
            }
        }
    }
</script>
