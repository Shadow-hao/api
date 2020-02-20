<?php


namespace app\admin\validate;


class Category extends BaseValidate
{
    protected $rule = [
        'name|分类名' =>'require|isNotEmpty|chsAlphaNum',
        'img|图片' =>'require|isNotEmpty'
    ];
}