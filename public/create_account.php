<?php

require '../src/functions.php';


$flashMessages = FecthAllFlashMessages();

render('create_account',[
    'flashMessages' => $flashMessages
]);