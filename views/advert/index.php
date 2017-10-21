<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdvertSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $_nav? $nav:$nav_data[0]['resource_name'];
$this->params['breadcrumbs'][] = ['label' => '广告管理', 'url' => ['index','skip'=>1]];
$this->params['breadcrumbs'][] = $_nav? $nav:$nav_data[0]['resource_name'];
?>
<div class="advert-form-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<!--    --><?php //var_dump($nav_data); ?>
    <ol class="breadcrumb">
        <?php foreach ($nav_data as $key => $v) { ?>
         <li style="float:left"><?php echo $v['resource_name'] ?></li>
        <?php } ?>
    </ol>

    <p>
        <?= Html::a('添加广告', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'advert_user',
            'advert_own',
            'advert_place',
            // 'advert_group',
             'img_url:url',
            // 'link',
            // 'play_time:datetime',
            // 'stop_time:datetime',
             'pay_way',
            // 'play_total',
            // 'univalence',
            // 'status',
            // 'shelf_status',
            // 'sort',
            // 'created_time:datetime',
            // 'updated_time:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
