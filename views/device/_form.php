<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DeviceForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="device-form-form">

    <?php $form = ActiveForm::begin([
        /*'fieldConfig'=>[
            'template'=> '<div class=\"col-lg-3 control-label color666 fontweight\">{label}:</div>
                                                    <div class="col-lg-5" style="padding-left: 15px;padding-right: 15px;">{input}</div>
                                                    <div class=\"col-lg-4\">{error}</div>',
            'inputOptions' => ['class' => 'form-control']
        ]*/
        'fieldConfig'=>[
            'template'=> '
                     <label for="name" class="col-sm-2 control-label">{label}</label>
                    <div class="col-sm-10">{input}</div>
                    <div class="col-lg-4" style="margin-left:17%">{error}</div>
                            ',
            'inputOptions' => ['class' => 'form-control']
        ],
        'options' => ['class' => 'form-horizontal','enctype'=>"multipart/form-data" ],
        /*'fieldConfig'=>[
            'template'=>'<div class="form-group" style="margin-top: 20px">
                            <label for="name" class="col-sm-2 control-label">{label}</label>
                            <div class="col-sm-10" style="padding-left: 15px;padding-right: 50px;">
                                {input}
                            </div>

                        </div>'
        ]*/
        /*'fieldConfig' => [
        'template' => '<div class="col-lg-3 control-label color666 fontweight" style="text-align:left">{label}:</div>
                                                    <div class="col-lg-6" style="padding-left: 15px;padding-right: 15px;">{input}</div>
                                                    <div class="col-lg-3">{error}</div>',
        'inputOptions' => ['class' => 'form-control'],
        ],
        'options' => ['class' => 'form-horizontal t-margin20','enctype'=>"multipart/form-data" ],*/
    ]); ?>



    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mac')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'device_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'device_ver')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'group')->textInput() ?>

    <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class'=>'btn btn-primary','name' =>'submit-button']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
