<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CDKey extends Model
{
    protected $table = "cd_key";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['serial', 'shop_id', 'start_time', 'expire_time', 'use_state'];

    public $timestamps = false;  //关闭 updated_at 和 created_at

    /**
     * 循环出不同薛烈号需要产生的行数
     * @return array
     * @param $row
     */
    public static function createKey($row){
        $serial = [];
        for ($i=1;$i<=$row;$i++){
            $serial_result = self::produceKey();
            $id  = self::where('serial', '=',$serial_result)->selectRaw('id')->first();    //目前如果检查有过改序列号，则再执行一次。建议使用过的序列号应及时清理
            $serial[$i] = empty($id)?$serial_result:self::produceKey();
        }
        return $serial;
    }

    /**
     * 生产序列号
     * 结果执行 isExist
     */
    public static function produceKey(){
        $num = "";
        for ($i=1;$i<=16;$i++){
            $place = rand(0,1);   //随机类型位置
            $num .= empty($place)?chr(rand(65,90)):rand(0,9);
        }
        return $num;
    }

}
