# 修改日誌

## commands

```php
php artisan make:support <filename>
```
自訂義創建support檔案在App\Supports底下的artisan指令

## 文件結構
- console: 自訂義artisan指令
- events: 執行的事件
- exceptions: 自訂義例外
- supports: 自訂義的輔助方式
- requests: 自訂義request的篩選規則
- resources: 自訂義回傳json resource的輸出規則

## 目前進度
> 基礎會員註冊、登入驗證

## 需完善項目：
- resource的撰寫
- log使用queue進行紀錄