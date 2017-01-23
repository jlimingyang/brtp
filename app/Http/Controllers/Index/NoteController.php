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
       $data = Array();
       $arr = (new User)->getUser($input['realname']);
       if(!$arr){ return back()->with('msg', '没有找到该用户信息！');}
       $chooseList = (new Choose)->chooseList();
       if(!$chooseList){ return back()->with('msg', '没有找到投票项！');}
           foreach ($chooseList as $a=>$b)
           {
               $data[$a]['count'] = (new Log)->noteCount($b->id,$arr->id);
           }
       return view('front.notebyname',compact('chooseList','arr','data'));
   }
   /**
    * 投票页面
    */
   public function note()
   {
       $input = Input::all();
       $arr = (new User)->getUserById($input['id']);
       if(!$arr){ return back()->with('msg', '没有找到该用户信息！');}
       $chooseList = (new Choose)->chooseList();
       if(!$chooseList){ return back()->with('msg', '没有找到投票项！');}
       return view('front.note',compact('chooseList','arr'));
   }

    /**
     * @return $this
     * 投票逻辑
     */
   public function noteadd()
   {
       $input = Input::all();
       $rules =[
           'userid'=>'required|numeric',
           'sta'=>'required|numeric',
           'count'=>'numeric|required',
           'meta'=>'required|between:0,3600'
       ];

       $message = [
           'userid.required'=>'数据错误！',
           'userid.numeric'=>'数据出错!',
           'sta.required'=>'请选择投票项！',
           'sta.numeric'=>'数据出错！',
           'count.numeric'=>'投票数量输入错误！',
           'count.required'=>'请输入投票数量！',
           'meta.required'=>'请输入投票说明！',
           'meta.between'=>'投票说明字数:min到:max之间！'
       ];
       $validator = Validator::make($input,$rules,$message);
       if(!$validator->passes())
       {
           return back()->withErrors($validator);
       }
       if(!(new User)->checkNote($input['count'])){return back()->with('msg', '票数不够！code:0');}
       if(!(new User)->deNote($input['count'])){return back()->with('msg', '投票失败！code:1');}
       if(!(new Log)->noteadd($input['userid'],$input['sta'],$input['meta'],$input['count'])){return back()->with('msg', '投票失败！code:2');}
       return redirect('list')->with('msg','投票成功！');
   }
   /**
    * 投票结果排序
    */
   public function noteOrder()
   {
       $chooseList = (new Choose)->chooseList();
       $arr = (new User)->userAllList();
           foreach ($arr as $a=>$b)
           {
               $data[$a]['realname'] = $b->realname;
               $data[$a]['total'] = (new Log)->totalNote($b->id);
               foreach ($chooseList as $k=>$v)
               {
                   $data[$a]['p'][$k]['count'] = (new Log)->noteCount($v->id,$b->id);
                   $data[$a]['p'][$k]['choosename'] = $v->choosename;
               }
            }
       $arry = $this->arraySort($data,'total',SORT_DESC);
//       //获取当前的分页数，就是第6这样的
//       $currentPage = LengthAwarePaginator::resolveCurrentPage();
//       //实例化collect方法
//       $collection = new Collection($arr);
//       //定义一下每页显示多少个数据
//       $perPage = 1;
//       //获取当前需要显示的数据列表
//       $currentPageSearchResults = $collection->slice($currentPage * $perPage, $perPage)->all();
//       //创建一个新的分页方法
//       $arry= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);
//       $arry = $arry->setPath('noteOrder');
       return view('front.noteresult',compact('arry'));
   }
}
