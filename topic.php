<?php
@ini_set('display_errors', 'on');
require 'db_class.php'; // connexion à la base de donnée

$get_id =(int)trim(htmlspecialchars ($_GET['id'])); //recuperer l'id

if(empty($get_id)){
  header("Location: question.php ");
  exit;
  }


$DB = new DB();
$req = $DB->query("SELECT t. * , u.prenom
        FROM  topic t 
        LEFT  JOIN utilisateur u ON u.id = t.id_user
        WHERE t. id_forum = ? 
        ORDER BY  t. date_creation ", 
        array($get_id)); // t a été utiliser pour faire une jointure pour l'affichage du nom


?>


<!DOCTYPE html >
<html>
<head>
  <title>Sujet</title>
      <link rel="stylesheet" href="style.css" />
      <link rel="stylesheet" href="question.css" />
      <script src="https://kit.fontawesome.com/f7c49bce16.js" crossorigin="anonymous"></script>
</head>

<body>
  
<!--Le header-->
  <?php
  require('header.php');
  ?>
  <div class="container">
      <h1 class="fm">SUJET</h1>
                              
                              <table class="ctab">
                                <tr>
                                  <th>ID</th>
                                  <th>Titre</th>
                                  <th>Date</th>
                                  <th>Nom</th>
                                </tr>
                                <?php
                                  // On utilise la variable $r
                                  foreach($req as $r){
                                ?>   
                                  <tr>
                                    <td><?= $r['id'] ?></td> <!-- On afficher l'ID de la personne -->
                                    <td><a href="sujet_contenu.php?id_forum=<?= $get_id ?>&id_topic=<?= $r['id'] ?>"><?= $r['titre'] ?></a></td> <!-- On affiche le nom de la catégorie -->
                                    <td><?= $r['date_creation'] ?></td> <!-- On affiche la date -->
                                    <td><?= $r['prenom'] ?></td> <!-- On affiche la date -->
                                  </tr>
                                <?php
                                }
                                ?>
                              </table>
    </div>


<footer>
  <div class="blocf">
        <div class="adresse">
                <span><i class="fas fa-map-marker-alt"></i></span>
                <span>31 bd siegfried 76130,</span><br>
                <span>Mont Saint Aignan</span>
        </div>
        <div class="apropo"><h1>À propos de nous</h1>
                <p>FAB && OGUN 
                <br/>Nous partageons notre passion pour l'informatique à travers des conceptions de site web et application web </p>
        </div><br><br>
        
        <div class="contact">
        <i class="fas fa-phone-alt"> 0753170217/ 0758314279</i><br><br>
        <i class="fas fa-envelope"> contact@fabogun@gmail.com</i>
        <span class="social">
                  <i class="fab fa-facebook-square fa-2x"></i>
                  <i class="fab fa-instagram-square fa-2x"></i>
                  <i class="fab fa-snapchat-square fa-2x"></i>
        </span>
        </div>
    </div>
</footer>


  <script src="projet.js"></script>

</body>
</html>

