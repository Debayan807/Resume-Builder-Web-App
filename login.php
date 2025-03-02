


<?php
$title= "Login | Resume Builder"; // To make it dynamic
require './assets/includes/header.php';
 /** @var \mysqli $fn **/
 $fn->NonauthPage();
?> 

<div class="d-flex align-items-center" style="height: 100vh;">



    <div class="w-100">
        <main class="form-signin w-100 m-auto  shadow rounded ">
            <form method="post" action="actions/login.action.php">
                <div class="d-flex gap-2 justify-content-center">
                    <img class="mb-4" src="./assets/images/logo.png" alt="" height="70">

                    <div>
                        <h1 class="h3 fw-normal my-1"><b>Resume</b> Builder</h1>
                        <p class="m-1">Login to your account</p>

                    </div>
                </div>


                  <div class="logforms">
                <div class="form-floating topmarginlarge">
                    <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="name@example.com" required>
                    <label for="floatingInput"><i class="bi bi-envelope"></i> Email address</label>
                </div>
                <div class="form-floating topmarginlarge">
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
                    <label for="floatingPassword"><i class="bi bi-key"></i> Password</label>
                </div>
                <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Remember Email</label>
  </div>

                <div class="divcallforaction topmarginlarge">
                <button class="btn btn-outline-warning w-100 py-2 mt-2 btnlogin" type="submit" style="border-radius: 20px;">Login
                    <i class="bi bi-box-arrow-in-right"></i>
                </button>
                </div>
                <div class="d-flex justify-content-between my-3 ck">

                    <a href="forgot-password.php" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" style="color: coral;">Forgot Password ?</a>
                    <a href="register.php" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" style="color: coral;">Register</a>

                </div>
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
            transition: all 1s;
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