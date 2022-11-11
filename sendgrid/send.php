
<?php
require 'vendor/autoload.php'; 

$api="Enter API KEY";
$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("nikolastevanovic449@gmail.com", "Nikola");
$email->setSubject("News");
$email->addTo("nikolastevanovic4449@gmail.com", "nikola");
$email->addContent("text/plain", "Poštovani,

Objavili smo vest kategorije {naziv_kategorije_kojoj_se_korisnik_pretplatio} kojoj ste se pretplatili.

Vest mozete pročitati na sledećem linku {link_do_vesti, npr http://localhost/news/user_index.php

S poštovanjem,

Redakcija");

$sendgrid = new \SendGrid($api);
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}

?>
