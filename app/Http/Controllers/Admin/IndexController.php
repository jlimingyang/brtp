<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\Controll;
use App\Http\Model\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function __construct()
    {
    }
    /**
     * @return 首页
     */
    public function index()
    {
        return view('front.index');
    }
    //登陆
    public function login()
    {
        if($input = Input::all()){
            $rules =[
                'username'=>'required|between:1,36',
                'userpass'=>'required|between:6,36|alpha_dash',
            ];

            $message = [
                'username.required'=>'用户名不能为空！',
                'username.between'=>'用户名不规范!',
                'userpass.required'=>'密码不能为空！',
                'userpass.between'=>'请输入:min到:max位密码！',
                'userpass.alpha_dash'=>'密码不规范！',
            ];
            $validator = Validator::make($input,$rules,$message);
            if(!$validator->passes())
            {
                return back()->withErrors($validator);
            }
            if($arr = (new User)->userLogin($input['username'],$input['userpass']))
            {
                if($arr->id == 1)
                {
                    return redirect('index_admin');
                }else
                    {
                        return back()->with('msg','您不是系统管理员！');
                    }

            }else
                {
                    return back()->with('msg','用户名或密码不正确！');
                }
        }

    }
    //首页
    public function first()
    {
        return view('admin.first');
    }
    //退出登录
    public function quit_sys()
    {
        session(['userid'=>null]);
        session(['realname'=>null]);
        return redirect('ssadmin');
    }
}
