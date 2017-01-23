<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\Choose;
use App\Http\Model\Controll;
use App\Http\Model\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class EditController extends Controller
{
    public function __construct()
    {
    }
   /**
    * 设置
    */
   public function edit()
   {
       $count = (new Controll)->count();
       return view('admin.edit',compact('count'));
   }
   /**
    * 修改设置
    */
   public function updateSys()
   {
       $input = Input::all();
       $rules =[
           'num'=>'required|numeric',
//           'time_start'=>'required',
//           'time_end'=>'required|between:6,36|alpha_dash',
       ];
       $message = [
           'num.required'=>'数量不能为空！',
           'num.numeric'=>'请输入数字类型！',
//           'time_start.required'=>'开始时间不能为空！',
//           'time_end.required'=>'结束时间不能为空！',
       ];
       $validator = Validator::make($input,$rules,$message);
       if(!$validator->passes())
       {
           return back()->withErrors($validator);
       }
       if(!(new Controll)->updateControll($input['num'])){return back()->with('msg','修改失败！');}
       return redirect('edit')->with('msg','修改成功！');
   }
   /**
    * 选项设置
    */
   public function chooseIndex()
   {
        $data = (new Choose)->chooseList();
        return view('admin.choose',compact('data'));
   }
   /**
    * 增加选项
    */
   public function addChoose()
   {
       $input = Input::all();
       $rules =[
           'choosename'=>'required',
//           'time_start'=>'required',
//           'time_end'=>'required|between:6,36|alpha_dash',
       ];
       $message = [
           'num.required'=>'不能为空！',
//           'time_start.required'=>'开始时间不能为空！',
//           'time_end.required'=>'结束时间不能为空！',
       ];
       $validator = Validator::make($input,$rules,$message);
       if(!$validator->passes())
       {
           return back()->withErrors($validator);
       }
        if(!(new Choose)->addChoose($input['choosename'])){ return back()->with('msg','添加失败！');}
        return redirect('chooseIndex')->with('msg','添加成功！');
   }
}
