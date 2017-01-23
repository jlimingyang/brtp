<!DOCTYPE html>
<html>
<head>
    <title>注册</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="{{asset('resources/style/style.css')}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{asset('resources/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/js/jquery.i18n.properties-1.0.9.js')}}" ></script>
    <script type="text/javascript" src="{{asset('resources/js/jquery-ui-1.10.3.custom.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/js/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/js/md5.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/js/page_regist.js?lang=zh')}}"></script>
    <!--[if IE]>
    <script src="{{asset('resources/js/html5.js')}}"></script>
    <![endif]-->
    <!--[if lte IE 6]>
    <script src="{{asset('resources/js/DD_belatedPNG_0.0.8a-min.js')}}" language="javascript"></script>
    <script>
        DD_belatedPNG.fix('div,li,a,h3,span,img,.png_bg,ul,input,dd,dt');
    </script>
    <![endif]-->
</head>
<body class="loginbody"><center>
 <span style="color:red">
                    @if(count($errors)>0)
         <div class="">
                      @if(is_object($errors))
                 @foreach($errors->all() as $error)
                     <p>{{$error}}</p>
                 @endforeach
             @else
                 <p>{{$errors}}</p>
             @endif
                          </div>
     @endif
     @if(!empty(session('msg')))
         {{session('msg')}}
     @endif</span><br><br></center>
<div class="dataEye">
    <div class="loginbox registbox">
        <div class="logo-a">
        </div>
        <div class="login-content reg-content">
            <div class="loginbox-title">
                <h3>口吐真言投票系统注册  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="{{url('/')}}">返回登陆</a> </h3>
            </div>
            <form action="{{url('registe')}}" method="post">
                {{csrf_field()}}
                <div class="login-error"></div>
                <div class="row">
                    <label class="field" for="email">登陆账号</label>
                    <input type="text" value="" class="input-text-user noPic input-click" name="username" id="email">
                </div>
                <div class="row">
                    <label class="field" for="contact">真实姓名 - 务必真实，可能影响投票。</label>
                    <input type="text" value="" class="input-text-user noPic input-click" name="realname" id="contact">
                </div>
                <div class="row">
                    <label class="field" for="password">登陆密码</label>
                    <input type="password" value="" class="input-text-password noPic input-click" name="userpass" id="password">
                </div>
                <div class="row">
                    <label class="field" for="passwordAgain">确认密码</label>
                    <input type="password" value="" class="input-text-password noPic input-click" name="userpass_confirmation" id="passwordAgain">
                </div>
                <div class="row btnArea">
                    <button class="login-btn" type="submit"><strong>注册</strong></button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>