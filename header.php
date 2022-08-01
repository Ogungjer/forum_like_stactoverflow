
<header>
    
        <div id="mainbox" onclick="openFunction()">&#9776; </div>
              <div id="menu" class="sidemenu">
               <a href="index.php">Acceuil</a>
               <a href="connex_compte*.php">Se connecter</a>
               <a href="#" class="closebtn" onclick="closeFunction()">&times;</a>
      </div>
      <span class="bloc-gauche">
      <span class="search"><a href="search.php" style="text-decoration:none; color:white"><i class="fas fa-search "></i></a></span>
      <span class="connex"><a href="connex_compte*.php" style="text-decoration:none; color:white">connexion</a></span>
      <span class="creer"><a href="inscription.php" style="text-decoration:none; color:white">créer un compte </a></span>
      </span>
      
  </header>
  
  <?php
      session_start();
      
      if(isset($_SESSION['user'])){
      ?>
      
            <a href="deconnexion.php" class="btn btn-danger btn-lg" style="text-decoration:none; color:orange">DECONNEXION</a>
      <?php
      
    }
      ?>
