<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class User extends Model
{
    protected $table='br_user';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];
    /**
     * 注册
     */
    public function registe($username,$realname,$userpass,$count)
    {
        $data['username'] = $username;
        $data['realname'] = $realname;
        $data['userpass'] = Crypt::encrypt($userpass);
        $data['count'] = $count;
        $data['left_count'] = $count;
        $data['c_time'] = date('Y-m-d H:i:s',time());
        $data['status'] = 0;
        $data['meta'] = null;
        $req = $this->insertGetId($data);
        return $req;
    }
  /**
   * 验证用户
   */
  public function userLogin($username,$userpass)
  {
      $where['username'] = $username;
      $arr = $this->where($where)->first(['id', 'userpass', 'realname']);
      if (!$arr) {
          return false;
      }
      if (Crypt::decrypt($arr->userpass) == $userpass) {
          session(['userid' => $arr->id]);
          session(['realname' => $arr->realname]);
          return $arr;
      } else {
          return false;
      }
  }
    /**
     * 读取票数信息
     */
    public function userInfo()
    {
        $where['id'] = session('userid');
        $arr = $this->where($where)->first(['count', 'left_count']);
        return $arr;
    }
    /**
     * 列表
     */
    public function userList()
    {
        $arr = $this->where('id','!=',session('userid'))->where('id','!=',1)->orderBy('id','asc')->paginate(8);
        return $arr;
    }
    /**
     * get user by id
     */
    public function getUserById($id)
    {
        $where['id'] = $id;
        $arr = $this->where($where)->where('id','!=',1)->first();
        return $arr;
    }
    /**
     * get use by realname
     */
    public function getUser($realname)
    {
        $where['realname'] = $realname;
        $arr = $this->where($where)->where('id','!=',1)->first();
        return $arr;
    }
    /**
     * 检查用户票数
     */
    public function checkNote($count)
    {
        $where['id'] = session('userid');
        $sta = $this->where($where)->first(['left_count']);
        if($sta->left_count < $count){ return false;}
        return true;
    }
    /**
     * 扣除用户票数
     */
    public function deNote($count)
    {
        $where['id'] = session('userid');
        $sta = $this->where($where)->decrement('left_count',$count);
        return $sta;
    }
    /**
     * 查询所有用户
     */
    public function userAllList()
    {
        $user = $this->where('id','!=',1)->orderBy('id','asc')->paginate(8);
        return $user;
    }
    //初始化票数
    public function initUser($count)
    {
        $data['count'] =$count;
        $data['left_count'] = $count;
        $data['c_time'] = date('Y-m-d H:i:s',time());
        $sta = $this->update($data);
        return $sta;
    }
    //删除投票人
    public function delUserById($id)
    {
        $where['id'] = $id;
        $arr = $this->where($where)->where('id','!=',1)->delete();
        return $arr;
    }
}

