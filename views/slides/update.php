<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Slides */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Slides',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Slides'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="slides-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
