<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AccountSafety extends Model
{
    protected $table = "b_server_as";

    protected $guarded = ['submit'];

    public $timestamps = false;  //关闭 updated_at 和 created_at
}
