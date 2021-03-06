<?php


namespace app\admin\controller;


use think\Controller;

class BaseController extends Controller
{
    protected function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $this->isLogin();
        $this->pass();

    }
    //判断是否登录
    private function isLogin(){
        if ( !session('admin')){
            $this->error('请登录后访问','admin/admin/login');
        }
    }
    //获取当前路由
    public function getRoute()
    {
        $model = $this->request->module();
        $action = $this->request->action();
        $controller = $this->request->controller();
        $route = '/'.$model.'/'.$controller.'/'.$action;
        return array(strtolower($route));
    }
    //获取权限
    public function getRole()
    {
        $r_id = session('admin')['r_id'];
        $role = model('Role')->field('right')->where('id',$r_id)->find()->toArray();
        $where = json_decode($role['right'],true);
        $path = model('Menu')->getPath($where);
       // return $path;
        return array_filter(array_column($path, 'url'));
    }
    //判断是否有权限
    public function pass()
    {
        $s = $this->getRoute();
        $l = $this->getRole();
        //无需权限的路由
       $no= [
           '主页'=>'/admin/index/index',
           'home'=>'/admin/index/home'
       ];

       if (session('admin')['id'] == 1){
           return true;
       }else{
           if ( empty(array_diff($s,$no))){
               return true;
           }
           if (empty(array_diff($s,$l))){
               return true;
           }else{

               $this->error('你无此权限,抱歉!');
           }
       }





    }

}