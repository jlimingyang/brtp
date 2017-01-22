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
        $arr = $this->get();
        return $arr;
    }
}

