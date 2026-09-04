<?php
$test = "Govno";
$test = "Bububu" . "Bebebe";
$test .= "Rowr";
$name = "Churka";
$age = 6;
$test = $name. ' is ' . $age . ' years old';
$test = "$name is $age years old";
$test = "lele\n\nlala";
$test = <<<END
cool stuff here
multi line
END;
var_dump($test);
?>