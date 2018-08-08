<template>
   <div class="shopSec">
       <product-list></product-list>
       <div>
       <b-pagination size="lg" :total-rows="100" v-model="currentPage" :per-page="10" class="pageBar" align="center">
       </b-pagination>
       </div>
   </div>
</template>

<script>
import ProductCmp from '../components/ProductCmp.vue'
export default {
    name: "shopSec",
    data: function() {
        return {
            dataArr: [
               {
                    title: "家庭医生",
                    desr: "签约家庭医生，提供个性化的非药物健康管理服务",
                    imgStr:"http://www.hezhongyimeng.com/nmip/medical/images/index/shop4.png",
                    linkStr:"更多 >>"
               },
               {
                    title: "居民健康档案",
                    desr: "完善的居民个人健康档案，将您的健康数据存储至云平台，方便就医调取",
                    imgStr:"http://www.hezhongyimeng.com/nmip/medical/images/index/shop3.png",
                    linkStr:"更多 >>"
               },
               {
                    title: "风险评估报告",
                    desr: "由中华预防医学会提供专业风险评估报告，全面评估各类型疾病的发病风险",
                    imgStr:"http://www.hezhongyimeng.com/nmip/medical/images/index/shop1.png",
                    linkStr:"更多 >>"
               },
               {
                    title: "全面干预方案",
                    desr: "由301医院等国内外多家机构提供的权威解决方案，运动营养心理全面呵护您的健康",
                    imgStr:"http://www.hezhongyimeng.com/nmip/medical/images/index/shop2.png",
                    linkStr:"更多 >>"
               }
           ]
        }
    },
    components: {
        'product-list': ProductCmp
    }
}
</script>

<style scoped>
.shopSec {
    background: #eee;
}

.pageBar {
    margin: 0px auto;
    width: 80%;
}
</style>
