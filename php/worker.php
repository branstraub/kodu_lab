<?php

require("sendgrid-php/sendgrid-php.php");


$api_user= "azure_5f3831ea10a61e05956d9d7874210834@azure.com";
$api_key= "56V1nAelM4oPjbT";

$email = $_POST["email"];
$message = $_POST["message"];
$name = $_POST["name"];
$email_final = $email;
$email = "'".$email."'";




$sendgrid = new SendGrid($api_user, $api_key);
$email_sd = new SendGrid\Email();

$html = "Nombre: ".$name. ":<br> Email:".$email."<br> Mensaje: ".$message;


$email_sd->addTo("b.straub@outlook.com")
->setFrom($email_final)
->setSubject("Contacto - Kodu")
->setHtml($html);

$sendgrid->send($email_sd);
  
    



?>

