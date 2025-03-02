<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require '../assets/class/database.class.php';
require '../assets/class/function.class.php';



require '../assets/packages/phpmailer/src/Exception.php';
require '../assets/packages/phpmailer/src/PHPMailer.php';
require '../assets/packages/phpmailer/src/SMTP.php';

if($_POST){

    $post=$_POST;

    if( $post['email'] ){


      
      $email= $db->real_escape_string($post['email']);
      


$result=$db->query("SELECT id, Full_Name  FROM users WHERE (email='$email')");

      $result=$result->fetch_assoc();

      if($result){
        $otp = rand(100000,999999);
        $mail= new PHPMailer(true);
        try {
            //Server settings
         /** @var unset $mail */   
          /** @var \mysqli $mail **/
                            //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'debayan977@gmail.com';                     //SMTP username
            $mail->Password   = 'ohxfzltucqmxslub';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('verify@resumebuilder.com', 'Resume Builder');
            $mail->addAddress($email);     //Add a recipient
                        //Name is optional
           
       
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Forgot Password';
            $mail->Body    = 'Your 6 Digit Verification Code: <b>'.$otp.'</b>';
           
        
            $mail->send();
  /** @var \mysqli $fn **/
  $fn->setSession('otp',$otp);
  /** @var \mysqli $fn **/
  $fn->setSession('email',$email);
   /** @var \mysqli $fn **/
   $fn->redirect('../verification.php');

           
        } catch (Exception $e) {
          
             /** @var \mysqli $fn **/
           /**@var \mysqli $mail */  
   $fn->setError($mail->ErrorInfo );
   /** @var \mysqli $fn **/
   $fn->redirect('../forgot-password.php');
   
        }
      
      }
      else{
   /** @var \mysqli $fn **/
   $fn->setError($email.' is not registered' );
   /** @var \mysqli $fn **/
   $fn->redirect('../forgot-password.php');
      }
    }
    else{
        $fn->setError($email.' Please enter email id !!' );
        /** @var \mysqli $fn **/
        $fn->redirect('../forgot-password.php');
    }
}

    else{
          /** @var \mysqli $fn **/
    $fn->redirect('../forgot-password.php');
    }

?>