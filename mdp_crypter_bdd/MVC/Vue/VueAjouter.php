<?php

echo "<div class='main ui container'>
    <form class='ui form segment' type='submit' method='post' action='index.php'>
    <div class='three fields'>
      <div class='field'>
        <div class='ui left corner labeled input'>
        <input placeholder='Nom' type=text name='nm'>
        <div class='ui left corner label'>
        <i class='user icon'></i>
      	</div>
        </div>
      </div>
      <div class='field'>
        <div class='ui left corner labeled input'>
        <input placeholder='Email' type=text name='eml'>
        <div class='ui left corner label'>
        <i class='users icon'></i>
      	</div>
        </div>
      </div>
      <div class='field'>
       	<div class='ui left corner labeled input'>
        <input placeholder='Mot de passe' type=password name='mdp'>
        <div class='ui left corner label'>
        <i class='lock icon'></i>
      	</div>
        </div>
        </div>
      </div>
      <div id='form1'><button class='ui orange submit left button' type='submit' name='sub'><i class='add user icon'></i>Ajouter </button></div>
    </form>
  </div>";

?>