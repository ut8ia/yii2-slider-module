<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SlidersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sliders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sliders-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a(Yii::t('app', 'Create Sliders'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete} ',
                'contentOptions' => ['class' => 'col-sm-1 text-right', 'nowrap' => 'nowrap'],
            ],

            [
                'contentOptions' => ['class' => 'col-sm-1 small text-center'],
                'attribute' => 'ID',
                'format' => 'html',
                'value' => function($model) {
                    return $model->id;
                },
            ],
            [
                'contentOptions' => ['class' => 'col-sm-9 small text-center'],
                'attribute' => 'Name',
                'format' => 'html',
                'value' => function($model) {
                    return $model->name;
                },
            ]
        ],
    ]); ?>
</div>
