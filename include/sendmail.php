<?php
 
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
include '../database/connect.php';
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
 // Địa chỉ email người gửi

$sql ="SELECT * FROM admin ";
$stmt = mysqli_stmt_init($connect);
if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:../include/restore_password.php?error=sqlFailed");
            exit();
    }
mysqli_stmt_execute($stmt);
$resultData = mysqli_stmt_get_result($stmt);
while($rowAdmin= mysqli_fetch_assoc($resultData)){
    $fromName = $rowAdmin['ad_name'];
    $fromEmail = $rowAdmin['ad_email'];
    $pswMail = $rowAdmin['ad_psw_email'];
}
//mk  tu database
        try {
                    //Server settings
                    $mail->SMTPDebug = 0;// Enable verbose debug output
                    $mail->isSMTP();// gửi mail SMTP
                    $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
                    $mail->SMTPAuth = true;// Enable SMTP authentication
                    $mail->Username = $fromEmail;// SMTP username
                    $mail->Password = $pswMail; // SMTP password
                    $mail->SMTPSecure = 'tls';// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                    $mail->Port = 587; // TCP port to connect to
                
                    //Recipients
                    // Thiết lập gửi email
                    $mail->setFrom($fromEmail, $fromName);
                    $mail->addAddress($row['email'], $row['fullname']); // Add a recipient
                    // Name is optional
                    // $mail->addAddress('ellen@example.com'); 
                    // $mail->addReplyTo('info@example.com', 'Information');
                    // $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');
                
                    // Attachments
                    // $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
                
                    // Content
                    $mail->isHTML(true);   // Set email format to HTML
                    $mail->Subject = 'Hi '.$row['fullname'];
                    // đường link sẽ đổi lại khi có domain
                    $mail->Body = '<p>Your code: <b>'.$row['code_password'].'</b></p> <p><a href="http://localhost:4000/include/change_password.php">Click here</a> to change your password</p>';
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                
                    $mail->send();
                    echo '<p>Message has been sent</p>';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
mysqli_stmt_close($stmt);
mysqli_close($connect);

        
      