<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SomeDeclare extends Model
{
    protected $table = "b_some_declare";

    protected $guarded = ['submit'];

    public $timestamps = false;  //关闭 updated_at 和 created_at
}
