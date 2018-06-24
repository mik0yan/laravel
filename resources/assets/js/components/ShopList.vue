<template>
<div class="shopList">
    <b-card-group deck class="list">
        <b-card v-for="(item, index) in dataArr" :key="index" no-body
                :img-src="item.imgStr"
                img-alt="Img"
                img-top
                class="cardItem">
            <h6 class="card-text">
                {{ item.title }}
            </h6>
            <p class="text-muted">{{ item.desr }}</p>
            <!-- <b-card-body>
                <a href="">{{ item.linkStr }} </a>
            </b-card-body> -->
        </b-card>
    </b-card-group>
</div>
</template>

<script>
export default {
   name:"shopList",
   data() {
       return {
           msg : " ",
           dataArr: [
               {
                    title: "家庭医生套餐",
                    desr: "家庭医生服务基础套餐含12个月专属家庭医生服务高端顶配版健康检测仪",
                    imgStr:"http://www.hezhongyimeng.com/nmip/medical/images/index/shop4.png",
                    price:"1932",
                    linkStr:"更多 >>"
               },
               {
                    title: "顶配家庭健康检测仪",
                    desr: "20秒内检测20项人体生理数据-铝合金CNC加工外壳，卡片体积",
                    imgStr:"http://www.hezhongyimeng.com/nmip/medical/images/index/shop4.png",
                    price:"2020",
                    linkStr:"更多 >>"
               },
           ]
       }
   },
   components: {

   }
}
</script>


<style scoped>
.cardLists {
    /* background: rebeccapurple; */
}
.list {
    width: 90%;
    margin: 0 auto;
}

h6 {
    padding-top: 10px;
    color: #21a1a8;
}

p {
    font-size: 14px;
}

.cardItem {
    /* max-width: 10rem; */
}
</style>
