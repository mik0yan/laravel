<template>
<div>
  <div class="nvgSec">
    <b-navbar toggleable="md" variant="dark" class="headerNvg">
      <div class="mainNavSec">
        <router-link tag='div' to="home" class="navItem">首页</router-link>
      </div>
      <div class="subNavSec">
        <router-link tag='div' to="shoppage" class="navItem">商城New</router-link>
        <router-link tag='div' to="rgsorlg" class="navItem">登陆/注册</router-link>
      </div>
    </b-navbar>
  </div>
  <router-view></router-view>
</div>
</template>

<script>
export default {
  name: 'nvgSec',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App jjj',
      titleStr: '首页',
    }
  }
}
</script>

<style scoped>
.headerNvg {
  width: 100%;
  /* background: #fff; */
  height: 70px;
  display: flex;
}

.headerNvg > div {
  height: 100%;
}

.mainNavSec {
  min-width: 100px;
  max-width: 250px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.subNavSec {
  flex: 1;
  justify-content: flex-end;
  display: flex;
  align-items: center;
}

.headerNvg .navItem {
  color: white;
  min-width: 100px;
  max-width: 140px;
  margin-left: 30px;
  font-size: 17px;
  cursor: pointer;
}

.mainNavSec .navItem {
    border:1px solid white;
    font-size: 20px;
    margin: auto;
    justify-content:center;
}

</style>


