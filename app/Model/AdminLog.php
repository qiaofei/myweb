<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminLog extends Model
{
    protected $table = "cd_admin_log";

    protected $guarded = ['submit'];

    public $timestamps = false;  //关闭 updated_at 和 created_at
}
