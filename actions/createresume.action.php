<?php

require '../assets/class/database.class.php';
require '../assets/class/function.class.php';


if($_POST){

    $post=$_POST;
    // echo "<pre>";   ctrl+k then ctrl+c  === comment 
    // print_r($post);  ctrl+k then ctrl+o === uncomment

    if($post['Full_Name'] && $post['email']  && $post['objective'] && $post['mobile_no']  && $post['dob'] && $post['gender'] && $post['religion'] && $post['nationality']  && $post['marital_status'] && $post['hobbies'] && $post['languages'] && $post['address']){
$columns='';
$values='';
foreach ($post as $index=>$value){
    $value=$db->real_escape_string($value);
    $columns.=$index.',';
    $values.="'$value',";
}
$authid=$fn->Auth()['id'];

$columns.='slug,updated_at,user_id';
$values.="'".$fn->randomstring()."',".time().",".$authid;


       try{

        $query = "INSERT INTO resumes";
        $query.="($columns) ";
        $query.="VALUES($values)";
        
        $db->query($query);
      
        $fn->setAlert('Resume Added');
               /** @var \mysqli $fn **/
    $fn->redirect('../myresumes.php');
       }
      catch(exception $error){
        $fn->setError($error->getMessage() );
        $fn->redirect('../createresume.php');
      }
      
    }
    else{
        $fn->setError(' Please fill the form !!' );
        /** @var \mysqli $fn **/
        $fn->redirect('../createresume.php');
    }
}

    else{
          /** @var \mysqli $fn **/
    $fn->redirect('../createresume.php');
    }

?>