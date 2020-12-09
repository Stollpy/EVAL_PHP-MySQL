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