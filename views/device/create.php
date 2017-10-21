<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DeviceForm */

$this->title = '添加设备';
$this->params['breadcrumbs'][] = ['label' => '设备管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="device-form-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
