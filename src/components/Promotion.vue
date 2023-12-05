<template>
    <div class="pro-con">
        <p>{{ text }}</p>
        <RouterLink to="/products/:productId">
            <btn></btn>
        </RouterLink>
    </div>
</template>

<script>
    import btn from './Button.vue'
    import { RouterLink } from 'vue-router';

    export default{
        components:{
            btn,
            RouterLink,
        },
        props:{
            text: String,
            bgButton: String,
        }
    }
</script>