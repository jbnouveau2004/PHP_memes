<?php	
require_once 'captcha.php';
$chemin = "localhost/meme/img/";

// choix d'afficher l'image ou générer le lien
function resultat($a, $chemin, $liste_questions, $im){
	if($_POST['choix']!="true"){
		ob_start();
		imagepng($im);
		$outputBuffer = ob_get_clean();
		$base64 = base64_encode($outputBuffer);
		echo '<img src="data:image/png;base64,'.$base64.'" />';
		imagedestroy($im);
		}else{
			session_start();
			$id_question_posee = $_SESSION['captcha']['id_question_posee'];
			if(in_array($_POST['captcha_reponse' . $a], $liste_questions[$id_question_posee]['reponses'])){
		$nomfichier = "image" . genererChaineAleatoire() . ".png";
		$file = "./img/" . $nomfichier;
		imagepng($im, $file);  
		imagedestroy($im);
		echo $chemin . $nomfichier;
			}else{echo "Vous avez répondu '" . $_POST['captcha_reponse'. $a] . "' à la question captcha, ce n'est pas une bonne réponse. Traitement annulé";}
			
			relance_captcha($liste_questions);
		}
}

// relancer les captchas suivants
function relance_captcha($liste_questions){
	$id_question_posee = array_rand($liste_questions);
	$_SESSION['captcha']['id_question_posee'] = $id_question_posee;
	echo "<div id='question'>" . $liste_questions[$id_question_posee]['question'] . '</div>';

}

// conversion #000000 en RGB
function hex2rgb($hex) {
		$r = hexdec(substr($hex,1,2));
		$g = hexdec(substr($hex,3,2));
		$b = hexdec(substr($hex,5,2));
	$rgb = array($r, $g, $b);
	return $rgb;
}

// génération de 10 caractères aléatoires
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


//-----------------choix image---------------------------
$fichier_source = "./assets/img/image1.jpg";
if($_POST['un']=="true"){
	$fichier_source = "./assets/img/image1.jpg";
}else if($_POST['deux']=="true"){
	$fichier_source = "./assets/img/image2.jpg";
}else if($_POST['trois']=="true"){
	$fichier_source = "./assets/img/image3.jpg";
}else if($_POST['quatre']=="true"){
	$fichier_source = "./assets/img/image4.jpg";
}else if($_POST['cinq']=="true"){
	$fichier_source = "./assets/img/image5.jpg";
}else if($_POST['six']=="true"){
	$fichier_source = "./assets/img/image6.jpg";
}


$im = imageCreateFromJpeg($fichier_source);
$rgb = hex2rgb($_POST['couleur']);
$color = imagecolorallocate($im, $rgb[0], $rgb[1], $rgb[2]);
$font = './assets/fonts/impact.ttf';
if($_POST['roboto']=="true"){
    $font = './assets/fonts/roboto.ttf';
}else if($_POST['dancing']=="true"){
    $font = './assets/fonts/dancing.ttf';
}else if($_POST['silkscreen']=="true"){
    $font = './assets/fonts/silkscreen.ttf';
}

$text = $_POST['texte'];
$size = $_POST['taille'] . '0';
$angle = '0';
if($_POST['x']==""){$x=0;}else{
$x = $_POST['x'];
}
if($_POST['y']==""){$y=0;}else{
$y = $_POST['y'];
}

imagettftext($im, $size, $angle, $x, $y, $color, $font, $text);
// Output the image
header("Content-type: image/png"); //format png

// -----------------si premier CAPTCHA ou pas-------------------
if(isset($_POST['captcha_reponse'])){
resultat($a="", $chemin, $liste_questions, $im);
}else{
	resultat($a="2", $chemin, $liste_questions, $im);
}

?>