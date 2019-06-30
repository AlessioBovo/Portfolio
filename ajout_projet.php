<?php
$param = parse_ini_file('db.ini');

  try {
    $dbh = new PDO($param['url'], $param['user'], $param['pass']);
  } catch (PDOException $e) {
      echo("Erreur de connexion");
      exit;
  }

  if(isset($_POST['image'])) {
    $image=$_POST['image'];
  } else {
    $image="";
  }

  if(isset($_POST['lien'])) {
    $lien=$_POST['lien'];
  } else {
    $lien="";
  }

  if(isset($_POST['texte'])) {
    $texte=$_POST['texte'];
  } else {
    $texte="";
  }

 

  if(empty($image) OR empty($texte)) {
    echo '<font color="red">Veuillez remplir tout les champs</font>';
    return;
  } else {
    $query = "INSERT INTO projet(image, texte, lien)  VALUES(?,?,?)";
    $sql = $dbh->prepare($query);
    $sql->execute([$image,$texte,$lien]);
    $dbh = null;
    // echo('Competence ajoutée');
    header('location: admin_page.php');
    exit;
  }
?>
