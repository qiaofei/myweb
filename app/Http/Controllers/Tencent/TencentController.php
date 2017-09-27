<?php

namespace App\Http\Controllers\Tencent;

use YsdkApi;
use App\Http\Controllers\RoleBaseController;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class TencentController extends Controller
{
  public $sdk;

  public function __construct()
  {
    $this->sdk = new YsdkApi(yyb_appid, yyb_appkey);
    // 支付id 支付key
    $this->sdk->setPay(yyb_pay_appid, yyb_pay_appkey);
    // 设置调用环境，测试环境 or 现网环境
    $this->sdk->setServerName(yyb_server_name);
  }

  //检测账号
  public function checkAccount(Request $request)
  {
    $wx_openid = $request->input('openid');
    $wx_name = $request->input('wx_name');
    $account = 'yyb_' . $wx_openid;
    $wx_accesstoken = $request->input('accesstoken');
    $ts = time();
    //ysdk校验
    $params = array(
      'appid' => yyb_wx_appid,
      'openid' => $wx_openid,
      'sig' => md5(yyb_wx_appkey . $ts),
      'access_token' => $wx_accesstoken,
      'timestamp' => $ts,
    );
    $ret = self::wx_check_token($params);
    //  校验成功
    if ($ret['ret'] == 0) {
      RoleBaseController::checkAccount($request, $account);
      $result = 10000;
    } else {
      $result = 10001;
    }
    //返回json数据给前端
    return response()->json(['rtCode' => $result, 'msg' => $ret['msg'],
      'account' => $account, 'name' => $wx_name]);
  }

  //验证qq登录
  function qq_check_token($params)
  {
    $method = 'get';
    $script_name = '/auth/qq_check_token';

    return $this->sdk->api_ysdk($script_name, $params, $method);
  }

// 验证微信登录
  function wx_check_token($params)
  {
    $method = 'get';
    $script_name = '/auth/wx_check_token';
    return $this->sdk->api_ysdk($script_name, $params, $method);
  }

  //微信支付成功回调
  function wx_pay_callback(Request $request)
  {
    Log::debug("wx_pay_callback");
    //循环拿出request中的数据
    $allPs = $request->except('tencent/pay_callback');
    print_r($allPs);
    Log::debug($allPs);
    $sig = $request->input('sig');
    //先按升序排列
//    ksort($allPs);
    //生成原串
    $sig_str = 'GET&' . urlencode("103.239.206.19:443/tencent/pay_callback");
    foreach ($allPs as $key => $value) {
      if ($key != 'sig') {
        $sig_str .= '&' . $key . urlencode($value);
      }
    }
    //生成密钥
    $appkey_str = yyb_appkey . '&';
    //生成key
    $my_sig = hash_hmac('sha1', $sig_str, $appkey_str);
    //base64加密
    $my_sig = base64_encode($my_sig);
    /*  $ret_arr = array();
      //对比签名字符串
      if ($my_sig == $sig) {
        //调用斗地主接口
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', game_base_url . yyb_pay_callback, [
          'form_params' => [
            'field_name' => 'abc',
            'other_field' => '123'
          ]
        ]);
      } else {

      }*/
    //调用游戏服务器的购买接口
    $ts = time();
    $account = "yyb_" . $request->input("openid");
    $amt = $request->input("amt");
    $client = new \GuzzleHttp\Client();
    $response = $client->request('POST', game_base_url . yyb_pay_callback, [
      'form_params' => [
        'account' => $account,
        'ts' => $ts,
        'money' => $amt,
        'orderid' => 'yyb' . $ts,
      ]
    ]);
    $reponsestr = \GuzzleHttp\json_decode($response->getBody()->getContents());
    if ($reponsestr->msg == 'success') {
      return response()->json(['ret' => 0, 'msg' => 'OK']);
    } else {
      return response()->json(['ret' => 1, 'msg' => 'fail']);
    }
  }

  function payOrder(Request $request)
  {
    Log::debug($request);
    $ts = time();
    $client = new \GuzzleHttp\Client();
    $response = $client->request('POST', game_base_url . yyb_pay_callback, [
      'form_params' => [
        'account' => '153338641653',
        'ts' => $ts,
        'money' => 10,
        'orderid' => 'yyb' . $ts,
      ]
    ]);
    $reponsestr = \GuzzleHttp\json_decode($response->getBody()->getContents());
    if ($reponsestr->msg == 'success') {
      return response()->json(['ret' => 0, 'msg' => 'OK']);
    } else {
      return response()->json(['ret' => 1, 'msg' => 'fail']);
    }
  }

  function testApi(Request $request)
  {
    print_r($request->except("testApi"));
  }
}
