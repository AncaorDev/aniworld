<?php
$x=1;
$y=2;
function prueba() {
$x=9;
$y=4;
echo $x.' ';
echo $GLOBALS['x'].' ';
global $y;
echo $y;
$y = $x + $y;
echo " as \\p"+$y;
}
prueba();

?>
