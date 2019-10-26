<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Shedule */

$this->title = 'Update Shedule: ' . $model->idshedule;
$this->params['breadcrumbs'][] = ['label' => 'Shedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idshedule, 'url' => ['view', 'id' => $model->idshedule]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shedule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
