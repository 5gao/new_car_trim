<!DOCTYPE HTML>
<html lang="zh">
<?php use yii\helpers\Url; ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>酷刻视频广告系统</title>

    <!-- Bootstrap core CSS -->
    <link href="../../static/css/bootstrap.min.css" rel="stylesheet">

    <!--时间选择css-->
    <link href="../../static/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <!--基础样式-->
    <link href="../../static/css/base.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../static/css/channellist.css" rel="stylesheet">

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
            <a class="navbar-brand" href="#">酷刻视频广告系统</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <!--                <li><a href="--><?php //echo Url::toRoute('login/delete'); ?><!--">退出</a></li>-->
                <li style="display: block;"><img src="../../static/images/icon-3.png"  style="vertical-align: -85%;" ></li><li><a href="#" id="nickname"></a></li>
                <li><a href="<?php echo Url::toRoute('login/login-out'); ?>">退出</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <ul class="sidebar-menu sidebar" style="width: 200px;" id="nav">

        </ul>


        <div class="col-sm-9  col-md-10 col-md-offset-2 main">
            <ol class="breadcrumb">
                <li class="active">系统管理</li>
                <li class="active">账号管理</li>
                <li class="active">添加管理员</li>
            </ol>

            <form class="form-horizontal" method="post" action="<?php echo Url::toRoute(['system/user-data-add']); ?>">
                <input type="hidden" name='up_id' value="0">
                <input type="hidden" name='rank' value="one">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">管理员名称</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="name" placeholder="请输入管理员名称">
                    </div>
                </div>
                <div class="form-group">
                    <label for="company" class="col-sm-2 control-label">公司</label>
                    <div class="col-sm-10">
                        <input type="text" name="company" class="form-control" id="company" placeholder="请输入公司名称">
                    </div>
                </div>

                <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">登陆帐号</label>
                    <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" id="username" placeholder="请输入帐号名称">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">初始密码</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="password" placeholder="请输入密码">
                    </div>
                </div>
                <div class="form-group">
                    <label for="re_password" class="col-sm-2 control-label">确认密码</label>
                    <div class="col-sm-10">
                        <input type="password" name="re_password" class="form-control" id="re_password" placeholder="请输入密码">
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact" class="col-sm-2 control-label">联系人</label>
                    <div class="col-sm-10">
                        <input type="text" name="contact" class="form-control" id="contact" placeholder="请输入联系人名称">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-sm-2 control-label">电话</label>
                    <div class="col-sm-10">
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="请输入个人电话">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">邮箱</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control" id="email" placeholder="请输入邮箱地址">
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-sm-2 control-label">地址</label>
                    <div class="col-sm-10">
                        <input type="text" name="address" class="form-control" id="address" placeholder="请输入地址">
                    </div>
                </div>
                <div class="form-group">
                    <label for="remark" class="col-sm-2 control-label">备注</label>
                    <div class="col-sm-10">
                        <input type="text" name="remark" class="form-control" id="remark" placeholder="请输入备注信息">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-info">提交</button>
                        <button type="submit" class="btn btn-info">取消</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
<script src="../../static/js/bootstrap-datetimepicker.js"></script>
<script src="../../static/js/sidebar-menu.js"></script>
<script src="../../static/js/index.js"></script>
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
</body>

</html>