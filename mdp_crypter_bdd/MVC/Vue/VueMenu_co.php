<?php

echo"<div class='ui blue inverted segment'>
    <div class='ui inverted secondary pointing menu' id='menu'>
        <a class=item href='index.php' id='index'>
            <h3>Accueil</h3>
        </a>
        <a class=item href='articles.php' id=articles>Articles</a>
        <div class='right menu'>
        <form method=post action='articles.php'>
            <div class='item'>
                <div class='ui icon input'>
                    <input placeholder='chercher article' type='text' name='rch'>
                      <button type='submit' name='search'><i class='search icon'></i></button>
                </div>
            </div>
            </form>
         <div class='ui dropdown item'>
  			Menu <i class='dropdown icon'></i>
  				<div class='menu'>
    				<div class=item>Connecté : ".$_SESSION['nm']."</div>
    				<form method=post action='Deconnection.php' ><div class=item><button type=submit  name=dec class='ui red button' > Deconnection </button></div></form>
  				</div>
		</div>

      </div>
    </div>
    </div>
</div>";

include_once('Include/jsMenu.php');
?>