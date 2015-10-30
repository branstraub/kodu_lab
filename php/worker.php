<?php

require("sendgrid-php/sendgrid-php.php");


$api_user= "azure_5f3831ea10a61e05956d9d7874210834@azure.com";
$api_key= "56V1nAelM4oPjbT";

$email = $_POST["email"];
$message = $_POST["message"];
$name = $_POST["name"];
$email_final = $email;
$email = "'".$email."'";


echo $name;
echo $message;
echo $email;


    $sendgrid = new SendGrid($api_user, $api_key);
    $email_sd = new SendGrid\Email();

    $html = "Nombre: ".$name. ":<br> Email:".$email."<br> Mensaje: ".$message;
    echo $html;

    $email_sd->addTo($email_final)
          ->setFrom("b.straub@outlook.com")
          ->setSubject("Contacto - Kodu")
          ->setHtml($html);

    $sendgrid->send($email_sd);
  
    



?>

