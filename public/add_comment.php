<?php

require '../src/functions.php';


$content = strip_tags($_POST['content']);
$productId = intval($_POST['annonce-id']);

// Insertion du commentaire dans la table comments
insertComment($content, $productId);


// création d'un message falsh
addFlashMessage('Votre commentraire à bien été enregistrer !');


// Redirection vers la page du produit
header('Location: product.php?id=' . $productId);
exit;