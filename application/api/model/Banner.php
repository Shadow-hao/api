<?php


namespace app\api\model;


class Banner extends BaseModel
{
    protected $table = 'goods';
    protected $hidden = ['img'];
    public function images()
    {
        return $this->belongsTo('Img', 'img', 'id');
    }

    public static function getBanner($count=4)
    {
        $banner = self::with(['images'])
            ->order('order','asc')->order('create_time desc')
            ->where('is_banner','0')->where('status','0')
            ->field('id,name,img')
            ->limit($count)->select();
        return $banner;
    }
}