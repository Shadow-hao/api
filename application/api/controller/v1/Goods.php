<?php


namespace app\api\controller\v1;

use app\api\model\Goods as goodsModel;
use app\api\validate\IDMustBePositiveInt;

class Goods
{
    public function getHotGoods()
    {
        $goods = goodsModel::getHotGoods();
        if (!$goods ) {
            throw new ParamException([
                'msg' => '请求分类失败',
                'code'=>'401',
                'errorCode' => 40000
            ]);
        }
        return $goods;
    }
}