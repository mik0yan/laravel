<template>
<div class="cardLists">
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
   name:"cardLists",
   data() {
       return {
           msg : " ",
           dataArr: [
               {
                    title: "权威机构",
                    desr: "多家国内顶级三甲医院合作伙伴:301医院、北京协和医院、四川华西医院、湖南湘雅医院、上海第六人民医院、广东医科大学附一医院",
                    imgStr:"http://www.hezhongyimeng.com/nmip/medical/images/index/shop4.png",
                    linkStr:"更多 >>"
               },
               {
                    title: "特色服务",
                    desr: "国际领先医疗机构合作:瑞士席勒顶级心肺功能监测设备，加拿大健康管家服务，可穿戴健康指标集采设备。",
                    imgStr:"/images/pft.png",
                    linkStr:"更多 >>"
               },
               {
                    title: "非药理念",
                    desr: "打破传统健康模式，利用运动康复、精准康复，实现非药干预康复模式完善健康管理闭环",
                    imgStr:"http://www.hezhongyimeng.com/nmip/medical/images/index/shop1.png",
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
