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
    //商品编辑
    public function edit()
    {
        $model = new  goodsModel();
        $goods =  $model->getGoodsOne(input('get.id'));
        if (request()->isAjax()){
            $model->edit();
        }else{
            $cate = Db::table('category')->field('id,name')->select();
            $this->assign('cate',$cate);
            $this->assign('goods',$goods);
            return $this->fetch();
        }


    }
    //商品删除
    public function goods_del()
    {
        (new  goodsModel())->del();

    }
    // 商品详情图
    public function detail(){
        $id = input('get.id');
        $this->assign('id',$id);
        if (request()->isAjax()){
            $img = input('post.');
            $data =[];
            foreach ($img['data'] as $k => $v){
                array_push($data,['order'=>$k,'img'=>$v]);
            }
            print_r($data);
            print_r($img['id']);
        }

        return $this->fetch();
    }
    // 删除详情图
    public function delDetail(){
       $url =  input('post.url');
       $path = $_SERVER["DOCUMENT_ROOT"].$url;
        if (file_exists($path)){
           if(unlink($path)){
               return ['code'=>1];
           }

        }else{
            return ['code'=>1];
        }

    }

}