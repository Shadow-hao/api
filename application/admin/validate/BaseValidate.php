<?php


namespace app\admin\validate;



use app\lib\exception\ParamException;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    /**
     * @
     */
    public function goCheck()
    {
        //获取HTTP传入参数
        //对参数做效验
        $request = Request::instance();
        $param = $request->param();
//        $result = $this->batchbatch()->check($param);
        $result = $this->check($param);
        if (!$result){
            throw new ParamException(['msg'=>$this->error]);

        }
        else{
            return true;
        }

    }
    //自定义验证id是否为正整数
    protected function IsInt($value,$rule='',$data='',$filed=''){
        if (is_numeric($value) && is_int($value + 0) &&($value + 0) > 0){
            return true;
        }else{

            return false;
        }
    }
    protected function isNotEmpty($value,$rule='',$data='',$filed=''){
        if (empty($value)){
            return false;
        }else{
            return true;
        }

    }

    public function getDataByRule($arrays)
    {
      if (array_key_exists('user_id',$arrays)|array_key_exists('uid',$arrays)){
          throw new ParamException([
             'msg'=>'参数中包含非法参数user_id或UID'
          ]);
      }
      $newArray =[];
      foreach ($this->rule as $key => $value){
          $newArray[$key]=$arrays[$key];
      }
      return $newArray;
    }
    //没有使用TP的正则验证，集中在一处方便以后修改
    //不推荐使用正则，因为复用性太差
    //手机号的验证规则
    protected function isMobile($value)
    {
        $rule = '^1(3|4|5|7|8)[0-9]\d{8}$^';
        $result = preg_match($rule, $value);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}