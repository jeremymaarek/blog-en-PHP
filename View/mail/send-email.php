<?php
require 'vendor/autoload.php'; 

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("jeremy.maarek@gmail.com", "Jeremy");
$email->setSubject("Nouveau mail du blog");
$email->addTo("jeremy.maarek@gmail.com", "Jeremy");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);
$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
} 
