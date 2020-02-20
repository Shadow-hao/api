<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
use app\admin\common\Tool;
// 应用公共文件
function msg($code,$msg,$errorCode=0){
    return ['code'=>$code,'msg'=>$msg,'errorCode'=>$errorCode];
}
//以ID为索引
function byId($data){
    $list=[];
    foreach ($data as $v){
        $list[$v['id']]=$v;
    }
    return $list;
}
//格式化菜单数据
function genTree($data){
    $tool= new Tool();
    return $tool->genTree($data) ;
}
/*
$s :lenth 小的数组
$l : 值多的数组*/
function a_diff($s){
    $r_id = session('admin')['r_id'];
    if (session('admin')['id'] == 1){
        $l = \think\Db::table('role')->field('right')->find();
    }else{
        $l = \think\Db::table('role')->field('right')->where('id',$r_id)->find();

    }
    $l = json_decode($l['right']);
    if (empty(array_diff($s,$l))){
        return true;
    }

    return false;
}
//json转数组
function json_d($data,$b=true){
    return json_decode($data, $b);
}
//数组转json
function json_e($array){
    return json_encode($array);
}
/**
 * 循环删除目录和文件
 * @param string $dir_name
 * @return bool
 */
function delete_dir_file($dir_name) {
    $result = false;
    if(is_dir($dir_name)){
        if ($handle = opendir($dir_name)) {
            while (false !== ($item = readdir($handle))) {
                if ($item != '.' && $item != '..') {
                    if (is_dir($dir_name . DS . $item)) {
                        delete_dir_file($dir_name . DS . $item);
                    } else {
                        unlink($dir_name . DS . $item);
                    }
                }
            }
            closedir($handle);
            if (rmdir($dir_name)) {
                $result = true;
            }
        }
    }

    return $result;
}
//生成随机
function str(){
    $d =md5('灯塔'.date('H'));
    return $d;
}
function getStr($str){

}