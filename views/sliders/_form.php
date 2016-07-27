<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\grid\GridView;
use ut8ia\slidermodule\models\Slides;
use yii\data\ActiveDataProvider;
use ut8ia\slidermodule\assets\SlidersAdminAsset;

/* @var $this yii\web\View */
/* @var $model common\models\Sliders */
/* @var $form yii\widgets\ActiveForm */

SlidersAdminAsset::register($this);

?>

<div class="sliders-form">


    <?php
    $form = ActiveForm::begin([
        'enableClientValidation' => false,
        'options' => ['class' => 'form-horizontal', 'style' => 'padding-left:0px;'],
        'fieldConfig' => [
            'template' => '<div class="col-lg-2">{label}</div><div class="col-lg-10">{input}{error}</div>',
            'labelOptions' => ['style' => 'font-weight: lighter;'],
            'inputOptions' => ['class' => 'form-control'],
        ],
    ]);
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'slide_duration')->textInput(['maxlength' => true]) ?>
    <hr>
    <div class="form-group row">
        <div class="col-lg-2"><?php echo Yii::t('main', 'Slides'); ?></div>
        <div class="col-lg-10">
            <?php

            $slidesDataProvider = new ActiveDataProvider([
                'query' => Slides::find()->where(['=', 'slider_id', $model->id]),
            ]);

            echo GridView::widget([
                'dataProvider' => $slidesDataProvider,

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
            ]);
            ?>

        </div>
    </div>

    <hr>
    <?= Html::a('new slide', Url::toRoute(['slides/create', 'slider_id' => $model->id]), ['class' => 'btn btn-success']); ?>
    <hr>
    <div class="form-group">
        <div class="col-sm-12">
            <?= Html::submitButton(
                $model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
                ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
            ) ?>
            <?= Html::a(Yii::t('main', 'Back'), Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
