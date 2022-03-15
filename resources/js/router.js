import Vue from 'vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Login from './pages/Login.vue';
import Register from "./pages/Register";

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(ElementUI);

const router = new VueRouter({
  mode: 'history',
  linkExactActiveClass: 'active',
  routes: [
        {
            path: '/home',
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
        },
        {
            path: '/register',
            name: 'register',
            component: Register
        }
  ]
});

router.beforeEach((to, from, next) => {
    const isLogin = localStorage.token ? true : false

    if (to.name == 'home' || to.name == 'login' || to.name == 'register') {
        next()
    } else {
        alert('請先登入');
        isLogin ? next() : next('/login')
    }
})

export default router;
