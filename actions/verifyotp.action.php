<?php
require '../assets/class/database.class.php';
require '../assets/class/function.class.php';
if($_POST){
$post=$_POST;
if( $post['otp']){
    $otp =$post['otp'];
      /** @var \mysqli $fn **/
    if($fn->getSession('otp')==$otp){
        $fn->setAlert('Email is verified!');
        $fn->redirect('../change-password.php'); 
    }
    else{
        $fn->setError('Incorrect otp entered!!' );
        /** @var \mysqli $fn **/
        $fn->redirect('../verification.php'); 
    }
}
    else{
        $fn->setError($email.' Please enter 6 digit code sended to your email id' );
        /** @var \mysqli $fn **/
        $fn->redirect('../verification.php');
    }
}
  else{
          /** @var \mysqli $fn **/
    $fn->redirect('../verification.php');
    }

?>