<?php

namespace ut8ia\slidermodule\models;

use ut8ia\slidermodule\models\Slides;
use Yii;

/**
 * This is the model class for table "sliders".
 *
 * @property integer $id
 * @property string $name
 * @property string $slide_duration
 * @property Slides
 */
class Sliders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slidermanager_sliders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['slide_duration'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'slide_duration' => Yii::t('app', 'Slide duration'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlides()
    {
        return $this->hasMany(Slides::class, ['slider_id' => 'id']);
    }




}
