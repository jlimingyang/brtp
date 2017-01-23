<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\Choose;
use App\Http\Model\Controll;
use App\Http\Model\Log;
use App\Http\Model\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class InitController extends Controller
{
    public function __construct()
    {
    }
    /**
     * 初始化系统
     */
    public function initSys()
    {
        $count = (new Controll)->count();
        $sta = $this->initSystem($count);
        if($sta){ echo "初始化成功！";}else{echo "初始化失败！";}

    }
}
