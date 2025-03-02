<?php
require '../assets/class/database.class.php';
require '../assets/class/function.class.php';
if($_POST){
$post=$_POST;
if( $post['password']){
    $password =md5($db->real_escape_string($post['password']));
    $email= $fn->getSession('email');
    $db->query("UPDATE users SET password='$password' WHERE email='$email'");
    $fn->setAlert('Password is changed' );
    /** @var \mysqli $fn **/
    $fn->redirect('../login.php');

   
}
    else{
        $fn->setError('Please enter your new password' );
        /** @var \mysqli $fn **/
        $fn->redirect('../change-password.php');
    }
}
  else{
          /** @var \mysqli $fn **/
    $fn->redirect('../change-password.php');
    }

?>