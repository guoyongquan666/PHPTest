<?php

namespace app\index\controller;

use think\Controller;
use think\Request;


class Sign extends Controller
{

    /**
     * 登录处理
     */
    public function in()
    {


        /**
         * 可以通过request对象完成全局输入变量的检测
         */
        $request = $this->request;

        /**
         * 当前用户使用post方式请求时
         */
        if ($request->isPost()){
            /**
             * 接手前端传来的数据
             * @param 获取当前请求的变量
             */
            $account = $request->param('account');
            $password = $request->param('password');

            /**
             * 获取一个User对象
             */
            $m = new  \app\index\model\User();

            /**
             * 如果用户输入的是个手机号格式的账号
             */
            if (preg_match('/^1[3-9]\d{9}$/',$account,$match)){
                /**
                 * @mobile  手机号登录  以手机号查询
                 */
                $res = $m->where('mobile',$account)->find();
            }else{
                /**
                 * 其他情况都以邮箱登录处理
                 */
                $res =  $m->where('email',$account)->find();
            }


            /**
             * 前端不可信  需要数据验正
             */
            if ($res){

                /**
                 * 查到用户信息后，验证密码
                 * @passowrd_verify  解密哈希值
                 */
                if (password_verify($password,$res->password)){

                    /**
                     * 登录成功，将用户信息写入到session中
                     * @userLoginInfo  用户信息
                     */
                    session('userLoginInfo',$res);
                    $this->success('登录成功',url('index/Index/index'));

                }else{
                    $this->error('您输入的用户名或密码有误');
                }
            }else{
                $this->error('您输入的用户名或密码有误');
            }
        }

        if ($request->isGet()){
            return $this->fetch();
        }

    }

    /**
     * 注册处理
     */
    public function up()
    {
        $request = $this->request;

        /**
         * 当前用户使用Get方式请求时
         */
        if ($request->isGet()){
            return $this->fetch();
        }

        /**
         * 当前用户使用post方式请求时
         * 数据验证
         *
         * @rule     验证
         * @msg      错误提示
         */
        if ($request->isPost()){
            $rule = [
                'agree'    => 'require',
                'mobile'   => 'require|mobile|unique:user',
                'password' => 'require|confirm:repass|length:6,12'
            ];
            $msg = [
                'agree.require'   => '您需要同意注册协议',
                'mobile.require'  => '手机号为必填项',
                'mobile.mobile'   => '请输入正确的手机号',
                'mobile.unique'   => '该手机号已注册',
                'password.require'=> '密码为必填项',
                'password.confirm'=> '两次密码不一致',
                'password.length' => '密码长度应在6-12位之间'
            ];
            /**
             * @validate 验证器名或者验证规则数组
             */
            $info = $this->validate($request->param(),$rule,$msg);
            if ($info !== true){
                $this->error($info);
            }

            /**
             * 判断手机号是否已被注册
             */
            if (\think\Db::table('user')->where('mobile',$request->param('mobile'))->find()){
                $this->error('该手机号已注册');
            }

            /**
             * 使用模型进行数据的插入
             *
             * @mobile   插入手机号
             * @password 插入密码 哈希值加密
             * @nickname 自动生成昵称
             *
             * @save 插入数据
             */
            $m = new \app\index\model\User();
            $m->mobile = $request->param('mobile');
            $m->password = password_hash($request->param('password'),PASSWORD_DEFAULT);
            $m->nickname = '新用户_'.random_int(10000,999999);
            if ($m->save()){
                $this->success('注册成功',url('index/Sign/in'));
            }else{
                $this->error('注册失败');
            }
        }
    }



    /**
     * 退出登录
     * @redirect 跳转url
     */
    public function logout()
    {
        /**
         * 清除session 内 userLoginInfo 的数据
         * @redirect 跳转到 in.php
         */

        session('userLoginInfo', null);

        /**
         * 调转命令
         */
        $this->redirect(url('index/Sign/in'));

    }

}























