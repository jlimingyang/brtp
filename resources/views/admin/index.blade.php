<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>口吐真言投票系统</title>

    <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
<body>


<div class="wrapper">

    <div class="container">
        <h1>系统管理员登陆</h1>
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
            @endif</span>
        <form class="form" action="{{url('login_admin')}}" method="post">
            {{csrf_field()}}
            <input type="text" name="username" placeholder="账号">
            <input type="password" name="userpass" placeholder="密码"><br>
            <button type="submit"><strong>登陆</strong></button><br><br>
        </form>
    </div>

    <ul class="bg-bubbles">
        <li></li>
        <li></li>
    </ul>

</div>



</body>
</html>