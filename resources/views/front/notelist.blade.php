<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="description" content="Creating Modal Window with Twitter Bootstrap">
    <link href="" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/laravelpage.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-responsive.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
    <script type="text/javascript" src="{{asset('js/jquery2.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery2.sorted.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/ckform.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/ckform.js')}}"></script>

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
<body><br><br>
<form class="form-inline definewidth m20" action="#" method="get">
    <font color="#33ccff"><strong>查询：</strong></font>
    <input type="text" name="menuname" id="menuname"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;
    <button type="submit" class="btn btn-primary">查询</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>姓名</th>
        <th>描述</th>
        <th>创建时间</th>
        @foreach($data[0]['note'] as $k=>$v)
            <th>{{$v['choosename']}}</th>
        @endforeach
        <th>投票选项</th>
    </tr>
    </thead>
    @foreach($data as $k=>$v)
        <center>
    <tr>
        <td>{{$v['realname']}}</td>
        <td>{{$v['meta']}}</td>
        <td>{{$v['c_time']}}</td>
        @foreach($v['note'] as $k=>$u)
            <td>{{$u['count']}}票</td>
        @endforeach
        <td><a href="placardEdit.html">投票</a></td>
    </tr>
        </center>
        @endforeach
</table>
{{--<div class="ok"><center>{!!$data->render() !!}</center></div>--}}
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