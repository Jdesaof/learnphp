<?php
 class Box {
    public $width;
    public $length;
    public $height;

    public function volume() {
        return $this->width * $this->length * $this->height;
    }
 }

 $box1 = new Box();
 $box1->width = 5;
 $box1->length = 10;
 $box1->height = 15;
 var_dump($box1, $box1->volume());

 $box2 = new Box();
 $box2->width = 3;
 $box2->length = 4;
 $box2->height = 5;
 var_dump($box2, $box2->volume());
?> 