<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class Log extends Model
{
    protected $table = 'br_log';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];

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
    public function noteCount($chooseid, $userid)
    {
        $where['userid'] = $userid;
        $where['chooseid'] = $chooseid;
        $arr = $this->where($where)->sum('count');
        if (!$arr) {
            return 0;
        }
        return $arr;
    }
    /**
     * 添加投票记录
     */
    public function noteadd($userid,$chooseid,$meta,$count)
    {
       $data['userid'] = $userid;
       $data['chooseid'] = $chooseid;
       $data['no_userid'] = session('userid');
       $data['meta'] = $meta;
       $data['c_time'] = date('Y-m-d H:i:s',time());
       $data['count'] = $count;
       $req = $this->insertGetId($data);
       return $req;
    }
    //总票数
    public function totalNote($userid)
    {
        $where['userid'] = $userid;
        $arr = $this->where($where)->sum('count');
        if(!$arr){return 0;}
        return $arr;
    }
}

