<?php
/**
 * Created by PhpStorm.
 * User: seadragon
 * Date: 2017/9/19
 * Time: 下午10:12
 * 用途: 项目返回工具封装
 */
    //按照json方式输出
    function json_return($code = RESPONSE_SYSTEM_BUSY, $message = '', $data = array()) {
        //判断是否是纯数字
        if (!is_numeric($code)) {
            return '';
        }
        //组装数据
        $resultArray = array(
            'code'    => $code,
            'message' => $message,
            'data'    => $data
        );
        //返回
        exit(json_encode($resultArray));
    }