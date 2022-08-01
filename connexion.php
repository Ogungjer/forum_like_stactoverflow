
<?php
    session_start(); //permet de demarrer une session
    require_once 'connex_base.php'; //inclure la base de donnée
    if(isset($_POST['email']) && isset ($_POST['password'])) //verife que l'email et le mot de passe existe
    {
      
      $email = htmlspecialchars($_POST['email']);
      $password= htmlspecialchars($_POST['password']);
      
      $check = $conn->prepare('SELECT id, pseudo, email, password FROM utilisateurs WHERE email = ?'); // verifie si la personne est inscrite
      $check->execute(array($email));
      $data = $check->fetch();
      $row = $check->rowCount();
      
      if($row == 1) //signifie que l'utilisateur est dans la base de donnée
      {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) // Verifie si l'email est valide
        {
          $password = hash('sha256', $password); // permet de hasher le mot de passe
          
          if($data['password'] === $password)
          {
          
            $_SESSION['user'] = $data['pseudo'];
            
            header('Location: index.php');
            die();
          }else header('Location: index.php?login_err=password');
        }else header('Location: index.php?login_err=email');
      }else header('Location: index.php?login_err=already');
    }else header('Location : index.php');
?>
