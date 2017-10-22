<?php

//fonction pour la connexion à la BDD
function connexion()
{
  $pdo = null;

  try {

    $pdo = new PDO("mysql:host=localhost;dbname=testImg","root","");

  } catch (Exception $e) {

    echo "erreur de connexion";
  }

  return $pdo;

}

//fonction pour l'insertion des utilisateurs
function insertion($nom, $prenom, $img)
{
  $pdo = connexion();


  $donnees = array(
    ":nom" => $nom,
    ":prenom" => $prenom,
    ":img" => $img
  );

  if($pdo == null) {

    return null;
  }
  else {

    $requete = "insert into utilisateurs values (null, :nom, :prenom, :img)";

    $insert = $pdo->prepare($requete);

    $resultats = $insert->execute($donnees);

  }

  return $resultats;

}

//fonction pour uploader les fichiers
function upload($index, $destination)
{
    //on vérifie si le fichier à bien été selectionné par l'utilisateur
    $tmp_file = $_FILES[$index]['tmp_name'];

    if( !is_uploaded_file($tmp_file) )
    {
        exit("Le fichier est introuvable");
    }

    // on vérifie maintenant l'extension
    $type_file = $_FILES[$index]['type'];

    if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'png') && !strstr($type_file, 'gif') )
    {
        exit("Le fichier n'est pas une image");
    }


    // on copie le fichier dans le dossier de destination
    $name_file = $_FILES[$index]['name'];
    if( !move_uploaded_file($tmp_file, $destination . $name_file) )
    {
        exit("Impossible de copier le fichier dans $destination");
    }

    echo "Le fichier a bien été uploadé";


}
