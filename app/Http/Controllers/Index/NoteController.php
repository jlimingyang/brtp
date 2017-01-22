<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Http\Model\Choose;
use App\Http\Model\Log;
use App\Http\Model\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{
    public function __construct()
    {
    }
   /**
    * 投票人
    */
   public function notelist()
   {
       $data = Array();
       $arr = (new User)->userList();
       $chooseList = (new Choose)->chooseList();
       foreach ($arr as $k=>$v)
       {
            foreach ($chooseList as $a=>$b)
            {
                $data[$k][$a]['count'] = (new Log)->noteCount($b->id,$v->id);
            }
        }
       return view('front.notelist',compact('chooseList','arr','data'));
   }
}
