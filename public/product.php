<?php

require '../src/functions.php';

if (!isset($_GET['id'])) {
    echo 'Error : no valid product id';
    exit;
}

$annonceId = intval($_GET['id']);

$annonce = getAnnonceById($annonceId);

$flashMessages = FecthAllFlashMessages();

$comments = getCommentsByAnnonceId($annonceId);


render('product',[
    'annonce' => $annonce,
    'flashMessages' => $flashMessages,
    'comments' => $comments
]);