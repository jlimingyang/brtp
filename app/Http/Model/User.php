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
          return true;
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
        $arr = $this->where('id','!=',session('userid'))->orderBy('id','asc')->paginate(15);
        return $arr;
    }
}

