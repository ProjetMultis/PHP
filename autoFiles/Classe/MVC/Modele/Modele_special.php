<?php

namespace exemple\MVC\Modele;


  class Modele_special extends Modele_site
  {

    public function __construct($serveur, $bdd, $user, $mdp)
    {
      parent::__construct($serveur, $bdd, $user, $mdp); //héritage modèle
    }

    public function rechercheArticle($nomArticle)
    {
      $requete = "select titre, text, imageArticle, categorie from Article where titre like '%".$nomArticle."%' order by titre";
      $selectionne = $this->pdo->prepare($requete);
      $selectionne -> execute();
      $resultats = $selectionne-> fetchAll();
      return $resultats;
    }  
  
  }

 ?>
