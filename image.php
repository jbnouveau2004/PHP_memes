<?php
function hex2rgb($hex) {
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
	$rgb = array($r, $g, $b);
	return $rgb;
}

function genererChaineAleatoire($longueur = 10)
{
 $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $longueurMax = strlen($caracteres);
 $chaineAleatoire = '';
 for ($i = 0; $i < $longueur; $i++)
 {
 $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
 }
 return $chaineAleatoire;
}

$fichier_source = "image.jpg";
$im = imageCreateFromJpeg($fichier_source);
$rgb = hex2rgb($_GET['couleur']);
$color = imagecolorallocate($im, $rgb[0], $rgb[1], $rgb[2]);
// $color = imagecolorallocate($im, 0, 0, 255); // blue text
$font = 'Roboto-Regular.ttf';
if($_GET['police']=="roboto"){
    $font = 'Roboto.ttf';
}
if($_GET['police']=="dancing"){
    $font = 'Dancing.ttf';
}
if($_GET['police']=="silkscreen"){
    $font = 'Silkscreen.ttf';
}
$text = $_GET['texte'];
$size = $_GET['taille'] . '0';
$angle = '0';
$x = $_GET['x'];
$y = $_GET['y'];

imagettftext($im, $size, $angle, $x, $y, $color, $font, $text);
// Output the image
header("Content-type: image/png"); //format png
if(((isset($_GET['statut']))&&($_GET['statut']=="0"))||(!isset($_GET['statut']))){
imagepng($im);
}else{
$file = "" . genererChaineAleatoire() . ".png";
imagepng($im, $file);  
imagepng($im); 
}
imagedestroy($im);
?>