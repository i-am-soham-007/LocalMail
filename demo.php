<!DOCTYPE html>
<html>
<head>
	<title>MAIL LOCALHOST</title>
</head>
<body>
<form action="" method="POST">
	EMAIL
	<input type="text" name="email">
	<br>
	<br>
	SUBJECT
	<input type="text" name="subject">
	<br><br>
	<textarea name="message">
		
	</textarea>
	<br><br>
	<input type="submit" name="send" value="SEND">
</form>
</body>
</html>

<?php
extract($_POST);

if(isset($send))
{
	$myemail ='makvanabhumika2225@gmail.com';
	$pass ='7043148728';
	
	require 'PHPMailerAutoload.php';
	//require 'credential.php';

	$mail = new PHPMailer;

	$mail->SMTPDebug = 4;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	  $mail->Host = "tls://smtp.gmail.com";  // Specify main and backup SMTP servers

	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to
	$mail->Username = $myemail;                 // SMTP username
	$mail->Password = $pass;

	$mail->setFrom($myemail, 'Mail Testing Localhost');
	$mail->addAddress($email);     // Add a recipient
	$mail->addReplyTo($myemail);
	
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = $subject;
	$mail->Body    = '<div style="border:2px solid;">This is the HTML message body <b>in bold!</b></div>';
	$mail->AltBody = $message;

	if(!$mail->send()) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	    echo 'Message has been sent';
	}
}	
?>