<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PlanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idplan') ?>

    <?= $form->field($model, 'plansubject') ?>

    <?= $form->field($model, 'hours') ?>

    <?= $form->field($model, 'group_idgroup') ?>

    <?= $form->field($model, 'subject_idsubject') ?>

    <?php // echo $form->field($model, 'subject_type_subject_typeid') ?>

    <?php // echo $form->field($model, 'semester_idsemester') ?>

    <?php // echo $form->field($model, 'employee_idemployee') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
