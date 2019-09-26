<?php

namespace app\index\controller;

use think\Request;

class Index extends Base
{
    function __construct(Request $request = null)
    {
        parent::__construct($request);
    }

    /**
     * 首页
     */
    public function index()
    {
        return view('index/index');
    }

    /**
     * 登录
     */
    public function login()
    {
        $submit = input('param.submit') ? input('param.submit') : 0;
        if ($submit == 1) {

            return showRes(100, '用户不存在', 'json', "");
        } else {
            return view('index/login');
        }
    }

    /**
     * 注册
     */
    public function register()
    {
        $submit = input('param.submit') ? input('param.submit') : 0;
        if ($submit == 1) {

            return showRes(100, '用户已经存在', 'json', "");
        } else {
            return view('index/register');
        }
    }
}