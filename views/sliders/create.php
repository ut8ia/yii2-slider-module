<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Sliders */

$this->title = Yii::t('app', 'Create Sliders');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sliders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sliders-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
