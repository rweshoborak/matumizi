<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Expenditure */

$this->title = 'Update Expenditure: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Expenditures', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'exp_id' => $model->exp_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="expenditure-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
