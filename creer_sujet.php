<?php
@ini_set('display_errors', 'on');
require 'db_class.php'; // connexion à la base de donnée

$DB = new DB();

if(!empty($_POST)){
        extract($_POST);
        $valid = true;

        if (isset($_POST['creer_sujet'])){

            // Récupération de nos différents champs
            $titre  = htmlentities(trim($titre)); 
            $contenu = htmlentities(trim($contenu)); 
            $categorie = (int) htmlentities(trim($categorie));

            if(empty($titre)){
                $valid = false;
                $er_titre = ("Il faut mettre un titre");
            }       

            if(empty($contenu)){
                $valid = false;
                $er_contenu = ("Il faut mettre un contenu");
            }       

            if(empty($categorie)){ 
                $valid = false;
                $er_categorie = "La catégorie ne peut pas être vide";

            }else{
                // On vérifit que la catégorie existe
              //$DB = new DB();
                $verif_cat = $DB->query("SELECT  id, titre FROM  forum  WHERE  id = ?",
                    array($categorie));

                //$verif_cat =  !empty($_POST['titre']) ? $_POST['titre'] : NULL;


                if (!isset($verif_cat['id'])){
                    $valid = false;
                    $er_categorie = "Cette catégorie n'existe pas";
                }
            }

            if($valid){
                $date_creation = date('Y-m-d H:i:s');
                $DB = new DB();
                $DB->insert("INSERT INTO topic (id_forum, titre, contenu, date_creation, id_user) VALUES 
                    (?, ?, ?, ?, ?)", 
                    array($categorie, $titre, $contenu, $date_creation, $_SESSION['id']));
                    
                    echo 'Entrée ajoutée dans la table';

                header('Location: question.php' . $categorie);
                exit;
           }
        }
    }
    
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
  <header>
    
        <div id="mainbox" onclick="openFunction()">&#9776; </div>
              <div id="menu" class="sidemenu">
               <a href="#">Acceuil</a>
               <a href="#">À propos</a>
               <a href="#">Contact</a>
               <a href="#">Se connecter</a>
               <a href="#" class="closebtn" onclick="closeFunction()">&times;</a>
      </div>
      <span class="bloc-gauche">
      <span class="search"><i class="fas fa-search "></i></span>
      <span class="connex">connexion</span>
      <span class="creer">créer un compte</span>
      </span>
  </header>
  <div class="container">
<h1>Créer mon sujet</h1>

          <form method="post" action="creer_sujet.php">
                        
                        <input type="text" name="nom" id="nom" placeholder="Votre nom"><br><br>
                        <select name="categorie" id="cat-select">
                          
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
                                            $DB = new DB();
                                            $req_cat = $DB->query("SELECT * FROM `forum`");

                                            //$req_cat = $req_cat->fetchALL();

                                            foreach($req_cat as $rc){
                              ?>
                          
                                  <option value="<?= $rc['id'] ?>"><?= $rc['titre'] ?></option>
                            <?php
                                    }   
                            ?>
                        </select><br><br>
                        
                        
                        <?php
                                if (isset($er_titre)){
                                ?>
                                    <div class="er-msg"><?= $er_titre ?></div>
                                <?php   
                                }
                            ?>
                            <div class="form-group">
                             <input class="form-control" type="text" placeholder="Votre titre" name="titre" value="<?php if(isset($titre)){ echo $titre; }?>">   
                            </div><br>
                          <?php
                                if (isset($er_contenu)){
                                ?>
                                    <div class="er-msg"><?= $er_contenu ?></div>
                                <?php   
                                }
                            ?>
                            <div class="form-group">
                                <textarea class="form-control" rows="3" placeholder="Décrivez votre sujet" name="contenu"><?php if(isset($contenu)){ echo $contenu; }?></textarea>
                            </div>

                        
                            
                        <input type="submit"  name="creer_sujet"  value="Envoyer">
        </form>
        
        
        
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
</html>

