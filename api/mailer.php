<?php
require_once "../vendor/autoload.php";
/*if(!isset($_POST['name'], $_POST['email'], $_POST['content'])) {
    header('Location: ../index.html');
    exit;
}*/
$to = "julius.duesseldorf@web.de";
/*$name = $_POST['name'];
$user_mail = $_POST['email'];
$content = $_POST['content'];*/
$name = "Test User";
$user_mail = "julius.duesseldorf@web.de";
$content = "jwehdg wehgd weghudwjhedb";

$resend = Resend::client(getenv('EMAIL_KEY'));

$resend->emails->send([
  'from' => $user_mail,
  'to' => $to,
  'subject' => 'Kontaktanfrage',
  'html' => '<p>' . $name . '<br>' . $content . '</p>'
]);
exit;