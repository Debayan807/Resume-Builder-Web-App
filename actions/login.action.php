<?php

require '../assets/class/database.class.php';
require '../assets/class/function.class.php';


if($_POST){

    $post=$_POST;

    if( $post['email'] && $post['password']){


      
      $email= $db->real_escape_string($post['email']);
       $password= md5($db->real_escape_string($post['password']));


$result=$db->query("SELECT id, Full_Name  FROM users WHERE (email='$email' && password='$password')");

      $result=$result->fetch_assoc();

      if($result){
       /** @var \mysqli $fn **/
   $fn->setAuth($result);
  /** @var \mysqli $fn **/
  $fn->setAlert('Logged in !!');
   /** @var \mysqli $fn **/
   $fn->redirect('../myresumes.php');
       
      
      }
      else{
   /** @var \mysqli $fn **/
   $fn->setError('Incorrect email or password' );
   /** @var \mysqli $fn **/
   $fn->redirect('../login.php');
      }
    }
    else{
        $fn->setError($email.' Please fill the form !!' );
        /** @var \mysqli $fn **/
        $fn->redirect('../login.php');
    }
}

    else{
          /** @var \mysqli $fn **/
    $fn->redirect('../login.php');
    }

?>