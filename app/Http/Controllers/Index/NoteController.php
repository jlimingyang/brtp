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
   /**
    * 投票人by realname
    */
   public function getNote()
   {
       $input = Input::all();
       $rules =[
           'realname'=>'required|between:1,36',
       ];

       $message = [
           'realname.required'=>'姓名不能为空！',
           'realname.between'=>'用户名不规范!',
       ];
       $validator = Validator::make($input,$rules,$message);
       if(!$validator->passes())
       {
           return back()->withErrors($validator);
       }
   }
}
