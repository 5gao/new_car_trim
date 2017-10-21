<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AdvertForm */

$this->title = '添加广告';
$this->params['breadcrumbs'][] = ['label' => '广告管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advert-form-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
