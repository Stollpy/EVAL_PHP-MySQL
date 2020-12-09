<?php

require '../src/functions.php';

$flashMessages = FecthAllFlashMessages();

render('index',[
    'flashMessages' => $flashMessages
]);