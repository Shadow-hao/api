<?php


namespace app\api\model;


class Img extends BaseModel
{
    protected $hidden = ['create_time','update_time'];
    public function getImgAttr($value)
    {
        return $this->prefixImgUrl($value);
    }

}