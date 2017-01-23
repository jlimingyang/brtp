<?php

namespace App\Http\Controllers\Index;

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
     * 注册
     */
    public function registe()
    {
        if($input = Input::all()) {
            $rules = [
                'username' => 'required|between:1,36',
                'realname' => 'required|between:1,36',
                'userpass' => 'confirmed|required|between:6,36|alpha_dash',
            ];

            $message = [
                'realname.required' => '姓名不能为空！',
                'realname.between' => '姓名不规范!',
                'username.required' => '用户名不能为空！',
                'username.between' => '用户名不规范!',
                'userpass.required' => '密码不能为空！',
                'userpass.between' => '请输入:min到:max位密码！',
                'userpass.alpha_dash' => '密码不规范！',
                'userpass.confirmed' => '两次输入密码不一样！'
            ];
            $validator = Validator::make($input, $rules, $message);
            if (!$validator->passes()) {
                return back()->withErrors($validator);
            }
            $count = (new Controll)->count();
            $sta = (new User)->registe($input['username'],$input['realname'],$input['userpass'],$count);
            if(!$sta){ return back()->with('msg','注册失败！');}
            return redirect('/')->with('msg','注册成功！');
        }

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
                return redirect('first');
            }else
                {
                    return back()->with('msg','用户名或密码不正确！');
                }
        }

    }
    //登陆成功首页
    public function first()
    {
        return view('front.first');
    }
    //退出登录
    public function quit()
    {
        session(['userid'=>null]);
        session(['realname'=>null]);
        return redirect('/');
    }
    //验证码
//    public function code()
//    {
//        $code = new \Code;
//        $code->make();
//    }
//获取票数
    public function info()
    {
        $arr=(new User)->userInfo();
        $data['status'] = 1;
        $data['count'] = $arr->count;
        $data['already_count'] = $arr->count - $arr->left_count;
        return $data;
    }
}
