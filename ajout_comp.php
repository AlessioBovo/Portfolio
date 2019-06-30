<?php
$param = parse_ini_file('db.ini');

  try {
    $dbh = new PDO($param['url'], $param['user'], $param['pass']);
  } catch (PDOException $e) {
      echo("Erreur de connexion");
      exit;
  }

  if(isset($_POST['nom'])) {
    $nom=$_POST['nom'];
  } else {
    $nom="";
  }

  if(isset($_POST['percent'])) {
    $percent=$_POST['percent'].'%';
  } else {
    $percent="";
  }

  if(empty($nom) OR empty($percent)) {
    echo '<font color="red">Veuillez remplir tout les champs</font>';
    return;
  } else {
    $query = "INSERT INTO competences(nom_comp, pourcentage)  VALUES(?,?)";
    $sql = $dbh->prepare($query);
    $sql->execute([$nom,$percent]);
    $dbh = null;
    //var_dump($nom . $percent);
    // echo('Competence ajoutée');
    header('location: admin_page.php');
    exit;
  }
?>
