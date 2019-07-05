<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page Admin</title>
</head>
<body>
  <?php
$param = parse_ini_file('db.ini');

try {
  $dbh = new PDO($param['url'], $param['user'], $param['pass']);
} catch (PDOException $e) {
    echo("Erreur de connexion");
    exit;
}
?>
<div id="competence-container" class="container-admin">
           <h2>Compétences</h2>
           <div class="comp-inner-container">
 
           <div class="comp-inner">
             <h3>Ajouter une compétence</h3>
             <form action="ajout_comp.php" method="POST">
                 <input name="nom" type="text" placeholder="Compétence">
                 <input name="percent" type="number" min="10" max="100" step="5" placeholder="50%"> 
 
                 <button id="sendButton" type="submit">Ajouter</button>
             </form>
           </div>
           <div class="comp-inner">
             <h3>Modifier une compétence</h3>
             <form action="modif_comp.php" method="POST">
                 <select name="comp">
                   <?php
                      $tab = "SELECT nom_comp FROM competences;";
                      $sql = $dbh->prepare($tab);
                       $sql->execute();
                       
                       while($ligne = $sql->fetch(PDO::FETCH_NUM)){
                           foreach($ligne as $val){
                               echo "<option name='$val'>$val</option>";
                           }
                       }
                       ?>
                   </select>
                 <input name="percent" type="number" min="10" max="100" step="5" placeholder="50%">
                 <button id="sendButton" type="submit">Modifier</button>
             </form>
           </div>
           <div class="comp-inner">
             <h3>Supprimer une compétence</h3>
             <form action="del_comp.php" method="POST">
                 <select name="comp">
                 <?php
                    $tab = "SELECT nom_comp FROM competences;";
                    $sql = $dbh->prepare($tab);
                     $sql->execute();
                     $tabulation = [];
                     while($ligne = $sql->fetch(PDO::FETCH_NUM)){
                         foreach($ligne as $val){
                             echo "<option name='$val'>$val</option>";
                         }
                     }
                     ?>
                 </select>
                 <button id="sendButton" type="submit">Supprimer</button>
             </form>
           </div>
         </div>
       </div>
         <div id="projet-container" class="container-admin">
           <h2>Expériences</h2>
           <div class="comp-inner">
             <h3>Ajouter une experience</h3>
             <form action="ajout_exp.php" method="POST">
                 <input name="durée" type="text" placeholder="Durée">
                 <input name="année" type="text" placeholder="Année">
                 <input name="nom" type="text" placeholder="Nom">
                 <input name="site" type="text" placeholder="Lien du site">
                 <input name="description" type="text" placeholder="Description">
                 <button id="sendButton" type="submit">Ajouter</button>
             </form>
           </div>
           <div class="comp-inner">
             <h3>Supprimer une expérience</h3>
             <form action="del_exp.php" method="POST">
                 <select name="année_del">
                 <?php
                    $tab = "SELECT année FROM expériences;";
                    $sql = $dbh->prepare($tab);
                     $sql->execute();
                     $tabulation = [];
                     while($ligne = $sql->fetch(PDO::FETCH_NUM)){
                         foreach($ligne as $val){
                             echo "<option name='$val'>$val</option>";
                         }
                     }
                     ?>
                 </select>
                 <button id="sendButton" type="submit">Supprimer</button>
             </form>
           </div>
         </div>
       </div>
         <div id="xp-pro" class="container-admin">
           <h2>Projet</h2>
            <div class="comp-inner-container">
           <div class="comp-inner">
             <h3>Ajouter un projet</h3>
             <form action="ajout_projet.php" method="POST">
               <input name="image" type="text" placeholder="image">
               <input name="lien" type="text" placeholder="lien">
               <input name="texte" type="text" placeholder="texte">
                 <button id="sendButton" type="submit">Ajouter</button>
             </form>
           </div>
           
           <div class="comp-inner">
             <h3>Supprimer un projet</h3>
             <form action="del_projet.php" method="POST">
                 <select name="image_del">
                 <?php
                    $tab = "SELECT image FROM projet;";
                    $sql = $dbh->prepare($tab);
                     $sql->execute();
                     $tabulation = [];
                     while($ligne = $sql->fetch(PDO::FETCH_NUM)){
                         foreach($ligne as $val){
                             echo "<option name='$val'>$val</option>";
                         }
                     }
                     ?>
                 </select>
                 <button id="sendButton" type="submit">Supprimer</button>
             </form>
           </div>
         </div>
</body>
</html>