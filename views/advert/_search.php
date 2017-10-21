<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AdvertSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advert-form-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'advert_user') ?>

    <?= $form->field($model, 'advert_own') ?>

    <?= $form->field($model, 'advert_place') ?>

    <?php // echo $form->field($model, 'advert_group') ?>

    <?php // echo $form->field($model, 'img_url') ?>

    <?php // echo $form->field($model, 'link') ?>

    <?php // echo $form->field($model, 'play_time') ?>

    <?php // echo $form->field($model, 'stop_time') ?>

    <?php // echo $form->field($model, 'pay_way') ?>

    <?php // echo $form->field($model, 'play_total') ?>

    <?php // echo $form->field($model, 'univalence') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'shelf_status') ?>

    <?php // echo $form->field($model, 'sort') ?>

    <?php // echo $form->field($model, 'created_time') ?>

    <?php // echo $form->field($model, 'updated_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
