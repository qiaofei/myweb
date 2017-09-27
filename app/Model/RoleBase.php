<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoleBase extends Model
{
  public $timestamps = false;
  protected $table = 'role_base';

  /**
   * 保存角色信息
   * @param $account
   * @param $agent_id
   * @return bool
   */
  public function save_role($account, $agent_id)
  {
    $account_type = 100;     //玩家在渠道登录，账号类型为4
    $password = md5(0);
    $create_time = time();
    $user_mission = "{mission,0,0,[{0,0},{1,0}],[{5,0}],[{22,0}],[],[]}";
    $this->account = $account;
    $this->account_type = $account_type;
    $this->password = $password;
    $this->login_time = $create_time;
    $this->create_time = $create_time;
    $this->user_mission = $user_mission;
    $this->agent_id = $agent_id;
    return $this->save();
  }

  /**
   * 查找角色
   * @param $account
   */
  public function find_role($account)
  {
    return $this->where('account', $account)->get()->first();
  }
}
