<!DOCTYPE html >
<html>
<head>
  <title>Ma première page avec du style</title>
      <link rel="stylesheet" href="style.css" />
      <script src="https://kit.fontawesome.com/f7c49bce16.js" crossorigin="anonymous"></script>
</head>

<body>
  
<!--Le header-->
  <?php
  require('header.php');
  ?>
  
<!--grande image-->

<div>
        <img src="./images/sondage.jpg"  class="sondage" alt="Sondage"/>
</div>  

<div class="pquestion">
          <i class="fas fa-book fa-5x"></i>          
          <h1>Qestions et réponses publics</h1>
          <p>Obtenez des réponses à plus de 16,5 millions de questions 
          et donnez en retour en partageant vos connaissances 
          avec les autres.</p><br> <br>
          <a href="question.php">Pacourir les questions</a>
</div>  
<?php
if(isset($_SESSION['user'])){
?>
<div class="poserquestion">
      <div>
          <i class="fas fa-comments fa-5x"></i>
          <h1>Repondre ou poser des questions</h1>
          <p>Obtenez des réponses à plus de 16,5 millions de questions 
          et donnez en retour en partageant vos connaissances 
          avec les autres. </p> <br> <br>
          <a href="build_topic.php" class="plien">Posez vos questions </a>
      </div>
</div>  

<?php
}
?>

<!--footer-->
<!--
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
<!--footer-->
-->


  <script src="projet.js"></script>

</body>
<?php
            require('footer.php');
         ?>
</html>
