<?php

require '../src/functions.php';

if(!empty($_POST)){

    $title = $_POST['title'];
    $adress = $_POST['adresse'];
    $ville = $_POST['ville'];
    $cp = $_POST['cp'];
    $prix = str_replace(',', '.', $_POST['prix']);
    $surface = str_replace(',', '.', $_POST['surface']);
    $type = $_POST['type'];


    $error = validformAnnonce($title, $adress, $ville, $cp, $prix, $surface, $type);

    if(empty($error)){
        
        if ( preg_match ("~^[0-9]{5}$~",$_POST['cp'])){

            $title = htmlspecialchars($_POST['title']);
            $adress = htmlspecialchars($_POST['adresse']);
            $ville = htmlspecialchars($_POST['ville']);
            $photo = htmlspecialchars($_POST['photo']);
            $cp = $_POST['cp'];
            $prix = str_replace(',', '.', $_POST['prix']);
            $surface = str_replace(',', '.', $_POST['surface']);
            $type = intval($_POST['type']);
            $description = htmlspecialchars($_POST['description']);
    
            insertAnnonce($title, $adress, $description, $ville, $photo, $cp, $prix, $surface, $type);
            addFlashMessage('Votre annonce à bien été créer');
            header('Location: index.php');


        }
    }

}




render('add_form_logement',[]);