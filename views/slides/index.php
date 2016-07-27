<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use ut8ia\slidermodule\assets\SlidersAdminAsset;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SlidesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Slides');
$this->params['breadcrumbs'][] = $this->title;
SlidersAdminAsset::register($this);
?>
<div class="slides-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function($action, $model) {
                    return Url::toRoute(['slides/' . $action, 'id' => $model->id]);
                },
                'template' => '{update} <br> {delete} ',
                'contentOptions' => ['class' => 'text-left', 'nowrap' => 'nowrap'],
            ],
            [
                'contentOptions' => ['class' => 'col-sm-4 text-center'],
                'attribute' => 'Image',
                'format' => 'html',
                'value' => function($model) {
                    return Html::img($model->image,['class'=>'image_preview']);
                },
            ],
            [
                'contentOptions' => ['class' => 'col-sm-8 text-center'],
                'attribute' => 'Info',
                'format' => 'html',
                'value' => function($model) {
                    return $model->title;
                }
            ],

        ],
    ]); ?>
</div>
