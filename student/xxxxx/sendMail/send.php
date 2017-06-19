<?php
require 'PHPMailerAutoload.php';
$mail = new PHPMailer;
//$mail->SMTPDebug = 3;                               
$mail->isSMTP();                                      
$mail->Host = 'smtp.gmail.com'; //sg2plcpnl0089.prod.sin2.secureserver.net //smtp.gmail.com					  
$mail->SMTPAuth = true;                               
$mail->Username = '';              
$mail->Password = '';                        
$mail->SMTPSecure = 'ssl';                            
$mail->Port = 465;                                    

$mail->addAddress('amitamora@gmail.com', 'AMIT KUMAR ');
//$mail->addAddress('sunny.stonepark@gmail.com', 'AMIT KUMAR ');  
//$mail->addAddress('rjrahulabc30@gmail.com', 'RAHUL KUMAR ');  
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Congratulations! <br/> You are Registered Successfully .....';
$mail->Body    = '<h1>Hello Participents..!<br/>You are registered Please contact </h1>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo '<h1>Message has not been sent</h1>';
}