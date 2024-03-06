<?php
require_once 'swiftmailer/vendor/autoload.php';

$transport = new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl');
$transport->setUsername('lyronoreply@gmail.com');
$transport->setPassword('npjcgibikbmqgfoz');

$mailer = new Swift_Mailer($transport);

function sendMail($mailer, $to, $subject, $content) {
    $message = new Swift_Message($subject);
    $message->setFrom(['lyronoreply@gmail.com'=>'Lyrotopia.net']);
    $message->setTo($to);
    $message->setBody($content . "\n\nViele Grüße\nDein Team von Lyrotoia.net");
    $message->setContentType('text/html');

    $result = $mailer->send($message);
    return $result;
}

?>