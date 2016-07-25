<?php

namespace ut8ia\slidermodule\assets;
use yii\web\AssetBundle;

class SlidersFormAsset extends AssetBundle
{
    public $sourcePath = '@vendor/ut8ia/yii2-slider-module/assets';

    public $css = [
        'css/sliders_form.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
    ];
}
