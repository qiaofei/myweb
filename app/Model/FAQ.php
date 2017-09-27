<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $table = "b_server_faq";

    protected $guarded = ['submit'];

    public $timestamps = false;  //关闭 updated_at 和 created_at
}
