<template>
    <div class="container">
        <Menu text="Featured Categories"></Menu>
        <div class="cat-dis">
            <Categories v-for="cat in Category" :style="{backgroundColor: cat.bgColor}" :img="cat.img" :itemCount="cat.itemCount" :itemName="cat.ItemName"></Categories>
        </div>
        <div class="pro-dis">
            <Promotion v-for="pro in Promotion" :text="pro.text" :bgButton="pro.bgButton" :style="{backgroundColor: pro.bgColor, backgroundImage: `url(${pro.img})`}"></Promotion>
        </div>
        <Menu text="Popular Products"></Menu>
        <div class="prod-dis">
            <Product v-for="item in ProItems" :bgColor="item.bgColor" :img="item.img" :text="item.text" :show="item.show" :dis="item.dis"></Product>
        </div>
    </div>
</template>

<script>
    import Store from "../stores/Product"

    import Menu from '../components/Menu.vue'
    import Categories from '../components/Category.vue'
    import Promotion from '../components/Promotion.vue'
    import Product from '../components/Product.vue'

    export default{
        mixins: [Store],
        components:{
            Menu,
            Categories,
            Promotion,
            Product,
        },
    }
</script>