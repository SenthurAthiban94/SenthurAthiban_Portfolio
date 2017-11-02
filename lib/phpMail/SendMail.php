<?php
require 'mail_lib/PHPMailerAutoload.php';

$return=json_encode(array("response"=>"error","status"=>"Unable to Send Message!"));

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])){
    $sender_Name=$_POST['name'];
    $sender_Mail=$_POST['email'];
    $sender_Subject=$_POST['subject'];
    $sender_Message=$_POST['message'];
        
    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                                                               // Enable verbose debug output

    $mail->isSMTP();                                                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                                                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                                                               // Enable SMTP authentication
    $mail->Username = 'senthurathibanprofile@gmail.com';                                  // SMTP username
    $mail->Password = 'Senthur@profile';                                                  // SMTP password
    $mail->SMTPSecure = 'tls';                                                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                                                    // TCP port to connect to

    $mail->setFrom($sender_Mail, 'PortFolio Message From '.$sender_Name);
    $mail->addReplyTo($sender_Mail , $sender_Name);
    $mail->addAddress('senthurathiban@gmail.com', 'Senthur Athiban');                     // Add a recipient
    // $mail->addAddress('ellen@example.com');                                            // Name is optional
    
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // $mail->addAttachment('/var/tmp/file.tar.gz');                                      // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');                                 // Optional name
    $mail->isHTML(true);                                                                  // Set email format to HTML

    $mail->Subject = $sender_Subject;
    $mail->Body    = "
        <div>
            Hi <b>Senthur</b>,
        <div>
        <div>
            <p>
            ".$sender_Message."
            </p>
        </div>
    ";
    $mail->AltBody = 'Hi Senthur, '.$sender_Message;

    if(!$mail->send()) {
        echo $return;
        die;
        // echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        $return=json_encode(array("response"=>"success","status"=>"Message Sent"));
        echo $return;
        die;
    }
}
echo $return;
die;