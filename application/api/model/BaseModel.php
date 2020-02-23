<?php


namespace app\api\model;


use think\Model;

class BaseModel extends Model
{
    protected function  prefixImgUrl($value){

        $finalUrl = config('setting.img_prefix').$value;

        return $finalUrl;
    }
}