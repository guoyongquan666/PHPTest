<?php

namespace app\index\model;

use think\Model;

class User extends Model
{
    //面试经历的关联关系
    public  function inter(){
        return $this->hasMany('Interview','uid');
    }
}
