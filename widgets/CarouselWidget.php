<?php

namespace ut8ia\slidermodule\widgets;

use yii\base\Widget;
use ut8ia\slidermodule\models\Sliders;
use Yii;


class CarouselWidget extends Widget
{

    public $sliderId;

    public function run()
    {
        $obj = new Sliders();
        $slider = $obj->byId($this->sliderId);

        echo '
<!-- Header Carousel -->
<header id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <a href="http://111.ru">
                <div class="fill"
                     style="background-image:url(\'http://s0.tchkcdn.com/g2-drFBfZ0S3RNSCpz1S5AJgg/news/660x480/f/1/1-5-6-1-27561/2a5eb908e28aae6cc3024abce4f1d23e_laz_0359.jpg\');"></div>
                <div class="carousel-caption">
                    <h2>Реабилитация детей с органическими поражениями</h2>
                </div>
            </a>
        </div>
        <div class="item">
            <div class="fill"
                 style="background-image:url(\'http://s0.tchkcdn.com/g2-3TlPkZibcCw62b8rTaNQ7Q/news/640x0/w/1/1-5-6-1-27561/f230e9f30fbf424ea6259dc1fb7aebbf_laz_0371.jpg\');"></div>
            <div class="carousel-caption">
                <h2>Консультативный приём</h2>
            </div>
        </div>
        <div class="item">
            <div class="fill"
                 style="background-image:url(\'http://s0.tchkcdn.com/g2-F8UhEL2lFJJywv4ClQWcqg/news/640x0/w/1/1-5-6-1-27561/1418e6515bde6340e3004abce9917e36_laz_0488.jpg\');"></div>
            <div class="carousel-caption">
                <h2>Образовательные семинары</h2>
            </div>
        </div>
        <div class="item">
            <div class="fill"
                 style="background-image:url(\'http://s0.tchkcdn.com/g2-UoOBhD_79_ANQ0uARiEW8Q/news/640x0/w/1/1-5-6-1-27561/13fb4008984a2e727fda9b3a05273eb4_laz_0525.jpg\');"></div>
            <div class="carousel-caption">
                <h2>Функциональная диагностика</h2>
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</header>';


    }


}