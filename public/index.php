<?php

require '../src/functions.php';

$flashMessages = FecthAllFlashMessages();

$annonces = getAllAnnonce();

render('index',[
    'flashMessages' => $flashMessages,
    'annonces' => $annonces
]);