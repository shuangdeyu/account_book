<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * 设置ajax跨域头文件，允许跨域
 */
function setAjaxHead()
{
    header("Access-Control-Allow-Origin:*"); //*号表示所有域名都可以访问
    header("Access-Control-Allow-Method:POST,GET");
}

/**
 * 按综合方式输出通信数据
 * @param integer $code 状态码
 * @param string $message 提示信息
 * @param string $type 数据类型
 * @param array $data 数据
 * return string
 */
function showRes($code, $message = '', $type = 'default', $data = [])
{
    $type = strtolower($type);
    switch ($type) {
        case 'default':
            echo $message;
            break;
        case 'json':
            showJson($code, $message, $data);
            break;
    }
}

/**
 * 按json方式输出通信数据
 * @param integer $code 状态码
 * @param string $message 提示信息
 * @param array $data 数据
 * return string
 */
function showJson($code, $message = '', $data = array())
{
    $result = array(
        'code' => $code,
        'msg' => $message,
        'data' => $data
    );
    echo json_encode($result);
}

/**
 * 发送HTTP请求方法
 * @param string $url 请求URL
 * @param array $params 请求参数
 * @param string $method 请求方法GET/POST
 * @param array $header 头信息
 * @param bool $multi 是否传输文件
 * @return mixed
 * @throws \think\Exception
 */
function http($url, $params, $method = 'GET', $header = array(), $multi = false)
{
    $opts = array(
        CURLOPT_TIMEOUT => 30,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_HTTPHEADER => $header
    );
    /* 根据请求类型设置特定参数 */
    switch (strtoupper($method)) {
        case 'GET':
            $opts[CURLOPT_URL] = $url . '?' . http_build_query($params);
            break;
        case 'POST':
            //判断是否传输文件
            $params = $multi ? $params : http_build_query($params);
            $opts[CURLOPT_URL] = $url;
            $opts[CURLOPT_POST] = 1;
            $opts[CURLOPT_POSTFIELDS] = $params;
            break;
        default:
            throw new \think\Exception('不支持的请求方式！');
    }
    /* 初始化并执行curl请求 */
    $ch = curl_init();
    curl_setopt_array($ch, $opts);
    $data = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);
    //if($error) throw new Exception('请求发生错误：' . $error);
    return $data;
}
