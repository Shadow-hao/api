<?php


namespace app\admin\model;


use app\lib\exception\ParamException;
use think\Db;
use think\Request;

class Goods extends BaseModel
{

        public function imgs()
        {
            return $this->belongsTo('Img','img','id')->field('img,id');
        }
        public function cates()
        {
            return $this->belongsTo('Category','c_id','id')->field('name,id');
        }

        public function add(){

            $data = Request::instance()->except('file');
            //获取上传的图片ID
           $img_id = Db::table('img')->insertGetId(['img'=>$data['img']]);
           if ($img_id){
               $data['img']=$img_id;
               $res = (self::create($data));
                   if ($res){
                       throw new ParamException([
                           'code' => 201,
                           'msg' => '商品添加成功',
                           'errorCode' => 0
                       ]);
                   }
               }

            throw new ParamException([
                'code' => 401,
                'msg' => '角色添加失败',
                'errorCode' => 1
            ]);
        }
        // 获取商品列表
        public function goodsList()
        {
            return self::with(['imgs','cates'])->order('order','asc')->order('id desc')->select();
        }
}