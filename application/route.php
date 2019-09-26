<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]' => [
        ':id' => ['index/index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/index/hello', ['method' => 'post']],
    ],

    // 主页
    'index' => 'index/index/index',         // 主页
    'login' => 'index/index/login',         // 登录
    'register' => 'index/index/register',   // 注册
];
