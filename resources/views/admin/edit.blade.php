<!DOCTYPE html>
<html>
<head>
    <title>系统设置</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-responsive.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
    <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.sorted.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/ckform.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/common.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/showdate.js')}}"></script>
    <style type="text/css">
        body {font-size: 20px;
            padding-bottom: 40px;
            background-color:#e9e7ef;
            font-size:17px;
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
<form action="#" method="post">
    <table class="table table-bordered table-hover definewidth m10" style="margin-left:3%;margin-top:2%;">
        <tr>
            <td width="10%" class="tableleft">初始票数：</td>
            <td><input type="text" name="bigTypeName" style="height: 15px; width: 56px"/></td>

        </tr>
        <tr>
            <td class="tableleft">投票开始时间:</td>
            <td style="height: 46px; "> <div style="margin:0 auto;">
                    <input type="text" id="time1" value="选择时间" onClick="return Calendar('time1');" class="text_time"/>
                </div>
            </td>
        </tr>
        <tr>
            <td class="tableleft">投票结束时间</td>
            <td> <div style="margin:0 auto;">
                    <input type="text" id="time2" value="选择时间" onClick="return Calendar('time2');" class="text_time"/>
                </div>
            </td>
        </tr>
        <tr>
            <td class="tableleft"></td>
            <td>
                <button style="margin-left:180px;"type="submit" class="btn btn-primary" type="button">确认修改</button>&nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid" onclick=javascrtpt:jump();>返回列表</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
<script>
    function jump(){
        window.location.href="placardQuery.html";
    }
</script>