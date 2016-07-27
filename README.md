# yii2-slider-module
slider functionality 
- administration
- frontend widget for show

**installing **
add into composer.json
~~~
 "ut8ia/yii2-slider-module":"*"
 ~~~
 
 **configuration  **
 add into 'modules' section in your config file 
 
 ~~~
     'modules' => [
         'sliders' =>[
             'class' => 'ut8ia\slidermodule\SliderModule'
         ]
     ],
 ~~~
 
 
 ** requirements **
 - http://github.com/pendalf89/yii2-filemanager
 
 
 ** recomended **
 - http://github.com/ut8ia/yii2-adminmenu
 section for config menu , group 1 - for exemple , look adminmenu config
 ~~~
 
                 1 => [
                     'name' => 'Слайдеры',
                     'items' => [
                         1 => [
                             'module'=>'sliders',
                             'controller' => 'sliders',
                             'url' => 'index',
                             'name' => 'Слайдеры'],
                         2 => [
                             'module'=>'sliders',
                             'controller' => 'slides',
                             'url' => 'index',
                             'name' => 'Слайды'],
                     ]
                 ],
 ~~~
 
 
 
 ** usage **
 add in your front- end page view 
 ~~~
 <?php 
 use ut8ia\slidermodule\widgets\CarouselWidget;
 ?>
 
 <?php   echo CarouselWidget::widget(['sliderId'=>1]); ?>
 
 ~~~