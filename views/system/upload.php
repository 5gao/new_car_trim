<?php
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'imageFile')->fileInput() ?>
    <input type="text" name="username" class="form-control" id="play_time" placeholder="请输入播放的时长">
    <input type="text" name="password" class="form-control" id="play_time" placeholder="请输入播放的时长">
    <input type="text" name="play_time" class="form-control" id="play_time" placeholder="请输入播放的时长">

    <button>Submit</button>

<?php ActiveForm::end() ?>