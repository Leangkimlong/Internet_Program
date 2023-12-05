<template>
    <button v-if="!isButtonDisable" class="count-con" @click="handleButton()">
        Add +
    </button>
    <div v-else-if="isButtonDisable" class="count-con" style="justify-content: end ;background-color: white; border: 2px solid #3BB77E;">
        {{ quantity }}
        <div class="count-arrow">
            <button @click="
                quantity++
            "><i class="fa-solid fa-arrow-up"></i></button>
            <button @click="
                this.quantity--;
                if(this.quantity==0)
                    this.isButtonDisable = false;
            "><i class="fa-solid fa-arrow-down"></i></button>
        </div>
    </div>
</template>

<script>
    export default{
        data() {
            return{
                quantity: 0,
                isButtonDisable: false,
            }
        },

        methods:{
            handleButton(){
                this.isButtonDisable = true;
                this.quantity += 1;
            },
        },
    }
</script>