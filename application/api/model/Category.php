<?php


namespace app\api\model;


class Category extends BaseModel
{
    public function images()
    {
        return $this->belongsTo('Img', 'img', 'id');
    }

    public static function getCategory()
    {
        $category = self::with(['images'])
            ->order('order','asc')->order('create_time desc')
            ->where('status','0')
            ->field('id,name,img')
            ->select();
        return $category;
    }
}