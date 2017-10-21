<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AdvertForm */

$this->title = 'Update Advert Form: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Advert Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="advert-form-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
