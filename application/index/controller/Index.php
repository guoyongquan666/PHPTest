<?php
namespace app\index\controller;

use app\index\model\Interview;
use think\Controller;
use think\Session;
use think\facade\Request;


class  Index extends Controller

{
    public function index()
    {
        return $this->fetch();

    }


    /**
     * @return mixed
     * @throws \think\exception\DbException
     *
     * 查询企业信息
     * 添加企业信息
     */

    public function search()
    {


        /**
         * 接受表单传来的搜索关键词
         * @keyword 关键词
         */
        $keyword =$this->request->param('wd');

        /**
         * 如果用户没有输入关键词，则让用户跳转到搜索输入页
         *
         * @empty  检查一个变量是否为空
         */
        if (empty($keyword)){
            $this->redirect('index/Index/index');
        }

        /**
         * 同级符合搜索条件的总数
         */
        $num = \think\Db::table('company')
            ->where('name','like','%'.$keyword.'%')
            ->count();

        /**
         * 采用内置的分页模式，查询出符合搜索条件的列表
         *
         *在Db类查询的时候用paginate方法
         */
        $list = \think\Db::table('company')
            ->where('name','like','%'.$keyword.'%')
            ->paginate(1,false,['query'=>['wd'=>$keyword]]);
            //print_r($list);
        /**
         *通过foreach遍历让关键词变红
         *
         * @toArray      转成数组类型
         * @str_replace  子字符串替换
         */
        $newList = $list->toArray()['data'];
        foreach ($newList as $k=>$v){
            $newList[$k]['name'] = str_replace($keyword,
                ('<span class="text-danger">'.$keyword.'</span>'),$v['name']);
        }

        /**
         * 控制器继承了系统的控制器基类的情况下
         * @assign 模板变量赋值
         */
        $this->assign('keyword',$keyword);
        $this->assign('list',$list);
        $this->assign('newList',$newList);
        $this->assign('num',$num);
        return $this->fetch();


    }

    /**
     * @return mixed
     *
     * 添加一个企业
     */
    public function add()
    {
        /**
         * 判断是否登录
         * 如果没有登录，不能访问添加界面
         * 请登录
         */
//        if (!\think\facade\Session::has('userLoginInfo')){
//            $this->error('登陆后可添加'.'<span>￣□￣｜｜</span>',url('index/sign/in'));
//
//        }

        $user0bject = userInfo();
        if (!$user0bject){
            $this->error('登录后可添加',url('index/Sign/in'));
        }

        $request = $this->request;

        /**
         * 当前用户使用Get方式请求时
         */
        if ($request->isGet()){
            return $this->fetch();
        }
        /**
         * 当前用户使用post方式请求时
         */
        if ($request->isPost()){

            $rule = [
                'name'    => 'require|length:2,20',
                'phone'   => 'length:11,13',
                'address' => 'max:50',
                'scale'   => 'require|in:0,1,2,3,4,5',
                'sex_ratio' => 'require|in:0,1,2',
                'sort'    => 'require|in:0,1,2,3,4',
                'introduce' => 'max:65535'
            ];
            $msg = [
                'name.require'   =>  '请输入企业名称',
                'name,length'    =>  '企业名称长度应在2-20位之间',
                'phone.length'   =>  '联系电话长度有误',
                'address.max'    =>  '企业地址长度过长',
                'scale.require'  =>  '员工规模输入有误',
                'scale.in'       =>  '员工规模输入有误',
                'sex_ration.require' => '男女比例填写有误',
                'sex_ration.in'  =>  '男女比例填写有误',
                'sort.require'   =>  '企业类型选择有误',
                'sort.in'        =>  '企业类型选择有误',
                'introduce.max'  =>  '企业介绍过长'
            ];

            /**
             * @param 获取当前请求的变量
             */
            $data = $request->param();

            /**
             * @validate  验证数据规则
             */
            $check = $this->validate($data,$rule,$msg);
            if ($check == true){

                $user0bject = session('userLoginInfo');
                $data['uid'] = $user0bject->id;

                /**
                 * data方法用于设置响应数据
                 */
                if (\think\Db::table('company')->data($data)->insert()){
                    $this->success('添加成功');
                }else{
                    $this->error('添加失败');
                }
            }else{
                $this->error($check);
            }
        }
    }


    /**
     *  企业详情
     *
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function show()
    {

        $request = $this->request;


        /**
         * 企业的id
         */
        $id = $request->param('id');

        /**
         * 验证
         *
         * @empty  判断数据是否为空
         */
        if (empty($id)){
            $this->error('您要查看的企业信息不存在');
        }


        /**
         * 获取企业的基本信息
         */
        $info = \think\Db::table('company')->where('id','=',$id)->find();

        /**
         * 判断是否获取企业的基本信息
         */
        if (empty($info)){
            $this->error('您要查看的企业信息不存在');
        }
        $this->assign('info',$info);

        /**
         * 分页查询
         */
        $interview_list = Interview::with('author')->where('company_id',$id)->paginate(3);
        $user = userInfo();
        if ($user){

        }
        /**
         * 遍历本次查询出的每一个面试经历信息,是否被当前登录用户点赞过
         */
        foreach ($interview_list as $k=>$v){
            if ($user){
                $where = ['interview_id'=>$v->id,'uid'=>$user->id];
                if (\think\Db::table('interview_ding')->where($where)->find()){
                    $v->dingx = 1;
                    //对象类引用赋值
                    //$interview_list[$k] = $v;
                }else{
                    $v->dingx = 0;
                }
            }else{
                $v->dingx = 0;
            }


        }

