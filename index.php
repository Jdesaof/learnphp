<?php
/*$numbers = array(1,2,3); //old way
$numbers = [1,2,3]; //new way
$numbers[2] = 5;   
var_dump($numbers[2]);
$test = [1, 'test', true, [1, 2, 3]];
var_dump($test);
var_dump($test[3][1]);
*/
$test = [
    'name' => 'Papa',
    'age' => 27,
    'city' => 'Pizzeria',
    1,
    2,
    3,
    'color' => 'brown',
    100 => 6,
    7,
];
var_dump($test);

$combined = [1,2,3] + [4,5,6,7];
var_dump($combined);
//var_dump($test['name']);

$text = implode('-', $test);
var_dump($text);

array_push($test, 67, 'Poopoo');
var_dump($test);

$test[] = 'new value';
unset($test[100]);
var_dump($test);
?>
