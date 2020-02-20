<?php


namespace app\admin\controller;

class Role extends BaseController
{
    public function index()
    {

       $data = model('Role')->role_list();
       $this->assign('role',$data);
       return $this->fetch();
    }
    public function role_add(){
        $role = model('Menu')->get_menu1();
        $this->assign('role',$role) ;
        return $this->fetch();
    }
    public function role_save(){
       model('Role')->role_save();
    }

    public function del()
    {
        model('Role')->role_del();
    }
    public function role_edit(){
        if ($this->request->isAjax()){

             model('Role')->role_up();
        }
        $id = input('get.id/d');
        $role = model('Role')->role_edit($id);

        $this->assign('role',$role);
        return $this->fetch();

    }
}