<!DOCTYPE html>
<html>
<head>
    <title>投票页面</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-responsive.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
    <script type="text/javascript" src="{{asset('js/jquery2.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery2.sorted.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/ckform.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/common.js')}}"></script>

    <style type="text/css">
        body {font-size: 20px;
            padding-bottom: 40px;
            background-color:#e9e7ef;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }


    </style>
</head>
<body><br><br><center>
    <div align="center">
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
    @endif</span><br><br></div>
    <form class="form-inline definewidth m20" action="{{url('noteadd')}}" method="post">
        <table class="table table-bordered table-hover definewidth m10">
            {{csrf_field()}}
        <thead>
        <input type="hidden" value="{{$arr->id}}" name="userid"/>
        &nbsp;&nbsp; <font><strong>姓名：</strong></font>
         <font><strong>{{$arr->realname}}</strong></font><br><br>
        <font><strong>简介：</strong></font><span>{{$arr->meta}}</span><br><br>
        &nbsp;&nbsp; <font><strong>投票选项：</strong></font>
        @foreach($chooseList as $k=>$v)
        <label><input name="sta" type="radio" value="{{$v->id}}" />{{$v->choosename}}</label>&nbsp;&nbsp;
        @endforeach
        </thead><br><br>
            <strong>投票数量：</strong><input name="count" type="text"></input><br><br>
            <strong>投票说明：</strong><textarea name="meta"></textarea><br><br>
        <button type="submit" class="btn btn-primary">提交投票</button><br><br><br>
        </table></form>
        </center>
</body>
</html>