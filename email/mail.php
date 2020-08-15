<?php 
// https://github.com/PHPMailer/PHPMailer
// https://desarrolloweb.com/articulos/variables-entorno-php-env.html
// https://github.com/vlucas/phpdotenv
// https://www.hostinger.es/tutoriales/como-usar-el-servidor-smtp-gmail-gratuito/
// https://www.youtube.com/watch?v=ol0EAYvwyH4&list=PLvRPaExkZHFkpBXXCsL2cn9ORTTcPq4d7&index=37
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
echo $_ENV["PASSWORD"];
function sendEmail(){
    if( isset($_POST["name"])    &&
        isset($_POST["comment"]) &&
        isset($_POST["email"])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $comment = $_POST['comment'];
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.office365.com';                   // Specify main and backup SMTP servers
            // $mail->Host = 'smtp.gmail.com';                   // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'thom.maurick.r@hotmail.com';                 // SMTP username
            $mail->Password = $_ENV["PASSWORD"];                           // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('thom.maurick.r@hotmail.com', 'Mailer');
            $mail->addAddress('thomtwd@gmail.com', 'Mailer');     // Add a recipient
            //$mail->addAddress('ellen@example.com');               // Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Correo de contacto';
            $mail->Body    = 'Nombre: ' . $name . '<br/>Correo: ' . $email . '<br/>' . $comment;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }

    }else{
        return;
    }
}
    sendEmail();

?>