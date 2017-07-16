<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">
<head> <!-- t�te de page -->


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--concerne IE-->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--concerne portable-->

    <title> Connexion Utilisateurs </title>

    <link rel="stylesheet" type="text/css" href="Semantic/semantic.css ">
    <link rel="stylesheet" type="text/css" href="Semantic/mon_css.css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="Semantic/semantic.min.js"></script>
    
 
    

</head>
<body>
<?php 

include_once('Default.php'); 
include('MVC/Vue/VueConnexion.php');
include('MVC/Controleur/Controleur_site.php');
include('Include/cleCryptage.php');

$Connexion = new Controleur("localhost", "cryptMdp", "root", "");

if(isset($_POST['sub']))
{
    $email = htmlspecialchars($_POST['eml']);
    $mdp = htmlspecialchars($_POST['mdp']);
    $mdpcrypter = crypt($mdp, $salt);


    $where = array(
        "email" => $email,
        "mdp" => $mdpcrypter
        );
    $champs = array("nom", "email", "mdp");

    $seConnecter = $Connexion-> ConnexionUser($champs, $where);

    if(password_verify($mdp, $seConnecter['mdp']))
    {

         echo"<br />
        <div class='ui container'>
        <div class='ui positivetive message'>
            <i class='close icon'></i>
                <p> Connexion réussite </p>
        </div>
        </div>
        ";

        $_SESSION['nm'] = $seConnecter['nom'];
        $_SESSION['mp'] = $seConnecter['mdp'];
        $_SESSION['eml'] = $seConnecter['email'];
        header("location: index.php");
    }
    else
    {
         echo"<br />
            <div class='ui container'>
            <div class='ui negative message'>
                <i class='close icon'></i>
                    <p> Mot de passe ou Email incorrect </p>
                </div>
            </div>
            ";
    }
}





include_once('Include/jsGeneral.php'); 
?>
	

	

</body>
</html>
