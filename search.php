
<!DOCTYPE html>
  <html lang="fr">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="author" content="NoS1gnal"/>

      <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="recherche.css">
      <script src="https://kit.fontawesome.com/f7c49bce16.js" crossorigin="anonymous"></script>
      
      <title>Barre de recherche</title>
    </head>
    
    
    <body>
      <?php
  require('header.php');
  ?>
      <div class="login-form">
        <form action ="recherche.php" method="get">
          <div class="form-group">
              <input type="search" name="q" class="form-control" placeholder="Recherche" required="required" autocomplete="off">
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Rechercher">
          </div>
        </form>
      </div>
      
      <script src="projet.js"></script>
    </body>
      <?php
  require('footer.php');
  ?>
  </html>
