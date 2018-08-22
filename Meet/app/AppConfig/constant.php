<?php
/**
 * Created by PhpStorm.
 * User: seadragon
 * Date: 2017/9/19
 * Time: 下午9:55
 */
//登录的Token
defined('LOGIN_TOKEN')           OR define('LOGIN_TOKEN','bfC3a72D83B9749b');
//手机密码签名
defined('PHONE_PASSWORD_SECERT') OR define('PHONE_PASSWORD_SECERT','F899B2B77EB3ED4B8789');
//模式切换
defined('ENVIRONMENT')           OR define('EVNIROMENT','development');

//通用的返回码
defined('RESPONSE_OK')            OR define('RESPONSE_OK','1');//成功
defined('RESPONSE_UN_LOGIN')      OR define('RESPONSE_UN_LOGIN', -1);//未登录
defined('RESPONSE_SYSTEM_BUSY')   OR define('RESPONSE_SYSTEM_BUSY' ,0);//系统繁忙
defined('RESPONSE_MAXNUM_LIMIT')  OR define('RESPONSE_MAXNUM_LIMIT', -4);//最大上线
defined('RESPONSE_PARAMS_ERROR')  OR define('RESPONSE_PARAMS_ERROR', -2);//参数错误
defined('RESPONSE_ACCESS_DENIED') OR define('RESPONSE_ACCESS_DENIED', -3);//拒绝访问
defined('RESPONSE_UNKNOWN_ERROR') OR define('RESPONSE_UNKNOWN_ERROR', -99);//未知错误
