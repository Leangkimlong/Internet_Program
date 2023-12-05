<template>
    <div class="img-con" :class="{ selected: isSelected}" @click="toggleBorder()">
        <img :src="imgSrc" alt="">
    </div>
</template>

<script>
    export default{
        data(){
            return{
                isSelected: false,
            };
        },
        props:{
            imgSrc: String,
        },
        methods:{
            toggleBorder(){
                if(this.isSelected) this.isSelected = false;
                else this.isSelected = true;
            }
        }
    }
</script>