<?php


namespace app\admin\model;


use app\lib\exception\ParamException;

class Role extends BaseModel
{
     public function role_list(){
        $role =$this->select()->toArray();
        return $role;
     }
    public function role_save(){
        $data = input('post.');
        $data['right'] = json_encode(array_values($data['right']));
        $this->data($data);
        if (($this->allowField(true)->save())){
            throw new ParamException([
                'code' => 201,
                'msg' => '角色添加成功',
                'errorCode' => 0
            ]);
        }else{
            throw new ParamException([
                'code' => 401,
                'msg' => '角色添加失败',
                'errorCode' => 1
            ]);
        }

    }
    public function role_del(){
         $id = input('post.id/d');
        if ($id ==1){
            throw new ParamException([
                'code' => 401,
                'msg' => '默认角色无法删除',
                'errorCode' => 1
            ]);
        }
        if ($this::destroy($id)){
            throw new ParamException([
                'code' => 201,
                'msg' => '角色删除成功',
                'errorCode' => 0
            ]);
        }

    }
    public function role_edit($id){
        $role = ($this::get($id))->toArray();
        if (session('admin')['id'] == 1){
            $role['menu'] =genTree(model('Menu')->field('id,pid,name')->order('order','asc')->order('id','asc')->select()->toArray()) ;
       }
         else {
               //根据管理员权限加载对应节点
               $r_id = session('admin')['r_id'];
               $where = $this->where('id', $r_id)->field('right')->find();
               $where = json_decode($where['right'], true);
               $role['menu'] = genTree(model('Menu')->field('mid,pid,name')->where('id','in',$where)->order('order','asc')->select()->toArray());
           }
        $role['right']= json_decode($role['right'],true);
        return $role;
    }
    public function role_up(){
         $data = input('post.');
        $data['right']= json_encode( $data['right']);
        if (($this::update($data))){
            throw new ParamException([
                'code' => 201,
                'msg' => '角色更新成功',
                'errorCode' => 0
            ]);

        }else{
            throw new ParamException([
                'code' => 401,
                'msg' => '角色更新失败',
                'errorCode' => 1
            ]);
        }

    }

    public function byIdRoelList()
    {
        $role =$this->field('id,name')->select()->toArray();
        return byId($role);
    }

}