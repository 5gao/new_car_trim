<!DOCTYPE HTML>
<html lang="zh">
<?php use yii\helpers\Url; ?>
<?php use yii\widgets\ActiveForm; ?>
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
                <li class="active">广告管理</li>
                <li class="active">添加广告</li>
            </ol>
            <?php $form = ActiveForm::begin(['action' => ['advert/advert-data-add'],'method'=>'post','options' => ['enctype' => 'multipart/form-data']]
            ); ?>
<!--            <form class="form-horizontal" method="post" action="--><?php //echo Url::toRoute(['advert/advert-data-add']); ?><!--" enctype="multipart/form-data">-->

                <input type="hidden" name='up_id' value="0">
                <input type="hidden" name='rank' value="one">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">广告位</label>
                    <div class="col-sm-10">
                        <select name="advert_place" class="form-control" >
                            <option value="">请选择广告位</option>
                            <option value="1">启动页广告</option>
                            <option value="2">播放前广告</option>
                            <option value="3">暂停时广告</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="img_url" class="col-sm-2 control-label">广告图片</label>
                    <div class="col-sm-10">
                        <?= $form->field($model, 'imageFile')->fileInput() ?>
<!--                        <input type="file" name="img_url" class="form-control" id="img_url" placeholder="请上传图片">-->
                    </div>
                    <!--<div class="col-sm-10">
                        <span>上传</span>
                        <button type="button" class="btn btn-lg btn-danger" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">点我弹出/隐藏弹出框</button>
                    </div>
                    <input name="imgfile" type="file" id="imgfile" size="40" onchange="viewmypic(showimg,this.form.imgfile);" />
                    <br/>
                    <img name="showimg" id="showimg" src="" style="display:none;" alt="预览图片" />
                    <div style="display:none">
                    </div>-->
                </div>

                <!--<div class="form-group">
                    <label for="name" class="col-sm-2 control-label">图片上传二</label>
                    <div class="col-sm-10">
                    </div>
                    <span class="fileInputContainer" style="width: 150px; height: 130px;  float: left; margin-top: 20px;">
                            <input class="fileInput" onchange="upload()"  id="file" type="file" style="left:-10px;top:-10px;" name="">

                        </span>
                    <input type="text" id="img" style="visibility: hidden">

                    <div class="op-goodsText" style="display: none;">
                        <p class="opText">*</p>
                        <p>上传图片格式不符合规范,请上传符合规范的图片</p>
                        <p>格式jpg.gif且图片小于3M</p>
                    </div>
                </div>-->
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">广告名称</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="name" placeholder="请输入广告名称">
                    </div>
                </div>
                <div class="form-group">
                    <label for="link" class="col-sm-2 control-label">广告链接</label>
                    <div class="col-sm-10">
                        <input type="text" name="link" class="form-control" id="link" placeholder="请输入广告链接">
                    </div>
                </div>
                <div class="form-group">
                    <label for="play_time" class="col-sm-2 control-label">保持时间</label>
                    <div class="col-sm-10">
                        <input type="text" name="play_time" class="form-control" id="play_time" placeholder="请输入播放的时长">
                    </div>
                </div>
                <div class="form-group">
                    <label for="advert_group" class="col-sm-2 control-label">分组</label>
                    <div class="col-sm-10">
                        <input type="radio" name="advert_group" class="for-control" value="1">分组1
                        <input type="radio" name="advert_group" class="for-control" value="2">分组2
                        <input type="radio" name="advert_group" class="for-control" value="3">分组3
                        <input type="radio" name="advert_group" class="for-control" value="4">分组4
                        <input type="radio" name="advert_group" class="for-control" value="5">分组5
                        <input type="radio" name="advert_group" class="for-control" value="6">分组6
                    </div>
                </div>
                <div class="form-group">
                    <label for="advert_own" class="col-sm-2 control-label">广告主</label>
                    <div class="col-sm-10">
                        <select name="advert_own" class="form-control" >
                            <option value="">请选择广告主</option>
                            <option value="1">东鹏</option>
                            <option value="2">奔驰</option>
                            <option value="3">宝马</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="pay_way" class="col-sm-2 control-label">计费方式</label>
                    <div class="col-sm-10">
                        <input type="radio" name="pay_way" class="for-control" value="1">时长计费
                        <input type="radio" name="pay_way" class="for-control" value="2">效果计费
<!--                        <input type="text" name="pay_way" class="form-control" id="pay_way" placeholder="请输入邮箱地址">-->
                    </div>
                </div>
                <div class="form-group">
                    <label for="stop_time" class="col-sm-2 control-label">截止时间</label>
                    <div class="col-sm-10">
                        <input type="text" name="stop_time" class="form-control" id="stop_time" placeholder="选择截止时间">
                    </div>
                </div>
                <div class="form-group">
                    <label for="univalence" class="col-sm-2 control-label">单价</label>
                    <div class="col-sm-10">
                        <input type="text" name="univalence" class="form-control" id="univalence" placeholder="请输入单价">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-info">提交</button>
                        <button type="submit" class="btn btn-info">取消</button>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>


        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
<script src="../../static/js/bootstrap-datetimepicker.js"></script>
<script src="../../static/js/bootstrap.js"></script>
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
    /*$(function () {
        $('[data-toggle="popover"]').popover()
    })*/
    function viewmypic(mypic,imgfile) {
        if (imgfile.value){
            mypic.src=imgfile.value;
            mypic.style.display="";
            mypic.border=1;
        }
    }

    $(function(){
        /*function upload(){

            var windowURL = window.URL || window.webkitURL;
            var loadImg = windowURL.createObjectURL(document.getElementById('file').files[0]);
            $(".fileInputContainer").css("background-image","url"+"("+loadImg+")");
            var fileObj = document.getElementById("file").files[0]; // js 获取文件对象
            var FileController = "/api/upload.do";           // 接收上传文件的后台地址
            // FormData 对象
            var form = new FormData();
            form.append("file", fileObj);
            var xhr = new XMLHttpRequest();
            if(!fileObj){
                return;
            }
            xhr.open("post", FileController, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && /^2\d{2}$/.test(xhr.status)) {
                    var str = eval('(' + xhr.responseText + ')');//->接收后台返回的JSON格式的字符串的数据
                    //console.log(str);
                    if(parseInt(str.status) ==0){
                        alert('数据导入失败');
                    }else if(parseInt(str.status) !=1){
                        alert('系统发生错误');
                    }else {
                        console.log(str);
                        var img = str.data.url;
                        console.log(img);
                        $('#img').val(img);
                    }
                }
            };
            xhr.onload = function () {
                // alert("上传完成!");
            };
//        xhr.upload.addEventListener("progress", progressFunction, false);
            xhr.send(form);

        }*/
    })
</script>
</body>

</html>