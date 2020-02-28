<?php


namespace app\api\model;


use think\Db;
use think\Model;

class Goods extends Model

{
    protected $hidden = ['img','create_time','update_time','items'];
    public function images()
    {
        return $this->belongsTo('Img', 'img', 'id');
    }
    public function counts()
    {
        return $this->belongsTo('Count', 'id', 'goods_id');
    }

    public static function  getHotGoods ()
    {

        $goods = self::with(['images'])->order('order','asc')
            ->where('is_hot','0') ->field('id,name,img,price,status')
            ->limit(6)->select();
        return $goods;
    }
    public static function getOne($id){
        $goods = self::with(['counts','images'])->find($id);
        $liulan = Db::table('count')->where('goods_id',$goods['id'])->find();
        if (!$liulan){
            Db::table('count')->insert(['goods_id'=>$goods['id']]);
        }
        Db::table('count')->where('goods_id',$goods['id'])->setInc('liulan');
        return $goods;
    }
}