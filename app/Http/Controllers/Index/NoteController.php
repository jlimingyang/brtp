<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Http\Model\Choose;
use App\Http\Model\Log;
use App\Http\Model\User;
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
           $data[$k]['realname'] = $v->realname;
           $data[$k]['meta'] = $v->meta;
           $data[$k]['c_time'] = $v->c_time;
            foreach ($chooseList as $a=>$b)
            {
                $data[$k]['note'][$a]['count'] = (new Log)->noteCount($b->id,$v->id);
                $data[$k]['note'][$a]['choosename'] = $b->choosename;
            }
        }
       return view('front.notelist',compact('data'));
   }
}
