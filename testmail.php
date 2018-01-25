<?php
error_reporting(E_ALL);
ini_set('display_error', 1);
require_once "Mail.php";

$from = "payinfo.biz <support@denorainvest.com>";
$to = "Finance <fe@payneteasy.com>";
$subject = "Hi!";
$body = "Hi,\n\nHow are you?";

$host = "95.211.230.239";
$port = "25";
$username = "support@denorainvest.com";
$password = "dnrJKEn77))";

$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'port' => $port,
    'auth' => true,
    'username' => $username,
    'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
  echo("<p>" . $mail->getMessage() . "</p>");
 } else {
  echo("<p>Message successfully sent!</p>");
 }
?>