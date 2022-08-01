<?php
  require_once 'connex_base.php';
  
  // Variable utilisé pour afficher une notification d'erreur ou de succès
$msg = '';
 
if (empty($_GET['token'])) {	// Si aucun token n'est spécifié en paramètre de l'URL
	echo 'Aucun token n\'a été spécifié';
	exit;
}
 
// On récupère les informations par rapport au token dans la base de données
$query = $conn->prepare('SELECT password_recovery_asked_date FROM utilisateurs WHERE password_recovery_token = ?');
$query->bindValue(1, $_GET['token']);
$query->execute();
 
$row = $query->fetch(PDO::FETCH_ASSOC);
 
if (empty($row)) {	// Si aucune info associée au token n'est trouvé
	echo 'Ce token n\'a pas été trouvé';
	exit;
}
 
// On calcul la date de la génération du token + 3hrs
$tokenDate = strtotime('+3 hours', strtotime($row['password_recovery_asked_date']));
$todayDate = time();
 
if ($tokenDate < $todayDate) {	// Si la date est dépassé le délais de 3hrs
	echo 'Token expiré !';
	exit;
}
 
if (!empty($_POST)) {	// Si le formulaire a été soumis
	if (!empty($_POST['password']) && !empty($_POST['password_confirm'])) {	// Si le formulaire est correctement remplit
		if ($_POST['password'] === $_POST['password_confirm']) {	// Si les deux mots de passes sont les mêmes
      // On hash le mot de passe
      $password = hash('sha256', $_POST['password']);
			//$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

      $stmt = $conn->prepare('SELECT email from utilisateurs WHERE password_recovery_token = ?');
      $stmt->execute([$_GET['token']]);
      $email = $stmt->fetchColumn();
    
      // On modifie les informations dans la base de données
      $sql = 'UPDATE utilisateurs SET password = ?, password_recovery_token = NULL WHERE email = ?';
      $stmt = $conn->prepare($sql);
      $stmt->execute([$password, $email]);

			$msg = '<div style="color: green;">Le mot de passe a été changé !</div>';
		} else {	// si les deux mots de passe ne sont pas identiques
			$msg = '<div style="color: red;">Les deux mots de passes ne sont pas identiques.</div>';
		}
	} else {
		$msg = '<div style="color: red;">Veuillez remplir tous les champs du formulaire.</div>';
	}
}
?>
<!DOCTYPE html>
  <html lang="fr">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="author" content="NoS1gnal"/>

      <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="style.css">
      <title>mot de passe oublie</title>
    </head>
    <body>
      <div class="login-form">
        <form action ="reinitialisation_motdepasse.php?token=<?php echo $_GET['token']; ?>" method="post">
          <h2 class="text-center">Réinitialiser le mot de passe</h2> 
          <?php echo $msg; ?><br />
          <div class="form-group">
              <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
          </div>
          <div class="form-group">
              <input type="password" name="password_confirm" class="form-control" placeholder="Resaisir le mot de passe" required="required" autocomplete="off">
          </div>
          <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Valider</button>
          </div>
        </form>
      </div>
    </body>
  </html>





