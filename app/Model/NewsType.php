<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NewsType extends Model
{
    protected $table = "b_news_type";

    protected $guarded = ['submit'];

    public $timestamps = false;  //关闭 updated_at 和 created_at
}
