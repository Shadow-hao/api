<?php


namespace app\api\controller;


use think\Controller;

class player extends Controller
{
    public function getSrc()
    {
        $u = input('post.url/s');
        //$u = input('post.key');
        $data=[
            'http://jx.598110.com/?url='.$u,
            'http://vip.jlsprh.com/?url='.$u,
            'http://jx.618ge.com/?url='.$u,
            'http://jx.du2.cc/?url='.$u,
            'https://www.8090g.cn/?url='.$u,

        ];
        $count = count($data);
        $r = rand(1,$count);

        $url = 'http://47.105.150.81/player?url='.$u;

        return json($url);
    }

    public function update()
    {
        $url = 'http://www.baidu.com';
        return json(['Code'=>0,'url'=>$url]);
    }

    public function player()
    {
        $u = input('get.url');
        $data=[
            'http://jx.598110.com/?url='.$u,
            'http://vip.jlsprh.com/?url='.$u,
            'http://jx.618ge.com/?url='.$u,
            'http://jx.du2.cc/?url='.$u,
        ];
        // dump($u);
        $count = count($data);
        $r = rand(0,$count-1);
        $this->assign('url',$data[$r]);
        return $this->fetch();
    }
}