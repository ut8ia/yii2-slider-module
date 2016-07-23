<?php

namespace ut8ia\slidermodule\models;

use Yii;

/**
 * This is the model class for table "slides".
 *
 * @property integer $id
 * @property integer $slider_id
 * @property string $title
 * @property string $text
 * @property string $url
 * @property string $image
 * @property integer $priority
 */
class Slides extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slides';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slider_id', 'url', 'image', 'priority'], 'required'],
            [['slider_id', 'priority'], 'integer'],
            [['title', 'url', 'image'], 'string', 'max' => 255],
            [['text'], 'string', 'max' => 1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'slider_id' => Yii::t('app', 'Slider ID'),
            'title' => Yii::t('app', 'Title'),
            'text' => Yii::t('app', 'Text'),
            'url' => Yii::t('app', 'Url'),
            'image' => Yii::t('app', 'Image'),
            'priority' => Yii::t('app', 'Priority'),
        ];
    }
}
