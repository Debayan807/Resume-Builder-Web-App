<?php

require '../assets/class/database.class.php';
require '../assets/class/function.class.php';


if($_GET){

    $post=$_GET;
    //  echo "<pre>";  
    //  print_r($post);  

    if($post['id'] ){
    
      $authid = $fn->Auth()['id'];

       try{

        $query = "DELETE  resumes,skills,educations,experiences FROM resumes 
        LEFT JOIN skills ON resumes.id=skills.resume_id
        LEFT JOIN educations ON resumes.id=educations.resume_id
       LEFT JOIN experiences ON resumes.id=experiences.resume_id
        WHERE resumes.id={$post['id']} AND resumes.user_id=$authid";
       
        
        $db->query($query);
       
        $fn->setAlert('Resume Deleted');
               /** @var \mysqli $fn **/
    $fn->redirect('../myresumes.php');
       }
      catch(exception $error){
        $fn->setError($error->getMessage() );
        echo $error->getMessage();
             /** @var \mysqli $fn **/
             echo $error->getMessage();
    /*$fn->redirect('../myresumes.php');*/
      }
      
    }
    else{
        $fn->setError(' Please fill the form !!' );
            /** @var \mysqli $fn **/
    $fn->redirect('../myresumes.php');
    }
}

    else{
              /** @var \mysqli $fn **/
    $fn->redirect('../myresumes.php');
    }

?>