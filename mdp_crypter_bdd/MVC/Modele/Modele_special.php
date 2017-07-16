<?php
  include('Modele_site.php');

  class Modele_special extends Modele
  {

    public function __construct($serveur, $bdd, $user, $mdp)
    {
      parent::__construct($serveur, $bdd, $user, $mdp); //héritage modèle
    }

  
  }

 ?>
