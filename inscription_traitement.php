<?php
  require('header.php');
  ?>
<?php 
    // Permet d'afficher les erreurs dans le navigateur 
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    //include la base de donnéé
    require_once 'connex_base.php';

    if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype'])) //verifie si pseudo,email,password et password_retype existe
    {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);

        $check = $conn->prepare('SELECT pseudo, email, password FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row == 0){ // signifie que l'utilisateur n'est pas dans la base de donnée
            if(strlen($pseudo) <= 100){
                if(strlen($email) <= 100){
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                        if($password == $password_retype){

                            $password = hash('sha256', $password);

                            $insert = $conn->prepare('INSERT INTO utilisateurs (pseudo, email, password) VALUES(:pseudo, :email, :password)');
                            $insert->execute(array(
                                'pseudo' => $pseudo,
                                'email' => $email,
                                'password' => $password
                            ));

                            header('Location:inscription.php?reg_err=reussie');
                        }else header('Location: inscription.php?reg_err=password');
                    }else header('Location: inscription.php?reg_err=email');
                }else header('Location: inscription.php?reg_err=email_length');
            }else header('Location: inscription.php?reg_err=pseudo_length');
        }else header('Location: inscription.php?reg_err=already');
    }
?>
