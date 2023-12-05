<template>
    <div class="productView-con">
        <div class="path">
            <p>Home</p>
            <img src="../assets/img/fi-rs-angle-small-right 2.png" alt="">
            <p>Vegetables & tubers</p>
            <img src="../assets/img/fi-rs-angle-small-right 2.png" alt="">
            <p>Seeds of Change Organic</p>
        </div>
        <productInfo></productInfo>
        <Similar></Similar>
        <Tab></Tab>
    </div>
</template>

<script>
    import productInfo from "../components/ProductInfo.vue"
    import Similar from "../components/SimilarPro.vue";
    import Tab from "../components/Tab.vue";

    export default{
        components:{
            productInfo,
            Similar,
            Tab,
        }
    }
</script>