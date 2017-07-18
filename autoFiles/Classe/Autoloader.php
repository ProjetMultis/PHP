<?php

namespace exemple;

class Autoloader
{
  static function register()
  {
    spl_autoload_register(array(__CLASS__ , 'autoload')); //__CLASS__ appelle nom de la classe courante, 'autoload' -> fonction
  }

  static function autoload($Classe)
  {

    if(strpos($Classe, __NAMESPACE__ . '\\') == 0)
    {
      $Classe = str_replace(__NAMESPACE__ . '\\', '', $Classe); // __NAMESPACE__ : nom courant de l'espace pour travaillier dans le namespace(plus propre) -> ''

      $Classe = str_replace('\\', '/', $Classe);

      require 'Classe/'. $Classe .".php";
    }

  }
}

 ?>