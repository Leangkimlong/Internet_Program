<template>
    <div class="cat-con">
        <div class="cat-imgCon">
            <img :src="img" alt="">
        </div>
        <p>{{ itemName }}</p>
        <p>{{ itemCount }}</p>
    </div>
</template>
<script>

    export default{
        props:{
            img: String,
            itemCount: String,
            itemName: String,
        }
    }

</script>