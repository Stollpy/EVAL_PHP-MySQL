<?php
require '../src/functions.php';

if(!empty($_POST)){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $error = validateLoginForm($email, $password);

    if(empty($error)){


        $result = authentificate($email, $password);

        if(is_array($result)){
         
            userSessionRegister(
                $result['id'],
                 $result['firstname'],
                 $result['lastname'],
                $result['email']
            );
          
            addFlashMessage('Vous êtes connecter '.$result['firstname'].' !');
            header('Location: index.php');
            exit;

        }else{

            $flashMessages = addFlashMessage('Votre E-mail ou mot de passe est incorrect !');
        }
    }else{
        $flashMessages = addFlashMessage('Tout les champs doivents être remplis !');
    }
}

$flashMessages = FecthAllFlashMessages();


render('login',[
    'flashMessages' => $flashMessages
]);