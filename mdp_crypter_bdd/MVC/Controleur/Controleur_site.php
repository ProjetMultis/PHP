<?php
include("MVC/Modele/Modele_special.php");

class Controleur
{
  private $ModeleAffichage;
  public function __construct($serveur, $bdd, $user, $mdp)
  {
    $this->ModeleAffichage = new Modele_special($serveur, $bdd, $user, $mdp);

  }

 public function insertionUser($tab)
 {
  $this->ModeleAffichage-> renseigner("utilisateurs");
  
  $resultats = $this->ModeleAffichage-> insert($tab);

  return $resultats;
 }

 public function crypterMdp($cle, $mdp)
 {
  $cryptage = $this->ModeleAffichage-> crypter($cle, $mdp);
  return $cryptage;
 }

  public function decrypterMdp($cle, $mdp)
 {
  $decryptage = $this->ModeleAffichage-> decrypter($cle, $mdp);
  return $decryptage;
 }
 public function ConnexionUser($champs, $where)
 {
  $this->ModeleAffichage-> renseigner("utilisateurs");
  $connexion = $this->ModeleAffichage-> selectWhere($champs, $where);

  return $connexion;

 }
 public function selectAllArticle()
 {
  $this->ModeleAffichage-> renseigner("Article");
  $connexion = $this->ModeleAffichage-> selectAll();
  
  return $connexion;
 }

 public function Deconnecter()
 {
    $deconnexion = $this->ModeleAffichage-> seDeconnecter();
    return $deconnexion;
 }

 public function rechercheA($nomArticle)
 {
  $recherche = $this->ModeleAffichage-> rechercheArticle($nomArticle);
  return $recherche;
 }


}
 ?>
