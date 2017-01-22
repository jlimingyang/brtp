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
        <h1>口吐真言投票系统</h1>
        <form class="form" action="{{url('login')}}" method="post">
            {{csrf_field()}}
            <input type="text" name="username" placeholder="账号">
            <input type="password" name="userpass" placeholder="密码"><br>
            <button type="submit"><strong>登陆</strong></button>

        </form>
    </div>

    <ul class="bg-bubbles">
        <li></li>
        <li></li>

    </ul>

</div>



</body>
</html>