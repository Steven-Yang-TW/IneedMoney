## 範本模塊
``` javascript
	// 樣式區塊：渲染到組建的html區塊

	<template>
		....
	</template>

	// 動作區塊：vue進行動作的js區塊

	<script>
		export default {
			....
		}
	</script>
```
基本上，這個就是每個頁面的程式架構，那依照這個模塊我們創出三個頁面分別是：

- 基底頁面：App.vue
- 功能頁面：Home.vue 、About.vue

程式碼的部分就不貼上了，這邊就挑部分程式碼講解

## App.vue
我們可以看到17行：
```javascript
<router-link class="nav-link" data-toggle="collapse" :to="{ name: 'home' }">
```

> `<router-link>` 組件支持用戶在具有路由功能的應用中 (點擊) 導航。通過 `to` 屬性指定目標地址，而name對應的是路由名稱

```javascript
export default {
  watch: {
    $route() {
      $("#navbarCollapse").collapse("hide");
    },
  },
};
```

watch的意思是保持監聽，$route代表當有更改頁面或更改時URL時執行

`$("#navbarCollapse").collapse("hide");`

Home.vue與About.vue都是只是做為展示畫面並沒有什麼其它功能

<font size="5"><strong>[[第四步、與laravel連結]]</strong></font>
