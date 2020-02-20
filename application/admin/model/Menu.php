<?php


namespace app\admin\model;


use app\admin\common\Tool;
use app\lib\exception\ParamException;
use think\Db;

class Menu extends BaseModel
{
    protected $table = 'menu';

    //根据管理员获取菜单后台首页
    public function get_menu()
    {
        if (session('admin')['id'] == 1) {
            $data = self::where('ishidden', 0)->order('order', 'asc')->order('id', 'asc')->select()->toArray();
        }else{
            $where = Db::table('role')->field('right')->where('id',session('admin')['r_id'])->find();
            $where = json_decode($where['right'], true);
            $data = self::where('ishidden', 0)->where('id', 'in', $where)->order('order', 'asc')->order('id', 'asc')->select()->toArray();

        }
        return genTree($data);
    }
    //根据管理员获取添加权限数据
    public function get_menu1()
    {
        if (session('admin')['id'] == 1) {
            $data = self::order('order', 'asc')->order('id', 'asc')->select()->toArray();
        }else{
            $where = Db::table('role')->field('right')->where('id',session('admin')['r_id'])->find();
            $where = json_decode($where['right'], true);
            $data = self::where('type', 0)->where('id', 'in', $where)->order('order', 'asc')->order('id', 'asc')->select()->toArray();

        }
        return genTree($data);
    }

    //获取菜单管理列表
    public function menu_list()
    {
        $tool = new Tool();
        $data = self::order('order', 'asc')->order('id', 'asc')->select()->toArray();
        return $tool::tree($data);
    }

    /*
     * 添加菜单
     * $data :添加的菜单数据*/
    public function add_menu()
    {
        $data = input('post.');
        if ($res = self::create($data)) {
            throw new ParamException([
                'code' => 201,
                'msg' => '菜单添加成功',
                'errorCode' => 0
            ]);

        } else {
            throw new ParamException([
                'code' => 400,
                'msg' => '菜单添加失败',
                'errorCode' => 1
            ]);
        }

    }


    /*
         * 菜单删除
         * $id : 要删除的id*/
    public function del_menu()
    {
        $id = input('post.id');
        $data = $this->get($id);
        if ($data['pid'] == 0) {
            //删除二级菜单
            $c = $this::where('pid', $id)->find();
            if ($c) {
                //删除三级菜单
                $cc = $this::where('pid', $c['id'])->find();
                if ($cc) {
                    if (!($this::destroy(['pid' => $c['mid']]))) {
                        throw new ParamException([
                            'code' => 400,
                            'msg' => '三级菜单删除失败',
                            'errorCode' => 1
                        ]);
                    }
                }
                if (!($this::destroy(['pid' => $id]))) {
                    throw new ParamException([
                        'code' => 400,
                        'msg' => '二级菜单删除失败',
                        'errorCode' => 1
                    ]);
                }
            }


        } else {
            if ($this::destroy($id)) {
                throw new ParamException([
                    'code' => 200,
                    'msg' => '菜单删除成功',
                    'errorCode' => 0
                ]);
            }
        }
        if ($this::destroy($id)) {
            throw new ParamException([
                'code' => 200,
                'msg' => '菜单删除成功',
                'errorCode' => 0
            ]);
        }

    }
    //更新菜单
    /*
    * 编辑菜单*/
    public function edit_menu(){
        $id = input('get.id');
        return $this::get($id);
    }
    //更新菜单
    public function up_menu(){
        $data = input('post.');
        if(!($this::update($data))){
            throw new ParamException([
                'code' => 401,
                'msg' => '菜单修改失败',
                'errorCode' => 1
            ]);
        }else{
            throw new ParamException([
                'code' => 201,
                'msg' => '菜单更新成功',
                'errorCode' => 0
            ]);
        }

    }
    //查询所拥有的的权限
    public function getPath($where)
    {
        $role = self::field('url')->where('id','in',$where)->select()->toArray();
        return $role;
    }


}