<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Shedule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shedule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'employee_idemployee')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subject_type_idsubject_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subject_idsubject')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
