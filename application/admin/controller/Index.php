<?php


namespace app\admin\controller;


class Index extends BaseController
{
    public function index(){
        $menu = model('Menu')->get_menu();
        $this->assign('menu',$menu);
        return $this->fetch();
    }

    public function home()
    {
        return '123';
    }
}