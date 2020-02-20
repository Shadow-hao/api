<?php


namespace app\admin\model;


use app\lib\exception\UserException;

class Admin extends BaseModel
{

// 用户登录处理
    public static function getUserByUserName()
    {
        $data = input('post.');
        $user = self::where('name', $data['name'])->find();
        if (!$user){
            throw new UserException([
                'msg'=>'用户名不存在'
            ]);
        }
        if (md5($data['password']) !== $user['password']){
            throw new UserException([
                'msg'=>'密码错误请重试'
            ]);
        }
        if ($user['status']){
            throw new UserException([
                'msg'=>'账户已经被禁用联系管理员解禁'
            ]);
        }
        $admin=[
          'id'=>$user['id'],
          'name'  =>$user['name'],
          'r_id'  =>$user['r_id']
        ];
        session('admin',$admin);
        return true;
    }
    //退出登录
    public static function logout()
    {
        session(null);
        if (!session('admin')){
            throw new UserException([
                'code'=>'200',
                'msg'=>'退出成功',
                'errorCode'=>'1',
            ]);
        }
        throw new UserException([
            'msg'=>'退出失败',
            'errorCode'=>'0',
        ]);
    }
//管理员列表
    public function admin_list(){
        $data = self::order('order','asc')->select()->toArray();
        return $data;
    }

    public function admin_add(){
        $data = input('post.');
        if (!$data['r_id']){
            throw new UserException([
                'code'=>'401',
                'msg'=>'不能不分配权限',
                'errorCode'=>'1',
            ]);
        }
        $data['password']= md5($data['password']);
        $res = $this->data($data)->allowField(true)->save();
        if (!$res){
            throw new UserException([
                'code'=>'401',
                'msg'=>'管理员添加失败',
                'errorCode'=>'1',
            ]);
        }else{
            throw new UserException([
                'code'=>'201',
                'msg'=>'管理员添加成功',
                'errorCode'=>0,
            ]);
        }

    }
    public function admin_del(){
        $id = input('post.id/d');
        if ($id ==1){
            throw new UserException([
                'code'=>'401',
                'msg'=>'超级管理员不能删除',
                'errorCode'=>1,
            ]);
        }
        if ($this::destroy($id)){
            throw new UserException([
                'code'=>'201',
                'msg'=>'管理员删除成功',
                'errorCode'=>0,
            ]);
        }else{
            throw new UserException([
                'code'=>'401',
                'msg'=>'管理员删除失败',
                'errorCode'=>1,
            ]);
        }

    }
    public function admin_up()
    {
        $data = input('post.');
        if (isset($data['password'])){
            $data['password'] = md5($data['password']);
        }
        if (session('admin')['id'] == 1){
            if (($this::update($data))){
                throw new UserException([
                    'code'=>'201',
                    'msg'=>'管理员修改成功',
                    'errorCode'=>0,
                ]);

            }else{
                throw new UserException([
                    'code'=>'401',
                    'msg'=>'管理员修改失败',
                    'errorCode'=>1,
                ]);
            }

        }
        if (session('admin')['id'] == $data['id']){
            if (($this::update($data))){
                throw new UserException([
                    'code'=>'201',
                    'msg'=>'管理员修改成功',
                    'errorCode'=>0,
                ]);
            }
        }else{
            throw new UserException([
                'code'=>'401',
                'msg'=>'修改失败你无权限',
                'errorCode'=>1,
            ]);
        }


    }
    public function admin_one($id)
    {
        return $this::get($id)->toArray();
    }
    public function role_list(){
        if (session('admin')['id'] == 1){
            $role =model('Role')->select()->toArray();
        }

        return $role;
    }

}