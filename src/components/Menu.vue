<template>
    <div class="menu-con">
        <p class="menu-fea">{{ text }}</p>
        <div class="menu-list">
            <p>All</p>
            <p>Milks & Dairies</p>
            <p>Coffes & Teas</p>
            <p>Pet Foods</p>
            <p>Meats</p>
            <p>Vegetable</p>
            <p>Fruits</p>
        </div>
    </div>
</template>

<script>
    export default{
        props:{
            text: String,
        }
    }
</script>