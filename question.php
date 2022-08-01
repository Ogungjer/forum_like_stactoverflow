<?php
@ini_set('display_errors', 'on');
require 'db_class.php'; // connexion à la base de donnée

$DB = new DB();
$req = $DB->query("SELECT * FROM  `forum` ORDER BY `ordre`"); // On sélectionne toutes les lignes de la table user

//$req = $req->fecthAll();
?>


<!DOCTYPE html >
<html>
<head>
  <title>Contenu des publication</title>
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
      <h1 class="fm">FORUM</h1>
      
      <?php
      
      if(isset($_SESSION['user'])){
        ?>
      <a class="sujet" href="build_topic.php" >Créer un sujet</a>
      
      <?php
       }       
       ?>              
                              <table class="ctab">
                                <tr>
                                
                                  <th>Titre</th>
                                </tr>
                                <?php
                                  // On utilise la variable $r
                                  foreach($req as $r){
                                ?>   
                                  <tr>
                                   
                                    <td><a href="topic.php?id=<?= $r['id'] ?>"><?= $r['titre'] ?></a></td> <!-- On affiche le nom de la catégorie -->
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
