## 文件結構
在寫router前有一個重要的事情就是得了解文件結構

![[Pasted image 20220106110103.png]]

在 resource/js 底下我們需要分出幾個部分

- layouts層：為展示基底，讓其它頁面掛載後再向外渲染
- pages  層：在App.vue等基底文件上做出不同頁面效果
- router.js  ：儲存所有路由

在了解文件結構後，就開始實現SPA

## router.js
```javascript
import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './pages/Home.vue';
import About from './pages/About.vue';

Vue.use(VueRouter);

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
    ]
});

export default router;
```

第1~2行載入vue與vue-router，並在第7行讓vue使用vueRouter。
接者4~5行將page下的vue載入。
而9~24行會註冊需要的路由訊息，包括：路徑、名稱、元件。
10行：設定SPA模式，分成`hash模式` 與 `history模式`，差別在於URL後面是否有 ''#''。
11行：是指精準匹配，是指對整個URL相同的路由進行操作，比如點擊/users，如果沒有使用精準匹配會連同/users/even、/users/even?foo=123，等這些路由都受影響。


[mode的設定](https://www.796t.com/article.php?id=85898)
[什麼是linkExactActiveClass](https://blog.csdn.net/meikaied/article/details/85322278)
