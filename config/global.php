<?php
/**
 * 一些常量定义在 global
 * User: nic
 * Date: 2017/3/8
 * Time: 14:53
 */
define("DL_WEBNAME", "BigMan 兑换系统");
define("sign_key", "yashili");              //签名key
define("sign_valid", "valid");              //签名合法
define("sign_invalid", "invalid");          //签名不合法

/**
 * 应用宝的一些参数
 */
// 应用基本信息，需要替换为应用自己的信息，必须和客户端保持一致
define("yyb_appid", "1106139646");
define("yyb_appkey", "0Yao5SdQXDSzP3JC");

// 应用宝微信基本信息，需要替换为应用自己的信息，必须和客户端保持一致
define("yyb_wx_appid", "wx52742ab5c7dabb0e");
define("yyb_wx_appkey", "ce9afb07235bbc76585aa068c5a8e5db");

// 应用支付基本信息,需要替换为应用自己的信息，必须和客户端保持一致
define("yyb_pay_appid", "1106139646");
define("yyb_pay_appkey", "J37F2T8IMbn0I2j0d8ZVxItRpzeFWhCa");

// ysdk后台API的服务器域名
// 调试环境: ysdktest.qq.com
// 正式环境: ysdk.qq.com
define("yyb_server_name", "ysdktest.qq.com");
//应用宝代理商id
define("yyb_agent_id", "30001");
//游戏链接
define("game_base_url", "http://103.239.206.19:8080/");
//define("game_base_url", "http://192.168.1.188:8080/");
//游戏的支付回调
define("app_call_back", "app_pay_callback");

//获取订单接口
define("app_pay_landlord", "app_pay_landlord");
//钻石充值接口
define("yyb_pay_callback", "yyb_pay_callback");

//vivo支付回调接口
define("vivo_notify_url", "http://appserver-trunk.bgameb.com/vivo/pay_callback");
define("vivo_app_key", "dbbd699a637f3313904840aeb47dc034");
