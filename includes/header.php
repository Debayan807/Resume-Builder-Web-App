<?php
require './assets/class/database.class.php';
require './assets/class/function.class.php';
?>

<!doctype html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=@$title?></title>






    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="icon" href="./assets/images/DebayanGhosh_pic.jpeg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


    <style>
        body {
    /*        
            
display: flex;
justify-content: center;
align-items: center;
min-height: 100vh;
background: url("bg2.jpg") no-repeat;
background-size: cover;
background-position: center;
*/
background: linear-gradient(90deg, rgba(141,193,187,1) 17%, rgba(142,0,241,1) 55%, rgba(251,122,190,1) 94%);

        }

        .form-signin {
            max-width: 330px;
            padding: 1rem;
            background: transparent;
            /*
            border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter:blur(20px) ;
         
            box-shadow: 0 0 10px rgba(0, 0, 0,.2);
            color: #fff;

            border-radius: 12px;
            padding: 30px 30px;
            */
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
            
        }

        .form-signin input[type="text"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            background: transparent;
            /*
            border-radius: 20px;
            margin-bottom: 6px;
            
           */
        }
       

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-radius: 4px;
            background: transparent;
            /*
            border-radius: 20px;
            margin-bottom: 6px;
         */
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-radius: 4px;
            background: transparent;
            /*
            border-radius: 20px;
            margin-bottom: 6px;
           */
        }

       
    </style>



</head>
<body>





