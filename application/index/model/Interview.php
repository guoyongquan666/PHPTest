<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/13
 * Time: 下午7:15
*/

namespace app\index\model;

use think\Model;

class Interview extends  Model
{
    public function author()
    {
        return $this->belongsTo('User','uid');
    }

}