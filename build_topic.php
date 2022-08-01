<!DOCTYPE html >
<html lang="fr">
<head>
      <meta charset="utf-8"/>
      <title>Créer mon sujet</title>
      <link rel="stylesheet" href="style.css" />
      <link rel="stylesheet" href="question.css" />
      <script src="https://kit.fontawesome.com/f7c49bce16.js" crossorigin="anonymous"></script>
</head>

<body>
  
<!--Le header-->
  <?php
  require('header.php');
  
 
  <div class="container">
<h1>Créer mon sujet</h1>

<div>
  <?php
session_start();
@ini_set('display_errors', 'on');

require 'connex_base.php'; // connexion à la base de donnée





if (isset($_POST['creer_sujet'])){
          
          if(!empty($_POST['titre'])  && !empty($_POST['contenu']) && !empty($_POST['categorie'])){
                  $title = htmlentities(trim($_POST['titre']));
                  $contenu = htmlentities(trim($_POST['contenu']));
                  $categorie = (int) htmlentities(trim($_POST['categorie']));
                  
                   $insertion =$conn->prepare("INSERT INTO topic (id, id_forum, titre, contenu, id_user) VALUES (?, ?, ?, ?, ?)");
                    $insertion->execute(array(null,$categorie, $title, $contenu, '2'));
                    
                    //header('Location: question.php');
                    
                    echo "Votre sujet a été créé avec succès";
            }
            else{
              echo "Veuillez remplir tout les champs Svp";
              }
            
            //if(isset($_POST['titre']) && isset($_POST_['contenu'])){
              
                
               
                //$insertion = "INSERT INTO `topic`(`id`, `id_forum`, `titre`, `contenu`, `id_user`) VALUES (null,'2',$title,$contenu,'1')";
                //$conn->exec($insertion);
                  
                 
                    
                    //$execute = $conn->exec($insertion);
                    //if($execute == true){
                      
                      //$messageS = "Votre sujet à bien été créé";
                      //}
                  
                  //else{
                    //$messageE ="Quelque chose n'a pas fonctionner, vérifier les champs de saisies";
                    //}
              
            
      }      
              
?>
          
  
  
  
  <?php
  

?>
</div>

          <form method="POST" action="build_topic.php" style="border:solid 3px #ff7900; width:50%; margin:auto; padding:3%">
                        
                        
                        <select name="categorie" id="cat-select" style="width:100%; padding:2%; border-radius:4px">
                          
                          <?php
                                            if(!isset($categorie)){
                                            ?>
                                            <option selected>Sélectionner votre catégorie</option>
                                            <?php
                                            }else{
                                            ?>
                                            <option value="<?= $categorie ?>"></option>
                                            <?php   
                                            }
                                        ?>
                          
                          
                             <?php
                                            
                                            $req_cat = $conn->query("SELECT * FROM `forum`");

                                            //$req_cat = $req_cat->fetchALL();

                                            foreach($req_cat as $rc){
                              ?>
                          
                                  <option value="<?= $rc['id'] ?>"><?= $rc['titre'] ?></option>
                            <?php
                                    }   
                            ?>
                        </select><br><br>
                        
                        
                       
                            <div class="form-group">
                             <input class="form-control" type="text" placeholder="Votre titre" name="titre" style="width:100%; padding:2%; border-radius:4px">   
                            </div><br>
                          
                          
                            <div class="form-group">
                                <textarea class="form-control" rows="3" placeholder="Décrivez votre sujet" name="contenu" style="width:100%; padding:2%; border-radius:4px"></textarea>
                            </div><br>

                        
                            
                        <input type="submit"  name="creer_sujet"  value="Envoyer"style=" padding:1%; border-radius:4px; position:relative; float:left">
        </form><br>
        
        
        
    </body>
</html>
    </div>

<!--footer-->
<footer>
  <div class="blocf">
        <div class="adresse">
                <span><i class="fas fa-map-marker-alt"></i></span>
                <span>49 bd siegfried 76130,</span><br>
                <span>Mont Saint Aignan</span>
        </div>
        <div class="apropo"><h1>À propos de nous</h1>
                <p>À propos de nous efbbfu beufbefedbuhegvxbfu cebu</p>
        </div><br><br>
        
        <div class="contact">
        <i class="fas fa-phone-alt">  +33758314279</i><br><br>
        <i class="fas fa-envelope">   oladimejihappy@gmail.com</i>
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
<?php
           require('footer.php');
        ?>
</html>

