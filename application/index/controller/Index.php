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
     * 登录页
     */
    public function login()
    {
        return view('index/login');
    }
}