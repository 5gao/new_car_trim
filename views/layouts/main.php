<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width,inital-scale=1.0,minimum-scale=0.5,maximum-scale=2.0,user-scalable=no">

    <title>黔艺汽车内饰</title>

    <!-- Bootstrap core CSS -->
    <link href="../../static/css/bootstrap.min.css" rel="stylesheet">

    <!--时间选择css-->
    <link href="../../static/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <!--基础样式-->
    <link href="../../static/css/base.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../static/css/channellist.css" rel="stylesheet">

    <!--自定义样式-->
    <link href="../../static/css/define.css" rel="stylesheet">

    <script src="../../static/js/jquery/jquery-3.1.1.min.js"></script>
    <script src="../../static/js/bootstrap-datetimepicker.js"></script>
    <script src="../../static/js/sidebar-menu.js"></script>
    <script src="../../static/js/index.js"></script>
</head>

<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="container" style="background-color: #00b3ee">
        <h3><span>黔艺汽车内饰</span></h3>
    </div>
    <!--导航条-->
    <div class="container " style="height: 30px;">
        <div class="float_left margin_right_50"><a href="#"><span>首页</span></a></div>
        <div class="float_left margin_right_50"><a href="#"><span>公司简介</span></a></div>
        <div class="float_left margin_right_50"><a href="#"><span>产品</span></a></div>

    </div>

    <!--<ul class="sidebar-menu sidebar" style="width: 200px;" id="nav">

    </ul>-->
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>

    <!--<footer id="footer">
        <div class="container">
            <p >&copy; <?/*= date('Y') */?>  黔艺汽车内饰 <span>黔ICP135970</span> </p>

        </div>
    </footer>-->

</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


