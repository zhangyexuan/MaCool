<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
 	protected $table = "config";//要连接的表名称
    public $timestamps = false;//将时间戳设置为false，否则数据表没有对应字段（create_at等字段）就会报错
}
