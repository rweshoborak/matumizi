<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Income */

$this->title = 'Update Income: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Incomes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'inc_is' => $model->inc_is]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="income-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
