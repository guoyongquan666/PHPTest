<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/15
 * Time: 下午7:18
 */


namespace app\admin\controller;

use think\App;
use think\Controller;

class Base extends Controller
{
    public function __construct(App $app = null)
    {
        parent::__construct($app);

        if (!session('adminUserInfo')){
            $this->error('您需要登录');
        }
    }

    public function logout()
    {
        session('adminUserInfo',null);
        $this->redirect('admin/Sign/login');
    }

}