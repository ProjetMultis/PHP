<div class='ui container'>
<div class='ui link cards'>

<?php

foreach($Articles as $unArticle)
{
	echo"
  <div class='card'>
    <div class='image'>
      <img src='".$unArticle['imageArticle']." ' >
    </div>
    <div class='content'>
      <div class='header'>".$unArticle['titre']."</div>
      <div class='meta'>
        <p>".$unArticle['categorie']."</p>
      </div>
      <div class='description'>
        ".substr($unArticle['text'], 0, 20)."...
      </div>
    </div>
    <div class='extra content'>
      <span class='right floated'>
        Joined in 2013
      </span>
      <span>
        <i class='user icon'></i>
        75 Friends
      </span>
    </div>
  </div>
  ";
}

?>
</div>
</div>