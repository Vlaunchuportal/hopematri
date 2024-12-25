<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
require 'phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';

$mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        $mail->SMTPDebug  = 0;
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port       = 587;
        $mail->Host       = "smtp.gmail.com";//using smtp server
        $mail->Username   = "er.pardeep15@gmail.com";//the email which will send the email 
        $mail->Password   = "wbrttkrfuepbgrtl";//the password
        $mail->IsHTML(true);
        $mail->AddAddress($to, $username);
        $mail->SetFrom("admin@hopematri.com", "Hopematri");
?>