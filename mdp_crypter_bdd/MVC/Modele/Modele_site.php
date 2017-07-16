  <?php
  class Modele
  {
    protected $pdo;
    protected $table;

    public function __construct($serveur, $bdd, $user, $mdp)
    {
      //connexion

      $this -> pdo = null;
      try{
        $this -> pdo = new PDO("mysql:host=".$serveur.";dbname=".$bdd, $user, $mdp);
      }
      catch (Exception $exp)
      {
        echo "Erreur de connexion au serveur";
      }
    }

    public function renseigner($table) //methode pour intialiser une table dans la base
    {
      //intialisation de table
      $this -> table = $table;
    }

  public function selectAll() //Methode pour selectionner plusieurs resultats
  {
    if($this->pdo != null)
    {
      //requete

      $requete = "select * from ".$this->table.";";
      $select = $this-> pdo -> prepare($requete);
      $select -> execute(); //Execution de la requete
      $resultats = $select -> fetchAll();
      //Recupération de tous les tuples ou tous les enregistrements de la tables
      return $resultats;
      }else {
      return null;
    }
  }

  public function selectWhere($champs, $where) //Methode select avec un where pour un seul resultat
  {
    $chaineChamps = implode(",", $champs); //rassemble les donnees
    $clause = array(); //pour les order by etc
    $donnees = array(); //pour les valeurs dans la bdd

    foreach ($where as $cle => $valeur) {
      # code...
      $clause[] = $cle."= :".$cle; //selection des clauses(where, order by etc....)
      $donnees[":".$cle] = $valeur;//$cle = :nom par exempleS
    }

    $chaineclause = implode(" and ", $clause);
    $requete = "select ".$chaineChamps." from  ".$this->table."  where  ".$chaineclause.";";
    $select = $this ->pdo->prepare($requete);
    $select ->execute($donnees);
    $unResultat = $select->fetch();
    return $unResultat;
  }



  public function insert($tab) //méthode pour inserer dans la base
  {
    $champs = array();
    $donnees = array();
    $valeurs = array();

    foreach ($tab as $cle => $valeur) {
      $champs[] = $cle;
      $valeurs[]= ":".$cle; //valeur = apres value
      $donnees[":".$cle] = $valeur;
    }

    $listechamps = implode(",", $champs);
    $chaineChamps = implode(",", $valeurs);

    $requete = "insert into ".$this->table."(".$listechamps.") values(".$chaineChamps.");";
    $insert = $this->pdo->prepare($requete);
    $insert->execute($donnees);

  }

  public function update($tab, $where) //methode pour mettre à jour dans la base
  {
    $champs = array();
    $donnees = array();
    $clause = array();
    //pour les champs, exemple : update ecole set champ = champ;
    foreach ($tab as $cle => $valeur) {

      $champs[] = $champs[] = $cle;//set idresto = id
      $donnees[":".$cle] = $valeurs; //prend en compte les données selon la valeur donnees

    }
    $chaineChamps = implode(",", $champs);
    //pour where, exemple : where nom = nom
    foreach ($where as $cle => $valeur) {
      # code...
      $clause[] = $cle."= :".$cle; // where nom = nom
      $donnees[":".$cle] = $valeur;//prend en compte les données selon la valeur donnees
    }
    $chaineclause = implode(" and ", $clause);

    $requete = "update ". $this->table ." set ".$chaineChamps." where ".$chaineclause.";";
    $update = $this->pdo->prepare($requete);
    $update->execute($donnees);
  }

  public function delete($where) //methode pour supprimer dans la base
  {
    $champs = array();
    $donnees = array();
    foreach ($where as $cle => $valeur) {
      # code...
      $clause[] = $cle."= :".$cle; // where nomvillr = paris
      $donnees[":".$cle] = $valeur;//prend en compte les données selon la valeur donnee
    }
    $chaineclause = implode("  and  ", $clause);

    $requete = "delete from ". $this->table ." where ".$chaineclause.";";
    $delete = $this->pdo->prepare($requete);
    $delete ->execute($donnees);
  }

  public function seDeconnecter() //méthode pour se déconnecter d'une session
  {

    $_SESSION = array();

    session_destroy();

    unset($_SESSION);

}
// -----------------------------------------
// crypte une chaine (via une clé de cryptage)
// -----------------------------------------
public function crypter($maCleDeCryptage="", $maChaineACrypter){
if($maCleDeCryptage==""){
$maCleDeCryptage=$GLOBALS['PHPSESSID'];
}
$maCleDeCryptage = md5($maCleDeCryptage);
$letter = -1;
$newstr = '';
$strlen = strlen($maChaineACrypter);
for($i = 0; $i < $strlen; $i++ ){
$letter++;
if ( $letter > 31 ){
$letter = 0;
}
$neword = ord($maChaineACrypter{$i}) + ord($maCleDeCryptage{$letter});
if ( $neword > 255 ){
$neword -= 256;
}
$newstr .= chr($neword);
}
return base64_encode($newstr);
}
 
 
// -----------------------------------------
// décrypte une chaine (avec la même clé de cryptage)
// -----------------------------------------
public function decrypter($maCleDeCryptage="", $maChaineCrypter){
if($maCleDeCryptage==""){
$maCleDeCryptage=$GLOBALS['PHPSESSID'];
}
$maCleDeCryptage = md5($maCleDeCryptage);
$letter = -1;
$newstr = '';
$maChaineCrypter = base64_decode($maChaineCrypter);
$strlen = strlen($maChaineCrypter);
for ( $i = 0; $i < $strlen; $i++ ){
$letter++;
if ( $letter > 31 ){
$letter = 0;
}
$neword = ord($maChaineCrypter{$i}) - ord($maCleDeCryptage{$letter});
if ( $neword < 1 ){
$neword += 256;
}
$newstr .= chr($neword);
}
return $newstr;
}

}
?>
