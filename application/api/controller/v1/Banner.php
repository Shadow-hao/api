<?php


namespace app\api\controller\v1;
use app\api\model\Banner as BannerModel;
use app\lib\exception\ParamException;

class Banner
{
    public function getBanner(){
        $banner = BannerModel::getBanner();
        if (!$banner ) {
            throw new ParamException([
                'msg' => '请求banner失败',
                'code'=>'401',
                'errorCode' => 40000
            ]);
        }
        return $banner;
    }
}