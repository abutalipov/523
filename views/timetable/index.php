<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Plans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Plan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idplan',
            'plansubject',
            'hours',
            'group_idgroup',
            'subject_idsubject',
            //'subject_type_subject_typeid',
            //'semester_idsemester',
            //'employee_idemployee',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
