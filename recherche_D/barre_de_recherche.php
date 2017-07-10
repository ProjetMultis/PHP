<!DOCTYPE html>
<html lang="fr">
<head> <!-- t�te de page -->


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--concerne IE-->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--concerne portable-->

    <title> Barre de recherche </title>

    <link rel="stylesheet" type="text/css" href="Semantic/semantic.min.css ">
    <link rel="stylesheet" type="text/css" href="Semantic/mon_css.css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="Semantic/semantic.min.js"></script>
    
 
    

</head>
<body>



<div class="ui search">
  <div class="ui icon input">
    <input class="prompt" placeholder="Search countries..." type="text">
    <i class="search icon"></i>
  </div>
  <div class="results"></div>

<?php include('Include/Javascript.php'); ?>

</body>
</html>