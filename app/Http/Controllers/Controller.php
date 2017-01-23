<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
//排序方法
    function arraySort($multi_array,$sort_key,$sort=SORT_ASC){
        if(is_array($multi_array)){
            foreach ($multi_array as $row_array){
                if(is_array($row_array)){
                    $key_array[] = $row_array[$sort_key];
                }else{
                    return false;
                }
            }
        }else{
            return false;
        }
        array_multisort($key_array,$sort,$multi_array);
        return $multi_array;
    }
//初始化
    function initSystem($count)
    {
        $sta = DB::table('br_log')->delete();
        $time_str = date('Y-m-d H:i:s',time());
        $ste = DB::update('update br_user set count = '.$count.',left_count = '.$count.' ,c_time = "'.$time_str.'"');
        if(!$sta && !$ste){ return false;}
        return true;
    }
}
