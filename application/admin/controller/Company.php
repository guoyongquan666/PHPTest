<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/15
 * Time: 下午7:27
 */

namespace app\admin\controller;

class Company extends Base
{
    public function lists()
    {

        $list = \think\Db::table('company')->paginate(2);

        $this->assign('list',$list);

        return $this->fetch();
    }

    public function del()
    {
        $company_id = $this->request->param('id');
        if (empty($company_id)){
            $this->error('非法操作');
        }

        if (\think\Db::table('company')->where('id',$company_id)->delete()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }

    public function mod()
    {
        if ($this->request->isPost()){

            $data = $this->request->only(['name','phone','introduce','sex_ratio','scale','sort','address']);
            $id = $this->request->param('id');
            //todo 验证数据

            if (\think\Db::table('company')->where('id',$id)->update($data)){
                $this->success('修改成功',url('admin/company/lists'));
            }else{
                $this->error('修改失败');
            }
        }

        if ($this->request->isGet()){

            $company_id = $this->request->param('id');
            if (empty($company_id)){
                $this->error('非法操作');
            }

            $info = \think\Db::table('company')->where('id',$company_id)->find();
            if (empty($info)){
                $this->error('非法操作');
            }

            $this->assign('info',$info);

            return $this->fetch();
        }
    }

}