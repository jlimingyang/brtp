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
}

