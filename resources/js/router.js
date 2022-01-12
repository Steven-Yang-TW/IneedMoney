import Vue from 'vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';

import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Login from './pages/Login.vue';

Vue.use(VueRouter);
Vue.use(VueAxios, axios);

const router = new VueRouter({
  mode: 'history',
  linkExactActiveClass: 'active',
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/about',
      name: 'about',
      component: About
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    }
  ]
});

export default router;
