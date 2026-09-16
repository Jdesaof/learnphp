<?php
 
for ($i=0; $i<10; $i++) {
    var_dump($i);
}

for ($i=9; $i>=0; $i--) {
    var_dump($i);
}

for($i=1; $i<1_000_000; $i*=2) {
    var_dump($i);
}

$time = time();
$count = 0;
while($time+1 > time()){
    $count++;
}
var_dump($count);

while (false) {
    var_dump('while');
}

do {
        var_dump('do');
    } while (false);

$fruits = ['apple', 'banana', 'cherry', 'pear'];

for ($i=0; $i<count($fruits); $i++) {
    var_dump($fruits[$i]);
}
foreach ($fruits as $fruit) {
    var_dump($fruit);
}

foreach($fruits as $key => $fruit) {
    var_dump($key, $fruit);
}

function recursive($i) {
    if ($i < 10) {
        var_dump($i);
        recursive($i+1);
    }
}
recursive(0);
?> 