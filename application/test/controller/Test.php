<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/17
 * Time: 上午11:45
 */
namespace app\test\controller;

use think\captcha\Captcha;
use think\Controller;
use think\Route;
use think\Session;

class Test extends Controller
{

    public function yzm()
    {

        $config = [
            'useNoise' => true,
            'useCurve' => true,
            'imageH' => 0,
            'imageW' => 0,
            'reset' => true
        ];

        $y = new Captcha($config);
        return $y->entry();

    }

    public function yzm2()
    {
        if ($this->request->isGet()){
            return view();
        }

        if ($this->request->isPost()){

            $m = new Captcha();

            var_dump($m->check($this->request->param('xxx')));

            $file = $this->request->file('yyy');
            $res = $file->move('./upload/');
            print_r($res);
        }

    }

    public function test1()
    {
        $t1 = microtime(true);

        $res = cache('xxx');

        for ($i = 0; $i < 1; $i++){

            $res = cache('xxx');

            if (!$res){
                $res = \think\Db::table('user')->find();
                cache('xxx',$res);
            }
        }
        for ($i = 0; $i < 1; $i++){
            $res = \think\Db::table('user')->find();
        }
        print_r($res);

//        session('xxx',1111);
//        session('yyy',11111);
        //不传参，获取所有
//        print_r(Session::get('xxx'));
//        session('xxx');

        $t2 = microtime(true);
        echo $t2 - $t1;

    }

    public function test2()
    {
        if ($this->request->isPost()){

            $rule = [
                'xxx' => 'require|max:2|token'
            ];

            if ($this->validate($this->request->param(),$rule) !== true){
                echo '非法操作';
            }else{
                echo '；；；；';
            }
        }

        if ($this->request->isGet()){


            return $this->fetch();
        }
    }


    public function test3()
    {


        print_r($this->request->param());
    }

}