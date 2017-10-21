<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AdvertForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advert-form-form">

    <?php $form = ActiveForm::begin([
        'fieldConfig'=>[
            'template'=> '
                     <label for="name" class="col-sm-2 control-label">{label}</label>
                    <div class="col-sm-10">{input}</div>
                    <div class="col-lg-4" style="margin-left:17%">{error}</div>
                            ',
            'inputOptions' => ['class' => 'form-control']
        ],
        'options' => ['class' => 'form-horizontal','enctype'=>"multipart/form-data" ],
    ]); ?>
    <?= $form->field($model, 'advert_place')->dropDownList(['1'=>'启动页广告','2'=>'播放前广告','3'=>'暂停时广告'], ['prompt'=>'请选择','style'=>'width:120px']) ?>
    <?= $form->field($model, 'img_url')->fileInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'play_time')->textInput() ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'advert_group')->checkboxList(['0'=>'篮球','1'=>'足球','2'=>'羽毛球','3'=>'乒乓球']) ?>

    <?= $form->field($model, 'advert_own')->dropDownList(['1'=>'大学','2'=>'高中','3'=>'初中'], ['prompt'=>'请选择','style'=>'width:120px']) ?>

    <?= $form->field($model, 'pay_way')->textInput() ?>

    <?= $form->field($model, 'stop_time')->textInput() ?>

    <?= $form->field($model, 'univalence')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class'=>'btn btn-primary','name' =>'submit-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
