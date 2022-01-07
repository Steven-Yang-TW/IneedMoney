## 布局SPA
----
### 修改 vue的入口文件
首先打開 app.js，將文件修改成

```js
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import router from './router';
import App from './layouts/App.vue';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    router,
    el: '#app',
    render:h => h(App)
});

```

我們看到這段：
``` js
import router from './router';
import App from './layouts/App.vue';
```
這是將我們寫好的路由跟初始基底頁面載入到laravel裡。

再來看到這段：
```js
const app = new Vue({
    router,
    el: '#app',
    render:h => h(App)
});
```
然後告知部屬 router和渲染App.vue到初始頁面

萬事俱備只欠東風，剩下的就是在web.php裡寫好入口

```php
Route::get('/{any}', function () {
	return view('layouts.vue');
})->where('any', '.*');
```

此時我們欠缺view/layouts/vue.blade.php這支檔案，來創建一下

```html
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body class="antialiased">

    <div id="app"></div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
```

大部分都跟創建html一樣只有兩個重點
``` html
<div id="app"></div>
<script src="{{ asset('js/app.js') }}"></script>
```

為什麼id會是app呢，回到app.js裡的這段
``` js
const app = new Vue({
	router,
	el: '#app',
	render:h => h(App)
});
```
其中 `el: '#app'`告訴要將vue掛載在id = app的元素上。

完成後就編譯腳本吧 `npm run dev`

成功後
![[Pasted image 20220106175923.png]]
