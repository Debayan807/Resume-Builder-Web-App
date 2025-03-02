<?php

require '../assets/class/database.class.php';
require '../assets/class/function.class.php';


if($_GET){

    $post=$_GET;
    // echo "<pre>";   ctrl+k then ctrl+c  === comment 
    // print_r($post);  ctrl+k then ctrl+o === uncomment

    if($post['id'] && $post['resume_id'] ){
    


       try{

        $query = "DELETE FROM educations WHERE id={$post['id']} AND resume_id={$post['resume_id']}";
       
        
        $db->query($query);
      
        $fn->setAlert('Education Deleted');
               /** @var \mysqli $fn **/
    $fn->redirect('../updateresume.php?resume='.$post['slug']);
       }
      catch(exception $error){
        $fn->setError($error->getMessage() );
        $fn->redirect('../updateresume.php?resume='.$post['slug']);
      }
      
    }
    else{
        $fn->setError(' Please fill the form !!' );
        /** @var \mysqli $fn **/
        $fn->redirect('../updateresume.php?resume='.$post['slug']);
    }
}

    else{
          /** @var \mysqli $fn **/
          $fn->redirect('../updateresume.php?resume='.$post['slug']);
    }

?>