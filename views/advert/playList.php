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
            </ol>
                        <a class="btn btn-info" href="<?php echo Url::toRoute('system/user-add'); ?>">添加管理员</a>
            <form class="form-inline" style="margin-top: 30px;">
                <div class="form-group">
                    <label for="startTime">注册时间: </label>
                    <input type="datetime" class="form-control" id="startTime">
                </div>
                <div class="form-group">
                    <label for="endTime">-</label>
                    <input type="datetime" class="form-control" id="endTime">
                </div>
                <div class="form-group">
                    <label for="condif">&nbsp&nbsp&nbsp</label>
                    <input type="text" class="form-control" style="width: 400px;" id="condif" placeholder="请输入渠道名、公司名、联系人、手机号等关键词">
                </div>

                <button type="submit" class="btn btn-info">查询</button>
            </form>
            <table class="table table-bordered" style="margin-top: 30px;">
                <th>ID</th>
                <th>名称</th>
                <th>公司</th>
                <th>帐号</th>
                <th>联系人</th>
                <th>电话</th>
                <th>邮箱</th>
                <th>地区</th>
                <th>注册时间</th>
                <th>操作</th>
                <?php foreach ($data as $key => $v) { ?>
                    <tr>
                        <td><?php echo $v['id'] ?></td>
                        <td><?php echo $v['name'] ?></td>
                        <td><?php echo $v['company'] ?></td>
                        <td><?php echo $v['username'] ?></td>
                        <td><?php echo $v['contact'] ?></td>
                        <td><?php echo $v['phone'] ?></td>
                        <td><?php echo $v['email'] ?></td>
                        <td><?php echo $v['address'] ?></td>
                        <td><?php echo $v['created_time'] ?></td>
                        <td>
                            <a href="<?php echo Url::toRoute(['system/user-edit','u_id'=>$v['id']]); ?>">编辑</a>
                            <a href="<?php echo Url::toRoute(['system/user-desc','u_id'=>$v['id']]); ?>">详情</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>

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