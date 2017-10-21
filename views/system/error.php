<!DOCTYPE HTML>
<html lang="zh">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>智享科技</title>

    <!-- Bootstrap core CSS -->
    <link href="../static/css/bootstrap.min.css" rel="stylesheet">

    <!--时间选择css-->
    <link href="../static/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <!--基础样式-->
    <link href="../static/css/base.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../static/css/channellist.css" rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
                <a class="navbar-brand" href="#">智享科技</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">退出</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <ul class="sidebar-menu sidebar" style="width: 200px;">
                <li class="sidebar-header">后台管理系统</li>
                <li>
                    <a href="#">
                        <i class="fa fa-share"></i> <span>渠道管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-sm-9  col-md-10 col-md-offset-2 main" style="">
            <!--提示-->
            <h4 class="sub-header"><b>提示</b></h4>
            <div class="alert alert-danger" style="width: 600px;"><?php echo $error; ?>&nbsp;&nbsp;&nbsp;三秒后将跳转上一个页面</div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="../static/js/bootstrap-datetimepicker.js"></script>
    <script src="../static/js/sidebar-menu.js"></script>
    <script>
        $.sidebarMenu($('.sidebar-menu'))
        $("#startTime").datetimepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            minView: "month",
            todayBtn: true
        });
        $("#endTime").datetimepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            minView: "month",
            todayBtn: true
        });
    </script>
    <script>
       $(document).ready(function(){
            setTimeout(function() {
                history.go(-1);
            },3000);
        }); 
    </script>
</body>

</html>