<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Log extends Model
{
    protected $table='br_log';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];

  /**
   * 查询票数
   */
    public function chooseList()
    {
        $arr = $this->get();
        return $arr;
    }
    /**
     * 查询票数by userid
     */
    public function noteCount($chooseid,$userid)
    {
        $where['userid'] = $userid;
        $where['chooseid'] = $chooseid;
        $arr = $this->where($where)->sum('count');
        if(!$arr){return 0;}
        return $arr;
    }
}

