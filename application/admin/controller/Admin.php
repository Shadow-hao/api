<?php


namespace app\admin\controller;
use app\admin\validate\User;
use app\admin\model\Admin as adminModel;
use think\Controller;

class Admin extends Controller
{
    //判断是否登录
    private function isLogin(){
        if (session('admin')){
            $this->error('你已经登录请勿重复登录','/admin/index/index');
        }
    }
    public function login()
    {
        $this->isLogin();
        $this->assign('title','登录');
        return $this->fetch();
        
    }
    //登录操作
    public function login_in()
    {
        (new User())->goCheck();
        $admin = adminModel::getUserByUserName();
        if ($admin){
            return json(msg(1,'登录成功'));
        }
        return 123;
    }
    //退出登录
    public function logout()
    {
        adminModel::logout();
    }
    //管理员列表
    public function admin_list(){
        $data = model('Admin')->admin_list();
        $role = model('Role')->byIdRoelList();
        $this->assign('admin',$data);
        $this->assign('role',$role);
        return $this->fetch();
    }
    public function admin_add()
    {
        if ($this->request->isAjax()){
            model('Admin')->admin_add();
        }
        $role = model('Role')->role_list();
        $this->assign('role',$role);
        //dump($role);
        return $this->fetch();

    }
    public function del(){
        model('Admin')->admin_del();
    }
    public function edit()
    {
        if ($this->request->isAjax()){
            model('admin')->admin_up();

        }

        $role = model('Admin')->role_list();
        $this->assign('role',$role);
        // dump($role);
        $this->assign('admin',(model('Admin')->admin_one($this->request->get('id/d'))));
        return $this->fetch();
    }
}