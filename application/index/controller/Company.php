<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/16
 * Time: 上午8:39
 */

namespace app\index\controller;

use think\Controller;

class Company extends Controller
{

    public function add_leader()
    {

        if ($this->request->isPost()){

            $data = $this->request->only(['name', 'sex', 'company_id']);
            //todo 数据验证

            //入库
            if (\think\Db::table('leader')->data($data)->insert()){
                $this->success('添加成功');
            }else{
                $this->error('添加失败');
            }


        }

    }

    public function add_job()
    {
        if ($this->request->isPost()){

            $data = $this->request->only(['name', 'company_id']);
            //todo 数据验证

            //入库
            if (\think\Db::table('job')->data($data)->insert()){
                $this->success('添加成功');
            }else{
                $this->error('添加失败');
            }


        }
    }


    public function yelp()
    {

        $user = userInfo();
        if (empty($user)){
            $this->error('您需要登录才能操作');
        }

        if ($this->request->isPost()){

            $data = $this->request->only(['score', 'salary', 'job_id']);

            //todo 数据验证

            $data['uid'] = $user->id;
            $data['create_time'] = time();

            //一个用户一个月之内只能点评一次
            $last = \think\Db::table('job_yelp')->order('create_time DESC')->where('uid', $user->id)->where('job_id', $data['job_id'])->value('create_time');

//            30 * 24 * 3600
//            if ($last  > time() - 2592000){
//                $this->error('30天之内只能点评一次');
//            }


            //入库
            if (\think\Db::table('job_yelp')->insert($data)){

                $this->success('成功');
            }else{
                $this->error('失败');
            }



        }

        if ($this->request->isGet()){
            $id = $this->request->param('id');
            //todo 数据的验证

            $info = \think\Db::table('job')->where('id', $id)->find();
            $this->assign('info', $info);


            //统计薪资水平
            $m = \think\Db::table('job_yelp');

//            $x1 = $m->where('salary', '<=', '3000')->count();
//
//
//            $x2 = $m->where('salary', '>', '3000')
//                ->where('salary', '<=', '5000')
//                ->count();
//
//            print_r($m->getLastSql());
//
//            $x3 = $m->where('salary', '>', '5000')
//                ->where('salary', '<=', '8000')
//                ->count();
//
//            $x4 = $m->where('salary', '>', '8000')
//                ->where('salary', '<=', '12000')
//                ->count();
//
//            $x5 = $m->where('salary', '>', '12000')->count();


            $data = $m->where('job_id', $id)->select();
            $x1 = $x2 = $x3 = $x4 = $x5 = 0;
            foreach ($data as $v) {

                switch ($v){

                    case $v['salary'] <= 3000 :
                        $x1++;
                        break;
                    case $v['salary'] > 3000 && $v['salary'] <=5000:
                        $x2++;
                        break;
                    case $v['salary'] > 5000 && $v['salary'] <=8000:
                        $x3++;
                        break;
                    case $v['salary'] > 8000 && $v['salary'] <=12000:
                        $x4++;
                        break;
                    case $v['salary'] > 12000:
                        $x5++;
                        break;
                }
            }

            $salary = [
                ["value"=>$x1, "name"=>"3K以内"],
                ["value"=>$x2, "name"=>"3K-5K"],
                ["value"=>$x3, "name"=>"5K-8K"],
                ["value"=>$x4, "name"=>"8K-12K"],
                ["value"=>$x5, "name"=>"12K以上"],

            ];


//            print_r(json_encode($salary));

            $this->assign('salary', json_encode($salary));



            return $this->fetch();
        }
    }


}