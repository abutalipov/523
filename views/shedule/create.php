<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Shedule */

$this->title = 'Create Shedule';
$this->params['breadcrumbs'][] = ['label' => 'Shedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shedule-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
