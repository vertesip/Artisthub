<template>
    <div>
        <button @click="testFunc" class="btn btn-primary ml-4">Follow</button>
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
