<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Group */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'groupname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'groupyear')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'groupresposible')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direction_iddirection')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
