<?php
$param = parse_ini_file('db.ini');

try{
    $dbh = new PDO($param['url'], $param['user'], $param['pass']);
}catch(PDOException $e){
    echo("Erreur de connexion");
    exit;
}

if(isset($_POST['année_del'])) {
    $année_del=$_POST['année_del'];
} else {
    $année_del="";
}

if (empty($année_del)) {
    echo '<font color="red">Attention, veuillez remplir les champs !</font>';
    echo "<form action='admin_page.php' method='get'>
    <input type='submit' value='Retour'>
</form>";
    return;
}
else {
$query = "DELETE FROM expériences WHERE année = :année_del ";
$sql = $dbh->prepare($query);
$sql->execute(array(":année_del"=>$année_del));
$dbh = null;

header('location: admin_page.php');
exit;
}
?>
