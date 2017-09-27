<?php

namespace App\Http\Controllers;

use App\Http\Controllers\RoleBaseController;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class VivoController extends Controller
{

  public function __construct()
  {

  }

  //检测账号
  public function checkAccount(Request $request)
  {
    $roleBaseController = new RoleBaseController();
    $openid = $request->input('openid');
    $name = $request->input('name');
    $account = 'vivo_' . $openid;
    if ($roleBaseController::checkSign($request) == sign_valid) {
      $authtoken = $request->input('authtoken');
      //校验token
      $res_check = self::vivo_check_token($authtoken);
      $res_check_arr = \GuzzleHttp\json_decode($res_check, true);
      //校验成功
      if ($res_check_arr['retcode'] == 0) {
        //检测并创建账号
        $role_data = $roleBaseController->checkAccount($request, $account);
        //判断账号保存状态
        if ("error" == $role_data['save_state']) {
          $reponse = response()->json(['rtCode' => 10001, 'msg' => $role_data['msg'],
            'account' => "", 'name' => ""]);
        } else {
          $reponse = response()->json(['rtCode' => 10000, 'msg' => 'loginsucess',
            'account' => $role_data['account'], 'name' => $role_data['name']]);
        }
      } //token校验失败
      else {
        $reponse = response()->json(['rtCode' => 10001, 'msg' => 'invalid token',
          'account' => $account, 'name' => $name]);
      }
    } else {
      //签名错误
      $reponse = response()->json(['rtCode' => 10001, 'msg' => 'invalid sign',
        'account' => "", 'name' => ""]);
    }
    return $reponse;
  }

// 验证vivo authtoken
  function vivo_check_token($authtoken)
  {
    $client = new \GuzzleHttp\Client();
    $response = $client->request('POST', 'https://usrsys.vivo.com.cn/sdk/user/auth.do', [
      'form_params' => [
        'authtoken' => $authtoken,
        'from' => "yabrand",
      ]
    ]);
    return $response->getBody();
  }

//  获取支付信息
  function get_order(Request $request)
  {
    $roleBaseController = new RoleBaseController();
    $sign = $roleBaseController->checkSign($request);
    if ($sign == sign_valid) {
      $out_trade_no = "landlord_vivo" . time();
      $pay_res = $roleBaseController->get_pay_order($request, $out_trade_no);
      if ($pay_res['code'] == 'success') {
        $reponse = response()->json(['rtCode' => "10000", 'msg' => 'success',
          'amount' => $pay_res['amount'], 'out_trade_no' => $out_trade_no,
          'notify_url' => stripslashes(vivo_notify_url)]);
      } else {
        //获取订单信息失败
        $reponse = response()->json(['rtCode' => "10001", 'msg' => $pay_res['code']]);
      }
    } else {
      //签名错误
      $reponse = response()->json(['rtCode' => "10001", 'msg' => urlencode('PHP签名错误')]);
    }
    return $reponse;
  }

//支付成功回调
  function pay_callback(Request $request)
  {
    //先校验签名
    $sign = $request->input('signature');
    $cpOrderNumber = $request->input('cpOrderNumber');
    unset($request['signature']);
    unset($request['signMethod']);
    //先将参数按字母排序叠加,然后加上key,使用MD5加密转大写
    $requestArr = $request->input();
    ksort($requestArr);
    $sign_str = "";
    foreach ($requestArr as $key => $value) {
      if ($key != '_url') {
        $sign_str .= $key . '=' . $value . "&";
      }
    }
    $sign_str = $sign_str . strtolower(md5(vivo_app_key));
    $sign_str = strtolower(md5($sign_str));
    if ($sign_str == $sign) {
      //通知erlang服务器
      $roleBaseController = new RoleBaseController();
      $gameres = $roleBaseController->game_callback($cpOrderNumber);
      Log::debug($gameres);
      if ($gameres["code"] == "sucess") {
        return "sucess";
      } else {
        return "fail";
      }
    } else {
      return "fail";
    }
  }

  function testApi(Request $request)
  {
    print_r($request->except("testApi"));
  }
}
