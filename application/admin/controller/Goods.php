<?php


namespace app\admin\controller;


use think\Db;
use app\admin\model\Goods as goodsModel;

class Goods extends BaseController
{
    public function index(){
        $model = new  goodsModel();
        $this->assign('goodsList',$model->goodsList());
       return $this->fetch();
    }
    public function goods_add(){
        if (request()->isAjax()){
          $model = new  goodsModel();
          $model ->add();

        }
        $cate = Db::table('category')->field('id,name')->select();
        $this->assign('cate',$cate);
        return $this->fetch();
    }

    public function goods_del()
    {
        (new  goodsModel())->del();

    }

}