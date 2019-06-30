<?php
$param = parse_ini_file('db.ini');

try{
    $dbh = new PDO($param['url'], $param['user'], $param['pass']);
}catch(PDOException $e){
    echo("Erreur de connexion");
    exit;
}

if(isset($_POST['image_del'])) {
    $image_del=$_POST['image_del'];
} else {
    $image_del="";
}

if (empty($image_del)) {
    echo '<font color="red">Attention, veuillez remplir les champs !</font>';
    echo "<form action='admin_page.php' method='get'>
    <input type='submit' value='Retour'>
</form>";
    return;
}
else {
$query = "DELETE FROM projet WHERE image = :image_del ";
$sql = $dbh->prepare($query);
$sql->execute(array(":image_del"=>$image_del));
$dbh = null;
// echo('Compétence supprimée !');
// echo "<form action='admin_page.php' method='get'>
// <input type='submit' value='Retour'>
// </form>";
header('location: admin_page.php');
exit;
}
?>
