<?php

return [
    'SUCCESS' => 200,

    'SYSTEM.FAILED'            => 500, // 系統異常
    'SYSTEM.BAD_REQUEST'       => 400, // 錯誤請求
    'SYSTEM.NOT_LOGGED_IN'     => 401, // 未登入
    'SYSTEM.PERMISSION_DENIED' => 403, // 權限不足
    'SYSTEM.API_NOT_EXIST'     => 404, // api不存在

    // AUTH.LOGIN(10001)
    'AUTH.LOGIN.INVALID_EMAIL'      => 10001101, // 登入EMAIL格式錯誤
    'AUTH.LOGIN.INVALID_PASSWORD'   => 10001102, // 登入password格式錯誤
    'AUTH.LOGIN.AUTH_FAILED'        => 10001201, // 登入驗證失敗

    # Auth.REGISTER(10002)
    'AUTH.REGISTER.INVALID_NAME'                    => 10002101,
    'AUTH.REGISTER.INVALID_EMAIL'                   => 10002102,
    'AUTH.REGISTER.INVALID_PASSWORD'                => 10002103,
    'AUTH.REGISTER.INVALID_PASSWORD_CONFIRMATION'   => 10002104,
];
