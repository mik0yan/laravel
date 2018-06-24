<template>
<div class="wrapper">
    <b-card-group deck>
        <b-card v-for="(item, index) in dataArr" :key="index"
                text-variant="white"
                class="text-center text-dark cell" :class="item.isLast ?  '': 'hasArrow'">
            <h5>{{ item.tagStr }}</h5>
            <div>
                <img :src="item.imgStr">
            </div>
            <h4>{{ item.titleStr }}</h4>
            <p class="card-text text-dark-50">{{ item.desr }}</p>
        </b-card>
    </b-card-group>
</div>
</template>

<script>
export default {
    name: "wrapper",
    data: function() {
        return {
            dataArr: [
                {
                    tagStr: "STEP1",
                    titleStr: "注册账号",
                    imgStr: "http://www.hezhongyimeng.com/nmip/medical/images/step1.png",
                    desr: "成为翌健康网站居民的医院",
                    isLast: false
                },
                {
                    tagStr: "STEP2",
                    titleStr: "首次体检",
                    imgStr: "http://www.hezhongyimeng.com/nmip/medical/images/step2.png",
                    desr: "预约首次体检，到专业的医疗机构体验高端设备全面评估",
                    isLast: false
                },
                {
                    tagStr: "STEP3",
                    titleStr: "私人医生",
                    imgStr: "http://www.hezhongyimeng.com/nmip/medical/images/step3.png",
                    desr: "可以根据系统推荐或者选定专职医生并激活服务",
                    isLast: false
                },
                {
                    tagStr: "STEP4",
                    titleStr: "增值服务",
                    imgStr: "http://www.hezhongyimeng.com/nmip/medical/images/step4.png",
                    desr: "选购全方位的保护服务，开启您的非药健康管理旅程",
                    isLast: true
                }
            ]
        }
    }
}
</script>

<style scoped>
.wrapper {
    background-color: #e6f2f2;
    border-bottom: #bababa;
    height: 480px;
    display:flex;
    align-items:center;
    justify-content:center;
}

.cell {
    background-color: rgba(0,0,0,0.0);
    border: 0px;
}

.hasArrow {
    background: url(http://www.hezhongyimeng.com/nmip/medical/images/right.png) no-repeat;
    background-position: 100% 50%;
}

h4 h5 {
    margin-bottom: 10px;
}

h4 {
    color: #21a1a8;
}

img {
    height: 83px;
    margin: 15px auto;
}

</style>
