<?php

require '../config.php';

/********************************
 **** CREATION CONNEXION PDO ****
 ********************************/
function getPDOConnection()
{
    // Construction du Data Source Name
    $dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST;

    // Tableau d'options pour la connexion PDO
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    // Création de la connexion PDO (création d'un objet PDO)
    $pdo = new PDO($dsn, DB_USER, DB_PASSWORD, $options);
    $pdo->exec('SET NAMES UTF8');

    return $pdo;
}

/*********************************************
 **** PREPARATION & EXECUTION REQUETE SQL ****
 *********************************************/
function prepareAndExecuteQuery(string $sql, array $criteria = []): PDOStatement
{
    // Connexion PDO
    $pdo = getPDOConnection();

    // Préparation de la requête SQL
    $query = $pdo->prepare($sql);

    // Exécution de la requête
    $query->execute($criteria);

    // Retour du résultat
    return $query;
}

/***************************************
 **** RESULTAT REQUETE SQL FETCHALL ****
 ***************************************/
function selectAll(string $sql, array $criteria = [])
{
    $query = prepareAndExecuteQuery($sql, $criteria);

    return $query->fetchAll();
}


/************************************
 **** RESULTAT REQUETE SQL FETCH ****
 ************************************/
function selectOne(string $sql, array $criteria = [])
{
    $query = prepareAndExecuteQuery($sql, $criteria);

    return $query->fetch();
}

/***********************
 **** MESSAGE FLASH ****
 ***********************/

function InitFlashBag()
{

    if(session_status() === PHP_SESSION_NONE){


        session_start();
    }

    if(!array_key_exists('flashbag', $_SESSION) || !isset($_SESSION['flashbag'])) {

        $_SESSION['flashbag'] = [];
    }

}



// Ajouter un message en session
function addFlashMessage(string $message){

    InitFlashBag();

    array_push($_SESSION['flashbag'], $message);

}


function FecthAllFlashMessages() : array {

    InitFlashBag();

    
    $flashMessages = $_SESSION['flashbag'];


    $_SESSION['flashbag'] = [];


    return $flashMessages;

}


/******************************
 **** Insérez des annonces ****
 ******************************/
    
 function insertAnnonce(string $title, string $adress, string $description, string $ville, string $photo, $cp, float $prix, float $surface, int $type) 
 {
    $sql = "INSERT INTO logement (titre, adresse, description, ville, photo, cp, prix, surface, type)
    VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    prepareAndExecuteQuery($sql, [$title, $adress, $description, $ville, $photo, $cp, $prix, $surface, $type]);
 }

 function validformAnnonce(string $title, string $adress, string $ville, $cp, float $prix, string $surface, int $type)
 {
     $error = [];

     if(!$title){
         $error[] = 'champs title obligatoire!';
     }
     if(!$adress){
         $error[] = 'champ addresse obligatoire';
     }
     if(!$ville){
         $error[] = 'champ ville obligatoire';
     }
     if(!$cp){
         $error[] = 'champ code postal obligatoire';
     }
     if(!$prix){
         $error[] = 'champ prix obligatoire';
     }
     if(!$surface){
         $error[] = 'champ surface obligatoire';
     }
     if(!$type){
         $error = 'champ type obligatoire';
     }

     return $error;
 }

 /***************************
 **** Liste des annonces ****
 ****************************/
 function getAllAnnonce()
 {
     $sql ='SELECT logement.id, titre, ville, photo, type, prix, category.name, cp
     FROM logement
     INNER JOIN category ON category.id = type
     ORDER BY createdAt DESC';

     return selectAll($sql);
 }

  /******************************
 **** Annonce en fonction ID ****
 ********************************/
function getAnnonceById(int $id)
{
    $sql ='SELECT logement.id, titre, ville, photo, type, prix, category.name, cp, description, createdAt, adresse
    FROM logement
    INNER JOIN category ON category.id = type
    WHERE logement.id = ? ';

    return selectOne($sql, [$id]);
}


// formatage datetime
function format_date($date)
{
    $objDate = new DateTime($date);
    return $objDate->format('d/m/Y');
}




/************************
 **** RENDU TEMPLATE ****
 ************************/

function render(string $template, array $values = [], string $baseTemplate = 'base')
{
    // Extraction des variables
    extract($values);


    // Inclusion du template de base
    include '../templates/'.$baseTemplate.'.phtml';
}