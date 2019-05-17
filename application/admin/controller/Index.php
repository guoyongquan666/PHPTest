<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/15
 * Time: 下午7:18
 */

namespace app\admin\controller;

class Index extends  Base
{
    public function index()
    {

        return $this->fetch();
    }

    public function index1()
    {
        return '';
    }

}