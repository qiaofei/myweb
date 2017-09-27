<?php

namespace App\Http\Controllers;

use App\Model\RoleBase;
use App\Model\RoleBaseCommon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class RoleBaseController extends Controller
{

  /**
   * 校验签名
   * @param Request $request
   * @return string
   */
  public static function checkSign(Request $request)
  {
    $sign_str = sign_key;
    $sign = $request->input('sign');
    unset($request['sign']);
    //先将参数按字母排序叠加,然后加上key,使用MD5加密转大写
    $requestArr = $request->input();
    ksort($requestArr);
    foreach ($requestArr as $key => $value) {
      if ($key != '_url') {
        $sign_str .= $key . '=' . $value . "&";
      }
    }
    $sign_str = substr($sign_str, 0, strlen($sign_str) - 1);
    $sign_str = strtoupper(md5($sign_str));
    if ($sign == $sign_str) {
      return sign_valid;
    } else {
      return sign_invalid;
    }
  }

  /**
   *  判断account是否存在
   * @param Request $request
   * @return string
   */
  public function isAccountExit(Request $request)
  {
    $account = $request->input('account');
    $data = RoleBase::where('account', $account)->get()->first();
    if ($data == null) {
      return "not exit";
    } else {
      return "exit";
    }
  }

  /**
   * 判断账号是否存在,不存在则创建
   */
  public function checkAccount(Request $request, $account)
  {
    $roleBase = new RoleBase();
    $name = $request->input('name');
    $agent_id = $request->input('agent_id');
    $role_data = $roleBase->find_role($account);
    if ($role_data == null) {
      //创建账号
      //插入数据到role_base
      $save_state = $roleBase->save_role($account, $agent_id);
      //是否保存role_base成功
      if ($save_state) {
        //获取roleid
        $role_id = $role_data['role_id'];
        //插入数据到role_base_common
        $roleBaseCommon = new RoleBaseCommon();
        $save_state = $roleBaseCommon->save_role_common($role_id, $name, $request);
        if ($save_state) {
          $role_data_new = array("save_state" => "success", "account" => $account, "name" => $name);
        } else {
          $role_data_new = array("save_state" => "error", "msg" => "saverolecommonerror");
        }
      } else {
        $role_data_new = array("save_state" => "error", "msg" => "saveroleerror");
      }
    } else {
      //账号已经存在,查找出name
      $roleBaseCommon = new RoleBaseCommon();
      $role_info = $roleBaseCommon->getRoleData($role_data['role_id']);
      $name = $role_info['name'];
      $role_data['save_state'] = "exist";
      $role_data['name'] = $name;
      $role_data_new = $role_data;
    }
    return $role_data_new;
  }

  //根据传过来的exchange_id等数据,向斗地主服务器发送请求,插入weflow,返回充值金额
  public function get_pay_order(Request $request, $out_trade_no)
  {
    $exchange_id = $request->input('exchange_id');
    $role_id = $request->input('role_id');
    $role_name = $request->input('role_name');
    $account = $request->input('account');
    $sign_str = sign_key . "account=" . $account . "&exchange_id=" . $exchange_id
      . "&out_trade_no=" . $out_trade_no . "&role_id=" . $role_id
      . "&role_name=" . $role_name;
    $sign = strtoupper(md5($sign_str, false));
    $client = new \GuzzleHttp\Client();
    $response = $client->request('POST', game_base_url . app_pay_landlord, [
      'form_params' => [
        'exchange_id' => $exchange_id,
        'role_id' => $role_id,
        'role_name' => $role_name,
        'account' => $account,
        'out_trade_no' => $out_trade_no,
        'sign' => $sign
      ]
    ]);
    $response = \GuzzleHttp\json_decode($response->getBody(), true);
    return $response;
  }

//游戏里的支付回调
  function game_callback($out_trade_no)
  {
    try {
      $client = new \GuzzleHttp\Client();
      $sign_land = strtoupper(md5(sign_key . "out_trade_no=" . $out_trade_no));
      $response = $client->request('POST', game_base_url . app_call_back, [
        'form_params' => [
          'out_trade_no' => $out_trade_no,
          'sign' => $sign_land
        ]
      ]);
      $response = \GuzzleHttp\json_decode($response->getBody(), true);
      return $response;
    } catch (\Exception $exception) {
      Log::debug("calback exception!!!!!!!!!!");
      Log::debug($exception);
      return ['code' => 'fail'];
    }
  }

  /**
   *生成token
   */
  public function genarate_token()
  {
    $token = md5(rand(0, 10000000));
    return $token;
  }

}
