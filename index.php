<?php
require_once 'captcha.php';
$chemin = "localhost/meme/img/";

	
session_start();
$id_question_posee = array_rand($liste_questions);
$_SESSION['captcha']['id_question_posee'] = $id_question_posee;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="main.js" defer></script>
    <title>Document</title>
</head>
<body>
<div class="container">

<div id="image">
<img src="image.php">
</div>


<div class="parametres">
<label for="1"><img style="width: 50px;" src="./assets/img/image1.jpg"></label><input type="radio" name="image" id="un" checked>
<label for="2"><img style="width: 50px;" src="./assets/img/image2.jpg"></label><input type="radio" name="image" id="deux">
<label for="3"><img style="width: 50px;" src="./assets/img/image3.jpg"></label><input type="radio" name="image" id="trois"> 
<label for="4"><img style="width: 50px;" src="./assets/img/image4.jpg"></label><input type="radio" name="image" id="quatre">
<label for="5"><img style="width: 50px;" src="./assets/img/image5.jpg"></label><input type="radio" name="image" id="cinq"> 
<label for="6"><img style="width: 50px;" src="./assets/img/image6.jpg"></label><input type="radio" name="image" id="six">&nbsp;&nbsp;&nbsp;&nbsp;<button class="test">Appliquer l'image</button>
<br>
<label for="texte">Texte</label>
<input type="text" maxlength="45" size="45" id="texte" class="test" name="texte" value="">
<br><br> 
<label for="taille">Taille du texte de 1 à 9</label>
<input type="number" min="1" max="9" id="taille" class="test" name="taille" value="4">
<br><br>
<label for="couleur">Couleur du texte</label>
<input type="color" id="couleur" name="couleur" value="000000">&nbsp;&nbsp;&nbsp;&nbsp;<button class="test">Appliquer la couleur</button>
<br><br>
<label>Police de caractère:</label>
<br>
<label class="impact" for="impact">Impact</label><input type="radio" name="police" id="impact" checked>
<br>
<label class="roboto" for="roboto">Roboto</label><input type="radio" name="police" id="roboto">
<br>
<label class="dancing" for="dancing">Dancing</label><input type="radio" name="police" id="dancing"> 
<br> 
<label class="silkscreen" for="silkscreen">Silkscreen</label><input type="radio" name="police" id="silkscreen">&nbsp;&nbsp;&nbsp;&nbsp;<button class="test">Appliquer cette police</button>
<br><br>
<label for="x">Position X</label>
<input type="number" min="0" max="650" id="x" class="test" name="x" value="50">
<label for="y">Position Y</label>
<input type="number" min="0" max="500" id="y" class="test" name="y" value="50">
<br><br>

<fieldset>
    <legend>J'ai terminé</legend>
<div id="captcha_back">
	<b>Captcha: </b>
	<input type="text" name="captcha_reponse" id="captcha_reponse" value="" />
	<input type="submit" id="generer" class="test" name="generer" value="Générer le lien">
    <br><?php $id_question_posee = $_SESSION['captcha']['id_question_posee']; echo $liste_questions[$id_question_posee]['question'];?>
</div>

<div id='captcha_new'>
	<b>Captcha: </b>
	<input type='text' name='captcha_reponse2' id='captcha_reponse2' value='' />
	<input type='submit' id='generer2' class='test' name='generer2' value='Générer le lien'>
	</div>

<div id="lien"></div>
</fieldset>


</div>
</div>

<div class="liste_image">

<?php
 
if($dossier = opendir('./img'))
{
   while(($fichier = readdir($dossier)))
   {
    if($fichier!="." && $fichier!=".."){
       echo "<div class='affiche'><img src='./img/" . $fichier . "'><div class='text'>" . $chemin . $fichier ."</div></div>";
    }
   }
}

?>
</div>


</body>
</html>