<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RoleBaseCommon extends Model
{
  //
  public $timestamps = false;
  protected $table = 'role_base_common';

  public function save_role_common($roleId, $name, Request $request)
  {
    $this->role_id = $roleId;
    $this->name = $name;
    $this->gold = 1000;
    //判断是否传了头像地址和玩家性别
    if ($request->has('img_url')) {
      $user_image = $request->input('img_url');  //玩家头像}
      $this->user_image = $user_image;
    } else {
      $random_img = self::genarate_portrait();
      $this->user_image = $random_img;
    }
    if ($request->has('sex')) {
      $sex = $request->input('sex');
      $this->sex = $sex;
    }
    return $this->save();
  }

  /**
   * 获取角色名字
   */
  public function getRoleData($role_id)
  {
    return $this->where('role_id', $role_id)->get()->first();
  }

  /**
   * 生成随机头像
   */
  public function genarate_portrait()
  {
    //生成100000 到100000 + 757之间的随机数
    $random_num = 100000 + rand(0, 757);
    $random_str = "/img/head_img1/" . $random_num . ".jpg";
    return $random_str;
  }
}
