<?php
$title= "Forgot Password | Resume Builder"; // To make it dynamic
require './assets/includes/header.php';
 /** @var \mysqli $fn **/
 $fn->NonauthPage();
?>
<style>
      .form-signin {
            max-width: 550px;
            padding: 1rem;
        }

</style>
<div class="d-flex align-items-center p-4" style="height: 100vh;">


    <div class="w-100">
        <main class="form-signin w-100 m-auto shadow rounded">
            <form action="actions/sendcode.action.php" method="post">
                <div class="d-flex gap-2 justify-content-center">
                    <img class="mb-4" src="./assets/images/logo.png" alt="" height="70">

                    <div>
                        <h1 class="h3 fw-normal my-1"><b>Resume</b> Builder</h1>
                        <p class="m-0">Forgot your password</p>

                    </div>
                </div>



                <div class="form-floating mb-4">
                    <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="name@example.com" required>
                    <label for="floatingInput"><i class="bi bi-envelope"></i> Email address</label>
                </div>



                <button class="btn btn-outline-warning w-100 py-2" type="submit" style="border-radius: 20px;"><i class="bi bi-send"></i> Send Verification
                    Code

                </button>
                <div class="d-flex justify-content-between my-3 ck">

                    <a href="register.php" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" style="color: coral;">Register</a>
                    <a href="login.php" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" style="color: coral;">Login</a>

                </div>

            </form>
        </main>

    </div>
    </div>

    <style>
    body{
        display: flex;
justify-content: center;
align-items: center;
min-height: 100vh;
background: url("bg2.jpg") no-repeat;
background-size: cover;
background-position: center;
    }

    .form-signin {
        border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter:blur(20px) ;
         
            box-shadow: 0 0 10px rgba(0, 0, 0,.2);
            color: #fff;

            border-radius: 12px;
            padding: 30px 30px;
    }
    .form-signin input[type="text"]{
        border-radius: 20px;
        margin-bottom: 6px;
    }

    .form-signin input[type="email"]{
        border-radius: 20px;
        margin-bottom: 6px;
    }

    .form-signin input[type="password"] {
        border-radius: 20px;
        margin-bottom: 6px;
    }
</style>

    <?php
require './assets/includes/footer.php';
?>