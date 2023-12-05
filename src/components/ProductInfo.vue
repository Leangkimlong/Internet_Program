<template>
    <div class="productInfo-con">
        <div class="img-con">
            <img src="../assets/img/18 1.png" alt="">
        </div>
        <div class="info-con">
            <div class="text">
                In Stock
            </div>
            <p class="title">Seeds of Change Organic Quinoa, Brown</p>
            <div class="stars">
                <img v-for="s in ShowStar()" :src="s" alt="">
                <p>({{ star.toFixed(1) }})</p>
            </div>
            <div class="price">
                <p>${{ Discount(price) }}</p>
                <p>${{ price }}</p>
            </div>
            <div class="description">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium cum exercitationem sequi aspernatur modi at enim error aliquam aperiam quisquam. Est magni sint ipsam aperiam maxime placeat, iste blanditiis laboriosam deleniti perferendis totam iure nam ullam dolorum iusto eum cumque. Tempora dolorem iusto tenetur quo sed, ipsum odit dolor ea voluptatem qui possimus maxime temporibus in, debitis ratione ipsa consectetur a sint! Perspiciatis amet tempora atque, laborum sit itaque dolorem, distinctio, ipsam reiciendis sapiente impedit ducimus? Labore ipsum vitae molestiae? Facere similique pariatur veritatis amet dolores error, odit vero cupiditate, sint, numquam deserunt deleniti nam doloribus ratione! Deleniti, temporibus distinctio!
            </div>
            <div class="cart-con">
                <div class="cart">
                    <div class="value">
                        {{ quantity }}
                        <div class="ItemsInCart">
                            <i @click="quantity++" class="fa-solid fa-arrow-up"></i>
                            <i @click="
                            if(quantity>0){
                                quantity--;
                            }" class="fa-solid fa-arrow-down"></i>
                        </div>
                    </div>

                </div>
                <div class="AddToCart">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                        <g clip-path="url(#clip0_1584_1013)">
                        <path d="M16.656 2.80322H3.48401L3.45601 2.56922C3.39871 2.08283 3.16493 1.63438 2.799 1.30887C2.43307 0.983372 1.96042 0.803451 1.47067 0.803223L0.656006 0.803223V2.13656H1.47067C1.63396 2.13658 1.79156 2.19653 1.91359 2.30503C2.03561 2.41354 2.11357 2.56306 2.13267 2.72522L3.18934 11.7039C3.24664 12.1903 3.48042 12.6387 3.84635 12.9642C4.21228 13.2897 4.68492 13.4697 5.17467 13.4699H13.9893V12.1366H5.17467C5.01128 12.1365 4.85359 12.0765 4.73156 11.9678C4.60952 11.8592 4.53163 11.7095 4.51267 11.5472L4.42534 10.8032H15.2133L16.656 2.80322ZM14.0987 9.46989H4.26867L3.64134 4.13656H15.0607L14.0987 9.46989Z" fill="white"/>
                        <path d="M5.32259 16.8032C6.05897 16.8032 6.65592 16.2063 6.65592 15.4699C6.65592 14.7335 6.05897 14.1366 5.32259 14.1366C4.58621 14.1366 3.98926 14.7335 3.98926 15.4699C3.98926 16.2063 4.58621 16.8032 5.32259 16.8032Z" fill="white"/>
                        <path d="M11.9893 16.8032C12.7257 16.8032 13.3227 16.2063 13.3227 15.4699C13.3227 14.7335 12.7257 14.1366 11.9893 14.1366C11.253 14.1366 10.656 14.7335 10.656 15.4699C10.656 16.2063 11.253 16.8032 11.9893 16.8032Z" fill="white"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_1584_1013">
                        <rect width="16" height="16" fill="white" transform="translate(0.656006 0.803223)"/>
                        </clipPath>
                        </defs>
                    </svg>
                    <p>Add To Cart</p>
                </div>
                <div class="icon-con">
                    <i class="fa-regular fa-heart"></i>
                </div>
                <div class="icon-con">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                        <g clip-path="url(#clip0_1584_1025)">
                            <path d="M14.0196 9.79517L13.0769 10.7378L14.6049 12.2665H14.3502C12.0942 12.2665 10.6596 11.2452 9.38623 9.92783L9.18623 10.1598C8.96757 10.4132 8.74224 10.6738 8.50757 10.9358C9.23236 11.7751 10.1299 12.4478 11.1388 12.9081C12.1476 13.3683 13.244 13.6052 14.3529 13.6025H14.6049L13.0762 15.1312L14.0189 16.0738L16.2142 13.8785C16.4642 13.6285 16.6046 13.2894 16.6046 12.9358C16.6046 12.5823 16.4642 12.2432 16.2142 11.9932L14.0196 9.79517Z" fill="#B6B6B6"/>
                            <path d="M14.3508 5.59983H14.6048L13.0768 7.1285L14.0195 8.07117L16.2148 5.87583C16.4648 5.6258 16.6052 5.28672 16.6052 4.93317C16.6052 4.57961 16.4648 4.24054 16.2148 3.9905L14.0195 1.79517L13.0768 2.73783L14.6048 4.2665H14.3501C11.0455 4.2665 9.23879 6.0465 7.59946 7.9185C5.98012 6.08983 4.03346 4.2665 0.578125 4.2665V5.59983C3.55413 5.59983 5.16012 7.15717 6.71746 8.93317C5.16012 10.7092 3.55413 12.2665 0.578125 12.2665V13.5998C4.45012 13.5998 6.42879 11.3092 8.17812 9.28917C9.81412 7.39183 11.3628 5.59983 14.3508 5.59983Z" fill="#B6B6B6"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_1584_1025">
                            <rect width="16" height="16" fill="white" transform="translate(0.604736 0.933167)"/>
                            </clipPath>
                        </defs>
                    </svg>
                </div>
            </div>
            
            <div class="vendor">
                <label for="">Vendor: <p>{{ vendor }}</p></label>
                <label for="">SKU: <p>{{ SKU }}</p></label>
            </div>
            
        </div>
    </div>
</template>

<script>
    import star1 from '../assets/img/001-star1.png'
    import star2 from '../assets/img/001-star5.png'

    export default{
        data(){
            return{
                quantity: 1,
            }
        },
        props:{
            star:{
                type: Number,
                default: 4.0,
            },
            price:{
                type:Number,
                default: 10,
            },
            discount:{
                type:Number,
                default: 10,
            },
            vendor:{
                type: String,
                default: "NestMart",
            },
            SKU:{
                type: String,
                default: "FMW15VKT"
            }
        },

        methods:{
            ShowStar(){
                let allStar = [];
                for(let i = 0; i < 5; i++){
                    if(i < this.star){
                        allStar.push(star1);
                    }else{
                        allStar.push(star2);
                    }
                }
                return allStar;
            },
            Discount(x){
                return Math.floor(x*(1 - this.discount/100));
            }
        }
    }
</script>