<?php
 
/* function hello(): void {
    var_dump('hello');
}
 
var_dump(hello());
hello();
 
function helloname($name = 'Nameless', $age = 0) {
    var_dump("hello, $name! You are $age years old");
}
 
helloname('misha', 18);
 
function square(int $a): ?int {
    if ($a < 0) {
        return null;
    }
    return $a * $a;
 
}
 
$answer = square(-4);
$answer = square(4);
var_dump($answer);
var_dump(square(5)); */
 
$num = 10;
if ($num > 5) {
    var_dump('Bigger');
} else if ($num < 5) {
    var_dump('Smaller');
} else {
    var_dump('Equal');
}
$day = (int)date('w');
var_dump($day);

if ($day === 0) {
    var_dump('Sunday');
} else if ($day === 1) {
    var_dump('Monday');
} else if ($day === 2) {
    var_dump('Tuesday');
}
  else if ($day === 3) {
    var_dump('Wednesday');
} else if ($day === 4) {
    var_dump('Thursday');
} else if ($day === 5) {
    var_dump('Friday');
} else if ($day === 6) {
    var_dump('Saturday');
} else if ($day === 7) {
    var_dump('Weirdday');
}

switch ($day) {
    case 0:
        var_dump('Sunday');
        break;
    case 1:
        var_dump('Monday');
        break;
    default:
        var_dump('Tuesday');
    case 3:
        var_dump('Wednesday');
        break;
    case 4:
        var_dump('Thursday');
        break;
    case 5:
        var_dump('Friday');
        break;
    case 6:
        var_dump('Saturday');
        break;
    case 7:
        var_dump('Weirdday');
        break;
}
?> 