<?php

use \exemple\MVC\Controleur\Controleur_site;

use \exemple\Autoloader;

require('Classe/Autoloader.php');

Autoloader::register();

$connexion = new Controleur_site("localhost", "cryptMdp", "root", "");

$Article = $connexion-> selectAllArticle();

include("Classe/MVC/Vue/VueTest.php");
?>