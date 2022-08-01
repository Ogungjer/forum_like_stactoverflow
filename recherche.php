
<?php
require_once 'connex_base.php';

$conn->query("SET NAMES UTF8");

if (isset($_GET['submit']) AND $_GET['submit'] == "Rechercher")
{
 $_GET['q'] = htmlspecialchars($_GET['q']); //pour sécuriser le formulaire contre les intrusions html
 $q = $_GET['q'];
 $q = trim($q); //pour supprimer les espaces dans la requête de l'internaute
 $q = strip_tags($q); //pour supprimer les balises html dans la requête

 if (isset($q))
 {
  $q = strtolower($q);
  $select_q = $conn->prepare("SELECT titre, contenu FROM topic WHERE titre LIKE ? OR contenu LIKE ?");
  $select_q->execute(array("%".$q."%", "%".$q."%"));
 
 }
 else
 {
  $message = "Vous devez entrer votre requete dans la barre de recherche";
 }
}
?>

<!DOCTYPE html>
<html>
 <head>
  <meta charset ="utf-8" >
  <title>Les résultats de recherche</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/f7c49bce16.js" crossorigin="anonymous"></script>
 </head>
 <body>
   <?php
  require('header.php');
  ?>
  <?php
  if($terme_trouve = $select_q->fetch())
  {
   echo "<div><h2>".$terme_trouve['titre']."</h2><p>".$terme_trouve['contenu']."</p>";
  }else{
    echo"<p>Aucun resultat pour cette recherche...</p>";
  }
  $select_q->closeCursor();
   ?>
 </body>
 
 <script src="projet.js"></script>
</html>
