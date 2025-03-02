<?php

require '../assets/class/database.class.php';
require '../assets/class/function.class.php';


if($_POST){

    $post=$_POST;

    if($post['Full_Name'] && $post['email'] && $post['password']){


       $Full_Name=$db->real_escape_string($post['Full_Name']);
      $email= $db->real_escape_string($post['email']);
       $password= md5($db->real_escape_string($post['password']));


$result=$db->query("SELECT COUNT(*) as user FROM users WHERE (email='$email' && password='$password')");

      $result=$result->fetch_assoc();

      if($result['user']){
       
          /** @var \mysqli $fn **/
        $fn->setError($email.' is already registered !!' );
        /** @var \mysqli $fn **/
        $fn->redirect('../register.php');
        die();
      }
       try{
        $db->query("INSERT INTO users(Full_Name,email,password)VALUES('$Full_Name','$email','$password')");
        $fn->setAlert('You Registered Successfully !!');
               /** @var \mysqli $fn **/
    $fn->redirect('../login.php');
       }
      catch(exception $error){
        $fn->setError($error->getMessage() );
        $fn->redirect('../register.php');
      }
      
    }
    else{
        $fn->setError($email.' Please fill the form !!' );
        /** @var \mysqli $fn **/
        $fn->redirect('../register.php');
    }
}

    else{
          /** @var \mysqli $fn **/
    $fn->redirect('../register.php');
    }

?>