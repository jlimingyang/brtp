<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Choose extends Model
{
    protected $table='br_choose';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];

  /**
   * 查询选项
   */
    public function chooseList()
    {
        $arr = $this->orderBy('id','desc')->get();
        return $arr;
    }
    /**
     * 增加选项
     */
    public function addChoose($choosename)
    {
        $data['choosename'] = $choosename;
        $data['choosemeta'] = ' ';
        $data['c_time'] = date('Y-m-d H:i:s',time());
        $req = $this->insertGetId($data);
        return $req;
    }
    /**
     * 删除选项
     */
    public function delChoose($id)
    {
        $where['id'] = $id;
        $sta = $this->where($where)->delete();
        return $sta;
    }
}

