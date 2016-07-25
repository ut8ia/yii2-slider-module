<?php

namespace ut8ia\slidermodule\models;

use Yii;
use ut8ia\slidermodule\models\Slides;

/**
 * This is the model class for table "sliders".
 *
 * @property integer $id
 * @property string $name
 * @property Slides
 */
class Sliders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sliders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
