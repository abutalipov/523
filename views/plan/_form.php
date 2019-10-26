<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Plan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plan-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'hours')->textInput(['maxlength' => true])->label('Количество часов') ?>

    <?= $form->field($model, 'group_idgroup')->dropDownList(ArrayHelper::map(\app\models\Group::getAllName(), 'idgroup', 'groupname'),
        [
            'prompt' => 'Выбрать группу',
            'id' => 'group_idgroup',

        ])->label('Группа')
    ?>
    <?= $form->field($model, 'subject_idsubject')->dropDownList(ArrayHelper::map(\app\models\Subject::getAllName(), 'idsubject', 'subjectname'),
        [
            'prompt' => 'Выбрать дисциплину',
            'id' => 'subject_idsubject',

        ])->label('Дисциплина')
    ?>

    <?= $form->field($model, 'subject_type_subject_typeid')->dropDownList(ArrayHelper::map(\app\models\SubjectType::getAllName(), 'idsubject_type', 'subject_typename'),
        [
            'prompt' => 'Выбрать тип дисциплины',
            'id' => 'subject_type_subject_typeid',

        ])->label('Тип занятия')
    ?>

    <?= $form->field($model, 'semester_idsemester')->dropDownList(ArrayHelper::map(\app\models\Semester::getAllName(), 'idsemester', 'semestername'),
        [
            'prompt' => 'Выбрать симместр',
            'id' => 'semester_idsemester',

        ])->label('Симместр')
    ?>

    <?= $form->field($model, 'employee_idemployee')->dropDownList(ArrayHelper::map(\app\models\Employee::getAllName(), 'idemployee', 'employeesurname'),
        [
            'prompt' => 'Выбрать преподавателя',
            'id' => 'employee_idemployee',

        ])->label('Преподаватель')
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
