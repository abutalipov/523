<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shedules';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shedule-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Shedule', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idshedule',
            'employee_idemployee',
            'subject_type_idsubject_type',
            'group_idgroup',
            'subject_idsubject',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
