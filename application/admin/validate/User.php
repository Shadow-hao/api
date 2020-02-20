<?php


namespace app\admin\validate;


class User extends BaseValidate
{
    protected $rule = [
        'name|用户名' =>'require|isNotEmpty|alphaNum|length:3,12',
        'password|密码' =>'require|isNotEmpty|alphaDash',
        'vercode|验证码'  =>'require|captcha'
    ];

}