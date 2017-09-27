<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "b_news";

    protected $guarded = ['submit'];

    public $timestamps = false;  //关闭 updated_at 和 created_at
}
