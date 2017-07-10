<?php

//avec la fonction crypt() sa marche mais pas avec la fonction password_hash()

$pass = "aaa";

$hashed_password = crypt($pass);
$correct = $hashed_password;

//avec password_verify()

if (password_verify($pass , $hashed_password)) {
    echo 'Le mot de passe est valide !';
} else {
    echo 'Le mot de passe est invalide.';
}

//avec hash_equals pour vérifier si les deux mots de passe sont égales
if (hash_equals($hashed_password, $correct)) {
    echo 'Le mot de passe est valide !';
} else {
    echo 'Le mot de passe est invalide.';
}




?>