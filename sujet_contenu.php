
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
  
  
  
  <?php
  session_start();
@ini_set('display_errors', 'on');
require 'db_class.php'; // connexion à la base de donnée
require 'connex_base.php'; // connexion à la base de donnée

$get_id_forum =(int)trim(htmlspecialchars ($_GET['id_forum'])); //recuperer l'id
$get_id_topic =(int)trim(htmlspecialchars ($_GET['id_topic'])); //recuperer l'id

if(empty($get_id_forum) || empty($get_id_topic)){
  header("Location: question.php ");
  exit;
  }


$DB = new DB();
$req = $DB->query("SELECT t. * , u.prenom
        FROM  topic t 
        LEFT  JOIN utilisateur u ON u.id = t.id_user
        WHERE t. id = ? AND t. id_forum = ?
        ORDER BY  t. date_creation ", 
        array($get_id_topic, $get_id_forum)); // t a été utiliser pour faire une jointure pour l'affichage du nom

    
    
    //requette pour afficher les réponse

    $req_reponse = $DB->query("SELECT  TC. * , u.prenom
        FROM  topic_reponse TC  
        LEFT  JOIN utilisateur u ON u.id = TC.id_user
        WHERE TC. id_topic = ? 
        ORDER BY  TC. date_réponse ", 
        array($get_id_topic));
 
 
 
 if(isset($_POST['participer'])){
   $valid = true;
   // On récupère le contenu du commentaire
		$text = $_POST['text'];
  
      

 
				 //On insère le commentaire dans la base de données
         echo "Bonjour";
         if($valid){
				//$conn->insert("INSERT INTO topic_reponse (id_topic, id_user, réponse_user) VALUES (?, ?, ?)", 
					//array($get_id_topic, '1', $text));
          //$DB = new DB();
          $insertion =$conn->prepare("INSERT INTO topic_reponse (id, id_topic, id_user, réponse_user) VALUES (?, ?, ?, ?)");
                    $insertion->execute(array(null, $get_id_topic,    '2', $text));
                    header("Location: sujet_contenu.php?id_forum=$get_id_forum&id_topic= $get_id_topic ");
                    exit;
           echo $text;
          }
    }
?>


  
  
  
  
  
  
  <div class="container">
       <?php
        foreach($req as $r){
        ?>                       
      <h1 class="fm">SUJET: <?= $r['titre'] ?> </h1>
                              
              <div style="background: white; box-shadow: 10px -5px 15px gray; padding: 5px 10px; border-radius: 12px; width:70%; position:relative; margin:auto">
                        <h3 style="text-align:left">Question</h3>
                        <div style="border-top: 7px solid #eee; padding: 10px 0"><?= $r['contenu'] ?></div>
                        <div style="color: #CCC; font-size: 14px; text-align: right; font-style: italic; font-weight:bold">
                            <?= $r['date_creation'] ?>
                            par 
                            <?= $r['prenom'] ?>
                        </div>              
                    </div>
                    <?php
                      }
                      ?>
                      
                      
                      
                      
                      
                      <?php
                    //à completer condition champs vide
                    ?>
                    
                    <?php
                      if(isset($_SESSION['user'])){
                    ?>
                    <div style="background: white; box-shadow: 10px -5px 15px gray; padding: 5px 10px; border-radius: 12px; width:70%; position:relative; margin:auto">
                        <h3 style="text-align:left">Participer</h3>
                         
                    <form method="post">
                      <?php
                              if(empty($text)){
                                  $valid = false;
                                  echo "Il faut mettre un commentaire";
                                }elseif(iconv_strlen($text, 'UTF-8') <= 3){
                                  $valid = false;
                                  echo "Il faut mettre plus de 3 caractères";
                                  }
                      
                      
                      ?>
                        <div class="form-group">
                          <textarea class="form-control" name="text" required rows="4" style="width:100%; border-radius:7px"></textarea>
                        </div>
                        <div class="form-group">
                        	<button class="btn btn-primary" type="submit" name="participer">Envoyer</button>
                        </div>
                    </form>
                        
                    </div>
                    
                   
                  
                  <?php
                      }
                    ?>  
                      
                      
                      
                    
             
             
             <?php
        foreach($req_reponse as $rc){
        ?>         
            <div style="background: white; box-shadow: 10px -5px 15px gray; padding: 5px 10px; border-radius: 12px; width:70%; margin:auto;margin-top:3%">
                        <h3 style="text-align:right">Réponses</h3>
                        <div style="border-top: 7px solid #eee; padding: 10px 0"><?= $rc['réponse_user'] ?></div>
                        <div style="color: #CCC; font-size: 14px; text-align: right; font-style: italic; font-weight:bold">
                            <?= $rc['date_réponse'] ?>
                            par 
                            <?= $rc['prenom'] ?>
                        </div>              
                    </div>
                                <?php
                                }
                                ?>
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

