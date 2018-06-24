<template>
<div class="footSec">
<b-card  bg-variant="dark" text-variant="white" title="关于我们">
  <p v-for="item in dataArr" class="card-text text-center">
    {{ item }}
  </p>
  <!-- <b-button href="#" variant="primary">Go somewhere</b-button> -->
</b-card>
</div>
</template>

<script>
export default {
    data() {
        return {
            dataArr: [
                "合众医盟自成立以来，一直致力于为用户提供互联网+健康管理的综合解决方案",
                "合众医盟正式推出健康服务平台，解决了从基层医疗入口，加强执业医师的非药物干预能力。",
                "为用户提供以健康档案为基础搭建信息共享平台",
                "全方位健康管理解决方案，实现预防医疗的无缝对接",
                "了解自己，改变自己"
            ]
        }
    }
}
</script>

<style scoped>
.footSec {
    margin-top: 100px; 
}

p {
    margin: 0 0;
}
</style>


