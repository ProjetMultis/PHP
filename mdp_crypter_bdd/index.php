<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head> <!-- t�te de page -->


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--concerne IE-->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--concerne portable-->

    <title> Accueil </title>

    <link rel="stylesheet" type="text/css" href="Semantic/semantic.css ">
    <link rel="stylesheet" type="text/css" href="Semantic/mon_css.css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="Semantic/semantic.min.js"></script>
    
 
    

</head>
<body>
<?php 
include_once('Include/MenuCo.php');
include('MVC/Vue/VueAjouter.php');
include('MVC/Controleur/Controleur_site.php');
include('Include/cleCryptage.php');


$controleur = new Controleur("localhost", "cryptMdp", "root", "");

if(isset($_POST['sub']))
{
    $nom = $_POST['nm'];
    $email = $_POST['eml'];
    $mdp = $_POST['mdp'];
    $mdpCrypter = crypt($mdp, $salt);

if(empty($nom) && empty($email) && empty($mdp))
{
    echo"<br />
    <div class='ui container'>
    <div class='ui negative message'>
        <i class='close icon'></i>
            <p> Aucun champs remplies </p>
    </div>
    </div>
    ";
}
else
{

    $tab = array(
        "nom" => $nom,
        "email" => $email,
        "mdp" => $mdpCrypter

        );

    $insertion = $controleur-> insertionUser($tab);

    echo"<br />
    <div class='ui container'>
    <div class='ui positive message'>
        <i class='close icon'></i>
            <p> Utilisateurs ajoutés </p>
    </div>
    </div>
    ";
}

}




include_once('Include/jsGeneral.php'); 
?>
	

	

</body>
</html>
