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
                'msg' => '商品添加失败',
                'errorCode' => 1
            ]);
        }
        // 获取商品列表
        public function goodsList()
        {
            return self::with(['imgs','cates'])->order('order','asc')->order('id desc')->select();
        }
        //获取一条商品信息
        public function getGoodsOne($id)
        {
            return self::with(['imgs','cates'])->where('id',$id)->find();

        }
        //编辑商品
        public function edit()
        {
            $data = (request()->except(['file']));
            if (! is_numeric($data['img'])){
                //删除原图
                $path = Db::table('img')->field('img')->find(['id'=>$data['img_id']]);
                delImg($path['img']);
                //获取上传的图片ID
                $img_id = Db::table('img')->insertGetId(['img'=>$data['img']]);
                $data['img'] = $img_id;
            }
            unset($data['img_id']);
            if (self::update($data)){
                throw new ParamException([
                    'code'=>'200',
                    'msg'=>'商品更新成功',
                    'errorCode'=>0,
                ]);
            }
            throw new ParamException([
                'code'=>'400',
                'msg'=>'商品更新失败',
                'errorCode'=>1,
            ]);


        }
        //删除商品
        public function del(){
            $id = input('post.id');
            $data = self::with('imgs')->field('id,img')->find($id);
            if ($res = self::destroy($id)){
                if (Db::table('img')->delete($data['imgs']['id'])){
                    delImg($data['imgs']['img']);
                }
                throw new ParamException([
                    'code'=>'200',
                    'msg'=>'商品删除成功',
                    'errorCode'=>0,
                ]);
            }
            throw new ParamException([
                'code'=>'400',
                'msg'=>'商品删除失败',
                'errorCode'=>1,
            ]);

        }
}