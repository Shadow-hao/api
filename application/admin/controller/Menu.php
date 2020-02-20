<?php


namespace app\admin\controller;


class Menu extends BaseController
{
    public function index()
    {
        $menu = model('Menu')->menu_list();
        $this->assign('menu',$menu);
        return $this->fetch();

    }
    //一级菜单添加
    public function add_menu(){
        if ($this->request->isAjax()){

            model('Menu')->add_menu();
        }
        return $this->fetch();
    }
    //二级菜单添加
    public function addc_menu(){
        if ($this->request->isAjax()){

            model('Menu')->add_menu();
        }
        return $this->fetch();
    }
    public function del_menu(){
        if ($this->request->isAjax()){

            model('Menu')->del_menu();
        }

    }
    //编辑菜单
    public function edit_menu(){
        if ($this->request->isGet()){
            $data = model('Menu')->edit_menu();
            $this->assign('data',$data);
            return $this->fetch();
        }
        return model('Menu')->up_menu();

    }

}