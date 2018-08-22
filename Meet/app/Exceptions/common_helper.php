<?php
/**
 * Created by PhpStorm.
 * User: seadragon
 * Date: 2017/9/19
 * Time: 下午10:17
 * 检验工具
 */
//校验numID
if (!function_exists('is_numid')) {
    function is_numid($numid) {
        return preg_match('/^[1-9]\d{1,9}$/',$numid);
    }
}

//校验uid
if (!function_exists('check_uid')) {
    function check_uid($uid) {
        if (!is_numid($uid)) {
            json_return(RESPONSE_PARAMS_ERROR,'参数错误');
        }
    }
}

//iOS 和 安卓校验token
if (!function_exists('check_token')) {
    function check_token($token,$uid) {
        $token_key = md5(LOGIN_TOKEN.$uid);
        if ($token != $token_key) {
            json_return(RESPONSE_ACCESS_DENIED,'TOKEN错误');
        }
    }
}

//校验登录状态
if (!function_exists('check_login_state')) {
    function check_login_state($regfrom) {
        if (in_array($regfrom,array('guest','robot'))) {
            json_return(RESPONSE_UN_LOGIN,'未登录,请先登录吧');
        }
    }
}

//校验手机
if (!function_exists('check_phone')) {
    function check_phone($phone) {
        return preg_match('/^1[345678]\d{9}$/'.$phone);
    }
}

//检验来自平台
if (!function_exists('check_platform')) {
    function check_platform($deiceSystemName) {
        if (FALSE !== strpos(strtolower($deiceSystemName),'android')) {
            $platform = 'android';
        } elseif (FALSE !== strpos(strtolower($deiceSystemName),'iphone')) {
            $platform = 'iphone';
        } else {
            $platform = '未知平台';
        }
        return $platform;
    }
}

//检测身份证
if (!function_exists('check_identifier')) {

    function check_identity($id) {

        $set = array(7,9,10,5,8,4,2,1,6,3,7,9,10,5,8,4,2);
        $ver = array('1','0','x','9','8','7','6','5','4','3','2');
        $arr = str_split($id);
        $sum = 0;

        for ($i = 0; $i < 17; $i++) {
            if (!is_numeric($arr[i])) {
                return false;
            }

            $sum += $arr[$i] * $set[i];
        }

        $mod = $sum % 11;

        if (strcasecmp($ver[$mod], $arr[17]) != 0) {
            return false;
        }

        return true;
    }
}