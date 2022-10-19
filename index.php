<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <script src="main.js" defer></script>
    <title>Document</title>
</head>
<body>



<img src="image.php?statut=<?php if(isset($_POST['rafraichir'])){echo '0';}elseif(isset($_POST['generer'])){echo '1';}else{echo '0';}?>&texte=<?php if(isset($_POST['texte'])){echo $_POST['texte'];}else{echo "";} ?>&taille=<?php if(isset($_POST['taille'])){echo $_POST['taille'];}else{echo "1";} ?>&couleur=<?php if(isset($_POST['couleur'])){echo str_replace("#", "", $_POST['couleur']);}else{echo "000000";} ?>&police=<?php if(isset($_POST['police'])){echo $_POST['police'];}else{echo "roboto";} ?>&x=<?php if(isset($_POST['x'])){echo $_POST['x'];}else{echo "0";} ?>&y=<?php if(isset($_POST['y'])){echo $_POST['y'];}else{echo "0";} ?>&fichier=toto.png" width="400px">

<form action="index.php" method="POST">
<label for="couleur">Texte</label>
<input type="text" maxlength="45" size="45" id="texte" name="texte" value="<?php if(isset($_POST['texte'])){echo $_POST['texte'];}else{echo "";} ?>">
<br><br> 
<label for="taille">Taille du texte de 1 à 9</label>
<input type="number" min="1" max="9" id="taille" name="taille" value="<?php if(isset($_POST['taille'])){echo $_POST['taille'];}else{echo "1";} ?>">
<br><br>
<label for="couleur">Couleur du texte</label>
<input type="color" id="couleur" name="couleur" value="<?php if(isset($_POST['couleur'])){echo $_POST['couleur'];}else{echo "#000000";} ?>">
<br><br>
<label>Police de caractère:</label>
<br>
<label for="roboto">Roboto</label><input type="radio" value="roboto" name="police" id="roboto" <?php if(((isset($_POST['police'])) && ($_POST['police']=="roboto")) || (!isset($_POST['police']))){echo "checked";}?>>
<br>
<label for="dancing">Dancing</label><input type="radio" value="dancing" name="police" id="dancing" <?php if(isset($_POST['police'])){if($_POST['police']=="dancing"){echo "checked";}}?>> 
<br> 
<label for="silkscreen">Silkscreen</label><input type="radio" value="silkscreen" name="police" id="silkscreen" <?php if(isset($_POST['police'])){if($_POST['police']=="silkscreen"){echo "checked";}}?>>
<br><br>
<label for="x">Position X</label>
<input type="number" min="0" max="650" id="x" name="x" value="<?php if(isset($_POST['x'])){echo $_POST['x'];}else{echo "0";} ?>">
<br><br>
<label for="y">Position Y</label>
<input type="number" min="0" max="500" id="y" name="y" value="<?php if(isset($_POST['y'])){echo $_POST['y'];}else{echo "0";} ?>">
<br><br>
<input type="submit" id="rafraichir" name="rafraichir" value="Rafraichir">
<input type="submit" id="generer" name="generer" value="Générer le lien">
</form>

<?php
if(isset($_POST['generer'])){
    echo "http://localhost/meme/";
}
?>



</body>
</html>