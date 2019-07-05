<?php
$param = parse_ini_file('db.ini');

  try {
    $dbh = new PDO($param['url'], $param['user'], $param['pass']);
  } catch (PDOException $e) {
      echo("Erreur de connexion");
      exit;
  }

  if(isset($_POST['durée'])) {
    $durée=$_POST['durée'];
  } else {
    $durée="";
  }

  if(isset($_POST['année'])) {
    $année=$_POST['année'];
  } else {
    $année="";
  }

  if(isset($_POST['nom'])) {
    $nom=$_POST['nom'];
  } else {
    $nom="";
  }

  if(isset($_POST['site'])) {
    $site=$_POST['site'];
  } else {
    $site="";
  }

  if(isset($_POST['description'])) {
    $description=$_POST['description'];
  } else {
    $description="";
  }



  if(empty($nom) OR empty($description)) {
    echo '<font color="red">Veuillez remplir tout les champs</font>';
    return;
  } else {
    $query = "INSERT INTO expériences(durée, année, nom, site, description)  VALUES(?,?,?,?,?)";
    $sql = $dbh->prepare($query);
    $sql->execute([$durée,$année,$nom,$site,$description]);
    $dbh = null;
    // var_dump($comp . $percent);
    // echo('Competence ajoutée');
    header('location: admin_page.php');
    exit;
  }
?>
