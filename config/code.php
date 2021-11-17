<?php

return [
    'SUCCESS' => 200,

    'SYSTEM.FAILED' => 500, //系統異常
    'SYSTEM.BAD_REQUEST' => 400, // 錯誤請求
    'SYSTEM.API_NOT_EXIST' => 404, // api不存在

    // AUTH.LOGIN(10001)
    'AUTH.LOGIN.INVALID_EMAIL' => 10001101, // 登入EMAIL格式錯誤
    'AUTH.LOGIN.INVALID_PASSWORD' => 10001102, // 登入password格式錯誤
    'AUTH.LOGIN.AUTH_FAILED' => 10001201, // 登入驗證失敗
];
