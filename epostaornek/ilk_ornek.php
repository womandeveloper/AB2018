<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
//require 'vendor/autoload.php';
require_once 'src/PHPMailer.php';
require_once 'src/Exception.php';
require_once 'src/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    //$mail->Username = 'f80676e0164323';                 // SMTP username
    //$mail->Password = '56df70b2f53955';                 // SMTP password
    $mail->Username = '37be01dc6ae381';                 // SMTP username
    $mail->Password = 'dc92f882734835';  
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
	$mail->SetLanguage("tr", "phpmailer/language");
	$mail->CharSet  ="utf-8";
	$mail->Encoding="base64";
	
    //Recipients
    $mail->setFrom('ozturkcagla041@gmail.com', 'Çağla');	//göndericiyi tanımlıyoruz Mailer:gönderici ismi nasıl gozuksun
    $mail->addAddress('ugurarici@gmail.com', 'Uğur');       // Add a recipient alıcı adresi ve alıcı ismi
    $mail->addAddress('ellen@example.com');                // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');	//cc bilgi sahıbı olmak ıcın
    $mail->addCC('cc@example.com');	
    $mail->addBCC('bcc@example.com');		//alıcının bılgı sahıbı olması ıcın

    //Attachments
    $mail->addAttachment('cagla.txt');         // Add attachments
    $mail->addAttachment('cagla.png', 'cagla.png');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Çağla Öztürk';
    $mail->Body    = 'Benim adım ÇAĞLA <b>soyadım ÖZTÜRK!</b>';
    $mail->AltBody = 'Heyyyy Orda mısınnnn';

    $mail->send();
    echo 'Mesaj gonderildi';
} catch (Exception $e) {
    echo 'Mesaj gonderilemedi.';
    echo 'Hata: ' . $mail->ErrorInfo;
}
?>