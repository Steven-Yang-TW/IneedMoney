# 修改日誌

## 自訂義新增的commands

```php
php artisan make:support <filename>
```
自訂義創建support檔案在App\Supports底下的artisan指令

```php
php artisan make:repository <filename>
```
自訂義創建有l5-repository基礎結構的檔案在App\Repositories底下

## 文件結構
- console: 自訂義artisan指令
- events: 執行的事件
- listener: 自訂義監聽器
- exceptions: 自訂義例外
- supports: 自訂義的輔助方式
- requests: 自訂義request的篩選規則
- resources: 自訂義回傳json resource的輸出規則
- repositories: 自訂義的l5-repository檔案

## 目前進度
> 基礎會員註冊、登入驗證 - 2021/12/09

> 完善log紀錄功能(後續考慮使用redis)，完善resource和exception - 2021/12/10

## 需完善項目：
- resource的撰寫
- log使用queue進行紀錄

## 新增套件
- l5-repository (資料庫操作工具)
- jenssegers/agent (客戶端檢測工具)
- ext-json (json_decode時phpstorm不會報錯)


## 網站路口
[index] (localhost:8010/home)
