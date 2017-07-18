<?php
include('MVC/Controleur/Controleur_site.php');

$controleur = new Controleur("localhost", "cryptMdp", "root", "");

if(isset($_POST['dec']))
{
    $controleur-> Deconnecter();
    header("location: connexionUser.php");
}

?>