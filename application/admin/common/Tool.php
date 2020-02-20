<?php


namespace app\admin\common;


class Tool
{
    static public $treeList = array(); //存放无限分类结果如果一页面有多个无限分类可以使用 Tool::$treeList = array(); 清空
    /**
     * 无限级分类
     * @access public
     * @param Array $data     //数据库里获取的结果集
     * @param Int $pid
     * @param Int $count       //第几级分类
     * @return Array $treeList
     * 渲染HTML
     *  <td style="text-indent:<{$vo['Count']*20}>px;"><neq name="vo.Count" value="1">| -- </neq><{$vo.Name}></td>
     */
    static public function tree(&$data,$pid = 0,$count = 1) {
        foreach ($data as $key => $value){
            if($value['pid']==$pid){
                $value['Count'] = $count;
                self::$treeList []=$value;
                unset($data[$key]);
                self::tree($data,$value['id'],$count+1);
            }
        }
        return self::$treeList ;
    }
//    首页三级菜单
    public function genTree($data) {
        $items=[];
        foreach ($data as $v){
            $items[$v['id']]=$v;
        }
        $tree = array(); //格式化好的树
        foreach ($items as $item)
            if (isset($items[$item['pid']]))
                $items[$item['pid']]['son'][] = &$items[$item['id']];
            else
                $tree[] = &$items[$item['id']];
        return $tree;
    }

}