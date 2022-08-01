<?php
  require_once 'connex_base.php';



// Variable utilisé pour afficher une notification d'erreur ou de succès
$msg = '';
 
if (!empty($_POST)) {	// Si le formulaire a été soumis
	if (!empty($_POST['email'])) {	// Si le formulaire est correctement remplit
		// On fait une requête pour savoir si l'adresse e-mail est associé à un compte
		$query = $conn->prepare('SELECT COUNT(*) AS nb FROM utilisateurs WHERE email = ?');
		$query->bindValue(1, $_POST['email']);
		$query->execute();
 
		$row = $query->fetch(PDO::FETCH_ASSOC);
 
		if (!empty($row) && $row['nb'] > 0) {	// Si l'adresse courriel est associé à un compte
			// On génère notre token
			$string = implode('', array_merge(range('A','Z'), range('a','z'), range('0','9')));
            $token = substr(str_shuffle($string), 0, 20);
            $email = htmlspecialchars($_POST['email']);
 
			// On insère la date et le token dans la DB
			$query = $conn->prepare('UPDATE utilisateurs SET password_recovery_asked_date = NOW(), password_recovery_token = ? WHERE email = ?');
			$query->bindValue(1, $token);
			$query->bindValue(2, $email);
			$query->execute();
 
			// On prépare l'envoie du courriel
			$link = 'http://localhost/Pro_LW_20/reinitialisation_motdepasse.php?token='.$token;
			$to = $_POST['email'];
			$subject = 'Réinitisalisation de votre mot de passe';
			$message = '<h1>Réinitisalition de votre mot de passe</h1><p>Pour réinitialiser votre mot de passe, veuillez suivre ce lien : <a href="'.$link.'">'.$link.'</a></p>';
 
			// On défini les entêtes requis
			$header = [];
			$headers[] = 'MIME-Version: 1.0';
			$headers[] = 'Content-type: text/html; charset=utf-8';
			$headers[] = 'To: '.$to.' <'.$to.'>';
			$headers[] = 'Langage Web <info@langageweb.tld>';
 
			// On envoie le courriel
			mail($to, $subject, $message, implode("\r\n", $headers));
 
			$msg = '<div style="color: green;">Un courriel a été acheminé. Veuillez regarder votre boîte aux lettres et suivre les instructions à l\'intérieur du courriel.</div>';
		} else {	// Si elle n'est pas associé à un compte
			$msg = '<div style="color: red;">Cette adresse courriel n\'a pas été trouvée dans la base de données.</div>';
		}
	} else {	// Si le formulaire n'est pas correctement remplit
		$msg = '<div style="color: red;">Veuillez spécifier une adresse courriel.</div>';
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
      <link rel="stylesheet" href="recherche.css">
      <title>mot de passe oublie</title>
    </head>
    <body>
      <div class="login-form">
        <form action ="" method="post">
          <h2 class="text-center">Récupération de mot de passe</h2> 
          <?php echo $msg; ?><br />
          <div class="form-group">
              <input type="text" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
          </div>
          <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Envoyer un email de récupération</button>
          </div>
        </form>
      </div>
    </body>
  </html>








