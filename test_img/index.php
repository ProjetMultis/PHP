<!Doctype html>
<html>
  <head>
    <title> uploader une image </title>
  </head>
  <body>
    <form action="index.php" method="post" enctype="multipart/form-data">
      <?php echo"<input type='hidden' name='id' value=" . uniqid() . " />"; ?>
      <input type="text" name="nom" placeholder="Nom" />
      <input type="text" name="prenom" placeholder="Prenom" />
      <input type="file" name="img" id="img" />

      <button type="submit" name="val"> Valider </button>
    </form>
    <br />
    <?php
      include("fonction.php");
      if(isset($_POST['val']))
      {
        $id = $_POST['id'];
        $nom = $_POST["nom"];
        $prenom = $_POST['prenom'];


        upload('img',"/home/tibdev/Public/www/test_img/tmp_file_upload/");

        $renomerFichier = rename("tmp_file_upload/" . $_FILES['img']['name'], "tmp_file_upload/".$id. "_". $nom ."_".$_FILES['img']['name']);
        $fichierRenomer = "tmp_file_upload/".$id. "_". $nom ."_".$_FILES['img']['name'];
        insertion($nom, $prenom, $fichierRenomer);

      }
     ?>
  </body>
  </html>
