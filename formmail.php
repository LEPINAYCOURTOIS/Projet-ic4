<?php


   $telephone = $_POST['telephone'];
    $nom = $_POST['name']; 
    $expediteur = $_POST['email']; 
 	$adresse = $_POST['adresse'];
    $message = $_POST['message']; 

$message = "";

while (list($key, $val) = each($HTTP_POST_VARS)) {
  $message .= "$key : $val\n";
}


// Adresse email du destinataire
$sujet = '[Message depuis Supervision RT2]';
// Titre de l'email
$msg .= 'Le numero de la personne est :'.$telephone."\r\n\r\n";
$msg .= $message."\r\n";
// Pour envoyer un email HTML, l'en-tête Content-type doit être défini
$headers = 'MIME-Version: 1.0'."\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
$headers = 'From: '.$nom.' <'.$expediteur.'>'."\r\n\r\n";

$to = "k.lepinay@rt-iut.re";
mail($to, $sujet, $msg, $headers);

Header("Location: contact.html");


?>