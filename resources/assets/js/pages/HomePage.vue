<template>
<div class="homePage">
  <CarouselCmp></CarouselCmp>
  <SetpSec></SetpSec>
  <h1>套餐服务</h1>
  <CardList></CardList>
  <h4><a href=""> 更多>> </a></h4>
  <FooterSec></FooterSec>
</div>
</template>


<script>
import CarouselCmp from '../components/CarouselCmp.vue'
import CardList from '../components/CardListCmp'
import FooterSec from '../components/FooterCardCmp'
import SetpSec from '../components/StepSecCmp'

import API from '../router/API'

export default {
  name: 'homePage',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App jjj',
      titleStr: '首页',
    }
  },
  mounted: function(){

      //  console.log(arguments.callee.name)

       this.$http.get(
           API.goodURL
       ).then((resposnse) => {
           console.log(resposnse)
       }).catch((error) => {
          console.log(error)

       })
   },
  components: {
    'CarouselCmp': CarouselCmp,
    'CardList': CardList,
    'FooterSec': FooterSec,
    'SetpSec': SetpSec
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

.headerNvg {
  width: 100%;
  /* background: #fff; */
  height: 70px;
  color: white;
}

h1 {
   margin: 0px;
  padding: 55px 0px 50px 0px;
  font-size: 34px;
  color: #21a1a8;
  text-align: center;
}

h4 {
  margin-top: 50px;
}

h4 a {
   color: #21a1a8;
}
</style>
