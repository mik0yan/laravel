<template>
<div class="wrapper">
    <b-card-group deck class="list">
        <b-card v-for="(item, index) in dataArr"  :key="index" no-body
        :img-src="item.imgStr"
        img-alt="Img"
        img-top 
        class="cardItem">
            <p class="text-muted">{{ item.desr }}</p>
            <!-- <b-card-body>
                <a href="">{{ item.linkStr }} </a>
            </b-card-body> -->
            <div>
                <span class="price">{{ item.title }}</span>
            </div>
        </b-card>
    </b-card-group>
</div>
</template>

<script>
export default {
    name: "wrapper",
    data() {
       return {
           msg : " ",
           dataArr: [
               {
                    title: "¥ 100.00",
                    desr: "商品描述here",
                    imgStr:"http://www.hezhongyimeng.com/nmip/medical/images/index/shop4.png",
                    linkStr:"更多 >>"
               },
               {
                    title: "¥ 100.00",
                    desr: "商品描述here",
                    imgStr:"http://www.hezhongyimeng.com/nmip/medical/images/index/shop3.png",
                    linkStr:"更多 >>"
               },
               {
                    title: "¥ 100.00",
                    desr: "商品描述here",
                    imgStr:"http://www.hezhongyimeng.com/nmip/medical/images/index/shop1.png",
                    linkStr:"更多 >>"
               },
               {
                    title: "¥ 100.00",
                    desr: "商品描述here",
                    imgStr:"http://www.hezhongyimeng.com/nmip/medical/images/index/shop2.png",
                    linkStr:"更多 >>"
               }
           ]
       }
   },
   components: {

   }  
}
</script>

<style scoped>
.wrapper {
    margin: 15px auto;
    width: 80%;
}

.price {
    padding: 15px 0px;
    color: #21a1a8;
}
</style>
