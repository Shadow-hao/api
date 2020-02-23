<?php


namespace app\admin\model;


use app\lib\exception\ParamException;
use think\Db;

class Category extends BaseModel
{
//    public function getImgAttr($value)
//    {
//        $value = request()->domain().$value;
//        return $value;
//    }
    public function imgs()
    {
        return $this->belongsTo('Img','img','id')->field('img,id');
    }

    //获取分类
    public function get_cate(){
        return self::with('imgs')->order('order','asc')->order('create_time asc')->select();
    }
    //获取单个分类
    public function get_one(){
        return self::with('imgs')->find(input('get.id'));

    }
    //添加分类
    public function add_cate(){
        $data = request()->except(['img']);
        //图片添加到img表获取图painID
        $data['img']  = Db::table('img')->insertGetId(['img'=>input('post.img')]);
        $res = self::data($data)->allowField(true)->save();

        if ($res){
            throw new ParamException([
                'code'=>'200',
                'msg'=>'分类添加成功',
                'errorCode'=>0,
            ]);
        }
        throw new ParamException([
            'code'=>'401',
            'msg'=>'分类添加失败',
            'errorCode'=>1,
        ]);
    }
    //编辑分类
    public function edit(){
        $c = input('post.');
        $cate = self::with('imgs')->find($c['id'])->toArray();
        $img = $cate['imgs'];
//        print_r($c);
//        print_r($img);
//        exit();
        //如果图片更改删除图片和数据库原有记录
        if ($c['img'] !==$img['img'] ){
            $imgs = $_SERVER["DOCUMENT_ROOT"].($img['img']);
           if (file_exists($imgs)){
               unlink($imgs);

           }
        }
        $c['img']= $img['id'];
        if (self::update($c)){
           Db::table('img')->where('id',$img['id'])->update(['img'=>input('post.img')]);
               throw new ParamException([
                   'code'=>'200',
                   'msg'=>'分类编辑成功',
                   'errorCode'=>0,
               ]);
           }
        throw new ParamException([
            'code'=>'401',
            'msg'=>'分类编辑失败',
            'errorCode'=>1,
        ]);
    }
    //删除分类
    public function del_cate(){
        $id = input('post.id');
        $data = self::with('imgs')->field('id,img')->find($id);
//        dump($data['imgs']['id']);
//        exit();
        $img = $_SERVER["DOCUMENT_ROOT"].$data['imgs']['img'];
        if(($res = self::destroy($id))){

           if (Db::table('img')->delete($data['imgs']['id'])) {
               if (file_exists($img)){
                   unlink($img);
               }
               throw new ParamException([
                   'code'=>'200',
                   'msg'=>'分类删除成功',
                   'errorCode'=>0,
               ]);
           }


        }
        throw new ParamException([
            'code'=>'401',
            'msg'=>'分类删除失败',
            'errorCode'=>1,
        ]);

    }

}