        /**
         * 魔板变量赋值
         */
        $this->assign('interview_list',$interview_list);
        $this->assign('page',$interview_list);

        $tagList = \think\Db::query(sprintf('select * from tag where id in (select tag_id from company_tag where company_id=%d)',$id));
        $this->assign('tagList',$tagList);

        /**
         * 获取公司领导信息
         */
        $leaders = \think\Db::table('leader')->where('company_id',$id)->select();
        $this->assign('leaders',$leaders);

        /**
         * 获取公司职位信息
         */
        $job = \think\Db::table('job')->where('company_id',$id)->select();
        $this->assign('job',$job);


        return $this->fetch();
    }


    /**
     * 添加评论
     * 登录后才新型操作
     *
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function add_interview()
    {

        /**
         * 检验用户是否登录
         */
        $user = userInfo();
        if (empty($user)){
            $this->error('您需要登录后才能进行操作',url('index/Sign/in'));
        }

        /**
         * 评论的内容
         */
        $data['content'] = $this->request->param('content');
        /**
         * 企业的id
         */
        $data['company_id'] = $this->request->param('id');

        /**
         * 验证数据
         */
        $rule = [
            'content' => 'require|min:10|max:65535',
            'company_id' => 'require'
        ];
        $msg = [
            'content.require' => '面试经历详情为必填项',
            'content.min' => '面试经历至少10个字符',
            'content.max' => '面试经历最大只能有65535个字符',
            'content_id.require' => '企业信息不全'
        ];
        if ($this->validate($data,$rule,$msg) == true){

            /**
             * 验证企业是否存在
             */
            $company = \think\Db::table('company')->where('id',$data['company_id'])->find();
            if (empty($company)){
                $this->error('企业不存在');
            }

            /**
             * 记录发表者的信息
             */
            $data['uid'] = $user->id;
            /**
             * 记录添加时间
             */
            $data['create_time'] = date('Y-m-d H:i:s');

            /**
             * 数据入库
             */
            if (\think\Db::table('interview')->data($data)->insert()){
                $this->success('添加成功');
            }else{
                $this->error('添加失败');
            }
        }else{
            $this->error('添加失败');
        }
    }



    /**
     *
     * 点赞
     *
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function ding()
    {

        /**
         * 该用户必须登录
         * 当前登录用户的信息
         */
        $user = userInfo();
        if (empty($user)){
            $this->error('您需要登录才能操作');
        }


        /**
         * 面试经历的id
         */
        $id = $this->request->param('id');
        /**
         * 数据验证
         */
        if (empty($id)){
            $this->error('非法操作');
        }

        /**
         * 一条面试经历的信息
         */
        $info = \think\Db::table('interview')->where('id',$id)->find();
        /**
         * 验证
         */
        if (empty($info)){
            $this->error('非法操作');
        }

        /**
         * 验证是否给自己点赞
         */
        if ($info['uid'] == $user->id){
            $this->error('自己不要给自己点赞啦');
        }

        /**
         * 验证用户是否已经点赞过
         */
        if (\think\Db::table('interview_ding')->where(['interview_id'=>$id,'uid'=>$user->id])->find()){
//            $this->error('您已经点过赞啦');

            /**
             * 取消赞
             */
            if (\think\Db::table('interview')->where('id',$id)->setDec('ding')){
                \think\Db::table('interview_ding')->where(['interview_id'=>$id,'uid'=>$user->id])->delete();

                $this->success('取消成功',null,1);
            }else{
                $this->error('操作失败');
            }

        }else{
            /**
             * 点赞
             */
            if (\think\Db::table('interview')->where('id',$id)->setInc('ding')){
                \think\Db::table('interview_ding')->data(['interview_id'=>$id,'uid'=>$user->id])->insert();

                $this->success('点赞成功',null,0);
            }else{
                $this->error('操作失败');
            }
        }
    }



    /**
     * 为一个企业添加标签
     *
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function add_tag()
    {
        $request = $this->request;
        $company_id = $request->param('id');
        $tagName = $request->param('tagName');


        /**
         *数据验证
         */
        if (empty($company_id)){
            $this->error('非法操作');
        }

        /**
         * 验证标签长度
         */
        if (mb_strlen($tagName,'utf-8') > 10 || mb_strlen($tagName,'utf-8') < 2){
            $this->error('标签的名称长度应该在2-10位之间');
        }

        /**
         * 一个企业最多打10个标签
         */
        if (\think\Db::table('company_tag')->where('company_id',$company_id)->count() >= 10){
            $this->error('最多只能为企业创建10个标签');
        }

        /**
         * 去tag表中查询该标签是否存在
         */
        $m = \think\Db::table('tag');
        $tagInfo = $m->where('name',$tagName)->find();
        /**
         * 验证库中是否已有该标签
         */
        if ($tagInfo){
            $tagId = $tagInfo['id'];
        }else{
            /**
             * 如果该标签未存在我们的标签表中，那么添加它
             */
            if ($m->data(['name'=>$tagName])->insert()){
                $tagId = $m->getLastInsID();
            }
        }

        /**
         * 记录关系
         */
        $data['company_id'] = $company_id;
        $data['tag_id'] = $tagId;

        /**
         * 检验以下是否已为该企业打过标签
         */
        if (\think\Db::table('company_tag')->where($data)->find()){
            $this->error('该标签已被添加过');
        }

        /**
         * 数据入库
         */
        if (\think\Db::table('company_tag')->insert($data)){
            $this->success('添加成功');
        }else{
            $this->error('添加失败');
        }
    }


}