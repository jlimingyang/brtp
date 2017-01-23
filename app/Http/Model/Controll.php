<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Controll extends Model
{
    protected $table='br_controll';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];

  /**
   * 查询选项
   */
    public function count()
    {
        $arr = $this->first(['count_contr']);
        return $arr->count_contr;
    }
    /**
     * 修改设置
     */
    public function updateControll($num)
    {
        $where['id'] = 1;
        $data['count_contr'] = $num;
//        $data['time_start'] = $time_start;
//        $data['time_end'] = $time_end;
        $data['m_time'] = date('Y-m-d H:i:s',time());
        $sta = $this->where($where)->update($data);
        return $sta;
    }
}

