<?php


namespace app\api\controller\v1;

use app\api\model\Goods as goodsModel;
use app\api\validate\IDCollection;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\ParamException;

class Goods
{
    public function getHotGoods()
    {
        $goods = goodsModel::getHotGoods();
        if (!$goods ) {
            throw new ParamException([
                'msg' => '请求商品失败',
                'code'=>'401',
                'errorCode' => 40000
            ]);
        }
        return $goods;
    }

    public function getOneGoods($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $goods = goodsModel::getOne($id);
        if (!$goods ) {
            throw new ParamException([
                'msg' => '请求商品失败',
                'code'=>'401',
                'errorCode' => 40000
            ]);
        }
        return $goods;
    }
    public function carList($ids=''){
        (new IDCollection())->goCheck();
        $ids = explode(',',$ids);
        $res = goodsModel::with('images')
            ->select($ids);
        if ($res->isEmpty()){
           throw new ParamException([
               'msg' => '购物车列表获取失败',
               'code'=>'401',
               'errorCode' => 40000
            ]);
        }
        return $res;
    }
}