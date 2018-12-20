<?php
session_start();
// Creación y configuración del lienzo
$alto = 120;
$ancho= 300;
$imagen = imagecreatetruecolor($ancho, $alto);
$blanco = imagecolorallocate($imagen, 255, 255, 255);
$azul = imagecolorallocate($imagen, 0, 0, 200);
$verde = imagecolorallocate($imagen, 0, 200, 0);
$string="";
// Se dibuja la imagen

$fuentes = array('arial','consola','verdana');
//ruta de la fuente en el sistema
$ruta = 'c:\windows\fonts\\';//ruta principal de las fuentes
$separacion = 80;
imagefill($imagen, 0, 0, $blanco);
for($i=0; $i<rand(4,6);$i++){
	$fuente = $ruta.$fuentes[rand(0,sizeof($fuentes)-1)].'.ttf';
	$string.= $letra=randomLetter();
	imagettftext($imagen, rand(20,27), rand(-45,45), $ancho/2-$separacion, $alto/2+10, $azul, $fuente, $letra);
	$separacion-=28;
}
function randomLetter(){		
	$texto ="ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz23456789";
	return $texto[rand(0,strlen($texto)-1)];
}
$_SESSION['Letra']=$string;

$lineas=rand(3,5);
for($i=0;$i<$lineas;$i++){
    imageline($imagen, rand(33,90), rand(30,90), rand(200,280) , rand(30,90), $verde);
    imagesetthickness($imagen, rand(1,3));
}
// Generación de la imagen.
header('content-type: image/png');
imagepng ($imagen);
// Liberamos la imagen de memoria.
imagedestroy($imagen);
?>