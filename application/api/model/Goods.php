<?php


namespace app\api\model;


use think\Model;

class Goods extends Model

{
    protected $hidden = ['img'];
    public function images()
    {
        return $this->belongsTo('Img', 'img', 'id');
    }

    public static function  getHotGoods ()
    {

        $goods = self::with(['images'])->order('order','asc')
            ->where('is_hot','0') ->field('id,name,img,price')
            ->limit(6)->select();
        return $goods;
    }
}