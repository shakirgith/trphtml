<?php
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
  
require 'vendor/autoload.php';

$mail = new PHPMailer;
if(isset($_POST['subscribeSubmit'])){
// getting post values
// $fname=$_POST['fname'];		
// $toemail=$_POST['toemail'];	
// $subject=$_POST['subject'];	
// $message=$_POST['message'];
$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'shakir@webcontxt.com';  // SMTP username
$mail->Password = 'seowork11@23'; 	// SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to
$mail->setFrom('shakir@webcontxt.com', 'Your_Name');
$mail->addReplyTo('shakir@webcontxt.com', 'Your_Name');
$mail->addAddress($toemail);   // Add a recipient
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML
$mail->Body = '<html>Hi there, we are happy to <br>confirm your booking.</br> Please check the document in the attachment.</html>';
$mail->AltBody = 'Hi there, we are happy to confirm your booking. Please check the document in the attachment.';

$attachmentPath = 'emailer.html';
if (file_exists($attachmentPath)) {
    $mail->addAttachment($attachmentPath, 'emailer.html');
}

// $bodyContent=$message;

// $mail->Subject =$subject;
// $bodyContent = 'Dear'.$fname;
// $bodyContent .='<p>'.$message.'</p>';
// $mail->Body = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
}
?>
