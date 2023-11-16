<template>
    <div class="h-[170px] w-[130px] rounded-md shadow-md overflow-hidden">
       <!-- <slot></slot> -->
       <img class="h-[120px] w-full" :src="image" :alt="image" />
        <h3 class="text-center font-semibold">{{ name }}</h3>
        <p class="text-center text-xs text-[#B6B6B6]">{{ description }}</p>
    </div>
</template>

<script>

    export default {
        name: "Category",
        props: {
            image: String,
            name: String,
            description: String,
        }
    }
</script>

