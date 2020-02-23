<?php


namespace app\api\controller\v1;
use app\api\model\Category as categoryModel;

class Category
{
    public function getCategory(){
        $category = categoryModel::getCategory();
        if (!$category ) {
            throw new ParamException([
                'msg' => '请求分类失败',
                'code'=>'401',
                'errorCode' => 40000
            ]);
        }
        return $category;
    }
}