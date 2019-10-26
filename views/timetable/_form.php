<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Plan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'plansubject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hours')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'group_idgroup')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subject_idsubject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subject_type_subject_typeid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'semester_idsemester')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employee_idemployee')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
