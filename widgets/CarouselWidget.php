<?php

namespace ut8ia\slidermodule\widgets;

use yii\base\Widget;
use ut8ia\slidermodule\models\Sliders;
use ut8ia\slidermodule\models\Slides;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use Yii;

class CarouselWidget extends Widget
{

    public $sliderId;
    public $slides;
    public $mode;
    public $template;
    public $lang_id;
    public $showAlt;
    public $slideDuration;
    public $slideDurationDefault = 3000;

    public function run()
    {
        switch ($this->mode) {
            case 'slider':
                $this->prepareSliderData();
                break;
            case 'images':
                $this->prepareImagesData();
                break;
        }

        $this->slideDuration = ($this->slideDuration) ? $this->slideDuration : $this->slideDurationDefault;

        switch ($this->template) {
            case 'header':
                $method = 'makeHeader';
                break;
            case 'single':
                $method = 'makeSingle';
                break;
            default:
                $method = 'devnull';
        }

        return $this->$method ();
    }

    public function prepareSliderData()
    {
        $obj = new Slides();
        $slides = $obj->bySliderId($this->sliderId,$this->lang_id);

        // exit if slider not exist
        if (empty($slides)) {
            return null;
        };

        $this->slideDuration = ($slides[0]['slider']['slide_duration']) ? $slides[0]['slider']['slide_duration'] : $this->slideDurationDefault;
        $this->slides = $slides;
    }

    public function prepareImagesData()
    {

        $items = $this->slides;
        if (empty($items)) {
            return null;
        }
        $c = 0;
        foreach ($items as $item) {
            $out[$c]['image'] = $item['src'];
            if ($this->showAlt and isset($item['alt'])) {
                $out[$c]['image'] = $item['alt'];
            }
            $c++;
        }
        $this->slides = $out;

    }


    public function devnull()
    {
        return null;
    }

    public function makeHeader()
    {

        $navItems = '';
        $slideItems = '';
        $c = 0;
        $activeTrigger = 'item active';
        $activeNavTrigger = 'class="active"';
        foreach ($this->slides as $slide) {
            $navItems .= '<li data-target="#myCarousel" data-slide-to="' . $c . '" ' . $activeNavTrigger . '></li>';
            $text = (!empty($slide['text'])) ? '<h4>' . $slide['text'] . '</h4>' : '';
            $slideItem = '<div class="fill" style="background-image:url(\'' . $slide['image'] . '\');"></div>
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

        return $this->render('HeaderSlider', ['navItems' => $navItems, 'slideItems' => $slideItems, 'duration' =>$this->slideDuration]);
    }

    public function makeSingle()
    {
        $navItems = '';
        $slideItems = '';
        $c = 0;
        $activeTrigger = 'item active';
        $activeNavTrigger = 'class="active"';
        foreach ($this->slides as $slide) {
            $navItems .= '
            <li data-target="#myCarousel" data-slide-to="' . $c . '" ' . $activeNavTrigger . '></li>';
            $slideItem = '
            <img style ="width:100%" src="' . $slide['image'] . '">';

            // slide wrapper
            $slideItems .= '
            <div class="' . $activeTrigger . '">' . $slideItem . '
            </div>';
            $c++;
            $activeTrigger = 'item';
            $activeNavTrigger = '';
        }

        return $this->render('SingleSlider', ['navItems' => $navItems, 'slideItems' => $slideItems, 'duration' => $this->slideDuration ]);
    }

}