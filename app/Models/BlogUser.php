<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogUser extends Model
{
    use HasFactory;

    //关联数据表
    protected $table = 'user';

    //设置主键
    protected $primaryKey = 'id';

    //可批量操作的字段
    protected $fillable = [
        'username',
        'password'
    ];

    //是否禁用时间戳
    public $timestamps = true;


}
