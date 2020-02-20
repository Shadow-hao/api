<?php


namespace app\admin\controller;
use app\admin\validate\Category as cate;
use app\admin\model\Category as cateModel;
class Category extends BaseController
{
    public function index()
    {
        $category = (new cateModel())->get_cate();
        $this->assign('category',$category);
        return $this->fetch();
    }
    public function cate_add(){
        if (request()->isAjax()){
            (new cate())->goCheck();
            (new cateModel())->add_cate();
        }

        return $this->fetch();
    }
    public function edit(){
        if (request()->isAjax()){
            (new cateModel())->edit();
        }
        $category = (new cateModel())->get_one();
        $category['img'] = $category->getData('img');
        $this->assign('category',$category);
        return $this->fetch();
    }
    public function del(){
        (new cateModel())->del_cate();
    }
    public function upload(){
        $file = request()->file('file');
        if ($file == null){
            return json(['code'=>1,'msg'=>'没有文件上传']);
        }
        $info = $file->move(ROOT_PATH.'public'.DS.'uploads');
        $ext = ($info->getExtension());
        if (!in_array($ext,array('jpg','png','gif','jpeg'))){
            return json(['code'=>1,'msg'=>'文件格式不正确']);
        }
        $img= '/uploads/'.$info->getSaveName();
        return json(['code'=>0,'img'=>$img]);
    }
}