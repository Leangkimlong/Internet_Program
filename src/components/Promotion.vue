<template>
    <div class="pro-con">
        <p>{{ text }}</p>
        <btn></btn>
    </div>
</template>

<script>
    import btn from './Button.vue'

    export default{
        components:{
            btn,
        },
        props:{
            text: String,
            bgButton: String,
        }
    }
</script>