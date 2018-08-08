import Vue from 'vue'
import Router from 'vue-router'
import HomePage from '../pages/HomePage'
import RegisterOrLoginPage from '../pages/RegisterOrLoginPage'
import NvgPage from '../pages/NavigatePage'
import ShopPage from '../pages/ShopPage'
import Record from '../pages/Record.vue'

Vue.use(Router)

/*
  约定：
    url中，page命名 全小些
    page命名，以 功能名词 + page
    组件命名，以 【开发者前缀】+ 名词 + Cmp
*/


export default new Router({
  routes: [
    {
      path: '/',
      name: '导航栏',
      component: NvgPage,
      redirect: '/home',
      children: [
        {
          path: '/home',
          name: 'home',
          component: HomePage
        },
        {
          path: '/rgsorlg',
          name: '登陆or注册',
          component: RegisterOrLoginPage
        },
        {
         path: '/shoppage',   
         name: 'shoppage',
         component: ShopPage
        },
        {
          path: '/record',
          name: 'record',
          component: Record
        }
      ]
    }
  ]
})
