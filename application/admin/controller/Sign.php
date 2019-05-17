<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/15
 * Time: 上午9:01
 */

namespace app\admin\controller;

use think\Controller;

class Sign extends Controller
{
    /**
     * 登录
     */
    public function login()
    {

        $request = $this->request;

        if ($request->isGet()){
            return $this->fetch();
        }

        if ($request->isPost()){
            $data = $request->only(['mobile','password']);
            /**
             * 验证数据
             */

           $rule = [
               'mobile' => 'require|mobile',
               'password' => 'require|length:6,12'
           ];
            $msg = [
                'mobile.require' => '手机号为必填',
                'mobile.mobile' => '手机号格式不正确',
                'password.require' => '密码为必填',
                'password.length' => '密码长度应在6-12位'
            ];
            $chack = $this->validate($data,$rule,$msg);
            if ($chack !== true){
                $this->error($chack);
            }

            if ($admin = \think\Db::table('admin')->where('mobile',$data['mobile'])->find()){

                if (password_verify($data['password'],$admin['password'])){

                    //登录成功
                    session('adminUserInfo',$admin);
                    $this->redirect('admin/Index/index');
                }else{
                    $this->error('您输入的账号或密码有误');
                }
            }else{
                $this->error('您输入的账号或密码有误');
            }
        }


















    }


}