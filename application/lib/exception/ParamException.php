<?php


namespace app\lib\exception;


class ParamException extends BaseException
{
        public $code = 400;
        public $msg = '参数错误';
        public $errorCode = 1;
}