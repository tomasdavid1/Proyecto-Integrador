<?php
$numero ="34";
$numerodecimal="3.14";
$caracterd="A";
$caracters='B';
$stringsimple='Hola';
$stringdoble="Como va";

$numero="Cadena";
$stringsimple="5.4";

echo $numero;
echo '<br>';
echo $numerodecimal;
echo '<br>';
echo $caracterd;
echo '<br>';
echo $caracters;
echo '<br>';
echo $stringsimple;
echo '<br>';
echo $stringdoble;
echo '<br>';
echo '<br>';

var_dump($numero);
echo '<br>';
var_dump($numerodecimal);
echo '<br>';
var_dump($caracterd);
echo '<br>';
var_dump($caracters);
echo '<br>';
var_dump($stringsimple);
echo '<br>';
var_dump($stringdoble);

echo'<br>';
$array=[];
$array[0]="Perro";
echo'<br>';
$array[1]="Gato";
echo'<br>';
$array[2]="Pez";
echo'<br>';
$array[3]="Oso";
echo'<br>';
$array[4]="Elefante";

var_dump($array);
$array[]="Pajaro";
$array[]="Pulpo";
echo'<br>';
var_dump($array);
echo'<br>';
echo "Me gustan los animales $array[0] $array[1] $array[2]";

// echo 'Me gustan los animales' . $array;
 ?>
