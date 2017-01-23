<!DOCTYPE html>
<html>
<head>
    <title>竞票结果</title>
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
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>名次</th>
        <th>姓名</th>
        <th>获票详情</th>
        <th>总共获票</th>
        <th>排序</th>
    </tr>
    </thead>
    @foreach($arry as $k=>$v)
        <center>
    <tr>
        <td>{{$k+1}}</td>
        <td>{{$v['realname']}}</td>
        <td>
            @foreach($arry[$k]['p'] as $a=>$b)
                {{$b['choosename']}}:{{$b['count']}}票
             @endforeach</td>
        <td>{{$v['total']}}票</td>
            <td>↑</td>
    </tr>
        </center>
        @endforeach
</table>
{{--<div class="ok"><center>{!!$arry->render() !!}</center></div>--}}
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
