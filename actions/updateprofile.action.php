<?php
session_start();
require '../assets/class/database.class.php';
require '../assets/class/function.class.php';


if($_POST){

    $post=$_POST;

    if($post['Full_Name'] && $post['email']){


       $Full_Name=$db->real_escape_string($post['Full_Name']);
      $email= $db->real_escape_string($post['email']);
       $password= md5($db->real_escape_string($post['password']));

$authid = $fn->Auth()['id'];
$result=$db->query("SELECT COUNT(*) as user FROM users WHERE (email='$email' && id!=$authid)");

      $result=$result->fetch_assoc();

      if($result['user']){
       
          /** @var \mysqli $fn **/
        $fn->setError($email.' is already registered !!' );
        /** @var \mysqli $fn **/
        $fn->redirect('../account.php');
        die();
      }
       if($password!=''){
        $db->query("UPDATE users SET Full_Name='$Full_Name',email='$email', password='$password' WHERE id=$authid");
       }
       else{
        $db->query("UPDATE users SET Full_Name='$Full_Name',email='$email' WHERE id=$authid");
       }
       
        $fn->setAlert('You Registered Successfully !!');
               /** @var \mysqli $fn **/
    $fn->redirect('../account.php');
       
     
      
    }
    else{
        $fn->setError($email.' Please fill the form !!' );
        /** @var \mysqli $fn **/
        $fn->redirect('../account.php');
    }
}

    else{
          /** @var \mysqli $fn **/
    $fn->redirect('../account.php');
    }

?>