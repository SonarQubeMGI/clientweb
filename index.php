<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="./style.css" />
</head>
<body>
<?php
require('./config.php');

if (isset($_REQUEST['nom'], $_REQUEST['prenom'], $_REQUEST['datenaiss'],$_REQUEST['adresse'],$_REQUEST['codepostal'], $_REQUEST['ville'])){
	$nom = stripslashes($_REQUEST['nom']);
	$nom = mysqli_real_escape_string($conn, $nom); 
	$prenom = stripslashes($_REQUEST['prenom']);
	$prenom = mysqli_real_escape_string($conn, $prenom);
	$datenaiss = stripslashes($_REQUEST['datenaiss']);
	$datenaiss = mysqli_real_escape_string($conn, $datenaiss);
	$adresse = stripslashes($_REQUEST['adresse']);
	$adresse = mysqli_real_escape_string($conn, $adresse);
	$codepostal = stripslashes($_REQUEST['codepostal']);
	$codepostal = mysqli_real_escape_string($conn, $codepostal);
	$ville = stripslashes($_REQUEST['ville']);
	$ville = mysqli_real_escape_string($conn, $ville);
	
    $query = "INSERT into `client` (nom, prenom, datenaiss, adresse, codepostal, ville)
				  VALUES ('$nom', '$prenom', '$datenaiss', '$adresse', '$codepostal', '$ville' )";
    $res = mysqli_query($conn, $query);

    if($res){
       echo "<div class='sucess'>
             <h3>Le client a étéajoutée avec succés.</h3>
             <p>Cliquez <a href='index.php'>ici</a> pour retourner à la page d'accueil</p>
			 </div>";
    }
}else{
?>
<form class="box" action="" method="post">
	<h1 class="box-logo box-title"><a href="https://sonarQube/"></a></h1>
    <h1 class="box-title">Ajouter client</h1>
	<input type="text" class="box-input" name="nom" placeholder="Nom" required />
    <input type="text" class="box-input" name="prenom" placeholder="Prenom" required />
	<input type="text" class="box-input" name="datenaiss" placeholder="Date Naissance" required />
	<input type="text" class="box-input" name="adresse" placeholder="Adresse" required />
	<input type="text" class="box-input" name="codepostal" placeholder="Code Postal" required />
	<input type="text" class="box-input" name="ville" placeholder="Ville" required />

	<div class="input-group">

	</div>
    <input type="submit" name="submit" value="+ Add" class="box-button" />
</form>
<?php } ?>
</body>
</html>