<?php

namespace ut8ia\slidermodule\widgets;

use yii\base\Widget;
use ut8ia\slidermodule\models\Sliders;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use Yii;

class CarouselWidget extends Widget
{

    public $sliderId;

    public function run()
    {
        $obj = new Sliders();
        $slider = $obj->byId($this->sliderId);

        // exit if slider not exist
        if (!$slider) {
            return null;
        };

        // exit on empty slider
        if (empty($slides = ArrayHelper::toArray($slider->slides))) {
            return null;
        }

        $navItems = '';
        $slideItems = '';
        $c = 0;
        $activeTrigger = 'item active';
        $activeNavTrigger = 'class="active"';
        foreach ($slides as $slide) {
            $navItems .= '<li data-target="#myCarousel" data-slide-to="' . $c . '" ' . $activeNavTrigger . '></li>';
            $text = (!empty($slide['text'])) ? '<h4>' . $slide['text'] . '</h4>' : '';
            $slideItem = '<div class="fill" style="background-image:url(\'' . Url::home(true) . $slide['image'] . '\');"></div>
                <div class="carousel-caption">
                    <h2>' . $slide['title'] . '</h2>
                    ' . $text . '
                </div>';

            // wrap into ancor if not empty
            if (!empty($slide['url'])) {
                $slideItem = '<a href="' . Url::to($slide['url']) . '">' . $slideItem . '</a>';
            }
            // slide wrapper
            $slideItems .= '<div class="' . $activeTrigger . '">' . $slideItem . '</div>';
            $c++;
            $activeTrigger = 'item';
            $activeNavTrigger = '';
        }

        $this->renderMe($navItems,$slideItems,$slider->slide_duration);
    }



    public function renderMe($navItems,$slideItems,$duration){

        echo '
<!-- Header Carousel -->
<header id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">' . $navItems . '</ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
' . $slideItems . '
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
    <input type="hidden" id="slide_duration" value="'.$duration.'">
</header>';

    }
}