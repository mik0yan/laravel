<template>
  <div id="app">
    <router-view></router-view>
  </div>
</template>

<script>
import NvgPage from './pages/NavigatePage.vue'

export default {
  name: 'app',
  components: {
    'nvg-page': NvgPage
  },
  updated() {
  },
  methods: {
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #fff;
  margin: 0;
}
</style>
