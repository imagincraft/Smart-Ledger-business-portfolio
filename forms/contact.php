<?php
// Get data from form  
$name = $_POST['name'];
$email= $_POST['email'];
$message= $_POST['message'];
$subject = $_POST['subject'];

$to = "gayan@smartledger.co";


$txt ="Name = ". $name . "\r\n  Email = " 
    . $email . "\r\n Message =" . $message;

$headers = "From: noreply@demosite.com";
if($email != NULL) {
    mail($to, $subject, $txt, $headers);
}

// Redirect to
header("Location:last.html");
?>