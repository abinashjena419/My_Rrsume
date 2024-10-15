<?php

require_once "Mail.php";

print_r ($_POST);

//$_POST['name'];
//$_POST['email'];
//$_POST['subject'];
//$_POST['message'];

$from = 'My-Resume Website <abinashjena419@gmail.com>';
$to = '<abinashjena419@gmail.com>';
$subject = "Mail from My-Resume wesite";


$body = "Name\t:" . $_POST['name'] . "\n";
$body = $body . "email\t:" . $_POST['email'] . "\n";
$body = $body . "subject\t:" . $_POST['subject'] . "\n";
$body = $body . "--------------------------------\n";
$body = $body . $_POST['message'] . "\n";


$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'abinashjena419@gmail.com',
        'password' => 'fkzr jcyr fqvc gvsy'
    ));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
    echo('<p>' . $mail->getMessage() . '</p>');
} else {
    echo('<p>Message successfully sent!</p>');
}

?>