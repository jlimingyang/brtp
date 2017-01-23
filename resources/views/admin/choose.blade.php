<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="description" content="Creating Modal Window with Twitter Bootstrap">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-responsive.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
    <script type="text/javascript" src="{{asset('js/jquery2.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery2.sorted.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/ckform.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/common.js')}}"></script>

    <style type="text/css">
        body {
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
<body>
<br><br>
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
<form class="form-inline definewidth m20" action="{{url('addChoose')}}" method="POST">
    <font color="#33ccff"><strong>选项名：</strong></font>
    {{csrf_field()}}
    <input type="text" name="choosename" id="menuname"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;
    <button type="submit" class="btn btn-primary">添加选项</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>选项名</th>
        <th>创建时间</th>
        <th>删除</th>
    </tr>
    </thead>
    @foreach($data as $k=>$v)
    <tr>
        <td>{{$v->choosename}}</td>
        <td>{{$v->c_time}}</td>
        <td><a href="#">删除</a></td>
    </tr>
@endforeach

</table>

</body>
</html>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap-tooltip.js')}}"></script>
<script src="{{asset('js/bootstrap-popover.js')}}"></script>
<script>
    $(function ()
    { $("#xiangqing").popover();
    });
</script>
