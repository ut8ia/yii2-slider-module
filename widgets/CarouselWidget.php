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
    public $slides;
    public $mode;
    public $slideDuration;
    public $slideDurationDefault = 3000;

    public function run()
    {
        switch($this->mode){
            case 'slider':
                $method = 'bySlider';
                break;
            case 'images':
                $method = 'byImages';
                break;
            default:
                $method ='devnull';
        }

       return $this->$method ();
    }

    public function devnull()
    {
        return null;
    }

    public function bySlider(){
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

        $duration = ($slider->slide_duration)?$slider->slide_duration:$this->slideDurationDefault;
        return $this->render('HeaderSlider',['navItems'=>$navItems,'slideItems'=>$slideItems ,'duration'=>$duration]);
    }

    public function byImages(){
        $navItems = '';
        $slideItems = '';
        $c = 0;
        $activeTrigger = 'item active';
        $activeNavTrigger = 'class="active"';
        foreach ($this->slides as $slide) {
            $navItems .= '
            <li data-target="#myCarousel" data-slide-to="' . $c . '" ' . $activeNavTrigger . '></li>';
            $slideItem = '
            <img style ="width:100%" src="' . Url::home(true) . $slide['src'] . '">';

            // slide wrapper
            $slideItems .= '
            <div class="' . $activeTrigger . '">' . $slideItem . '
            </div>';
            $c++;
            $activeTrigger = 'item';
            $activeNavTrigger = '';
        }

        $duration = ($this->slideDuration)?$this->slideDuration:$this->slideDurationDefault;
       return $this->render('SingleSlider',['navItems'=>$navItems,'slideItems'=>$slideItems ,'duration'=>$duration]);
    }

}