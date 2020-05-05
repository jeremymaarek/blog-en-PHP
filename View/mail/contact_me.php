<?php

require 'vendor/autoload.php'; 
require_once 'key.php';

if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("jeremy.maarek@gmail.com", "Jeremy");
$email->setSubject("Nouveau mail du blog");
$email->addTo("$email_address", "$name");
$email->addContent("text/plain", "Vous avez reçu un nouveau message.\n\n"."Voici les détails de cette demande :\n\Nom: $name\n\nEmail: $email_address\n\Telephone: $phone\n\nMessage:\n$message");
$email->addContent(
    "text/html", "Vous avez reçu un nouveau message.\n\n"."Voici les détails de cette demande :\n\Nom: $name\n\nEmail: $email_address\n\Telephone: $phone\n\nMessage:\n$message"
);
$sendgrid = new \SendGrid("$key");
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
} 
