<?php
$title= "Account| Resume Builder"; // To make it dynamic
require './assets/includes/header.php';
require './assets/includes/navbar.php';

 /** @var \mysqli $fn **/
 $fn->authPage();
 /** @var \mysqli $db */
$user=$db->query("SELECT Full_Name, email FROM users WHERE id='".$fn->Auth()['id']."'");
$user= $user->fetch_assoc();
 
?>


    <div class="container">

        <div class="bg-white rounded shadow p-2 mt-4">
            <div class="d-flex justify-content-between border-bottom">
                <h5>Edit Account</h5>
                <div>
                    <a  class="text-decoration-none" style="cursor: pointer;" onclick="history.back()"><i class="bi bi-arrow-left-circle bi bi-arrow-left-circle link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"></i> Back</a>
                </div>
            </div>

            <div>

                <form  action="actions/updateprofile.action.php" method="post"  class="row g-3 p-3">

                    <div class="col-md-6">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="Full_Name" placeholder="Name" value="<?=@$user['Full_Name']?>" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" placeholder="name@gmail.com" value="<?=@$user['email']?>" class="form-control" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label" >New Password</label>
                        <input type="text" name="password" placeholder="azttKrgI&R79Hv098HF"
                            class="form-control">
                    </div>




                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-outline-warning"><i class="bi bi-floppy"></i> Update
                            Account</button>
                    </div>
                </form>
            </div>





        </div>

    </div>
    <?php
require './assets/includes/footer.php';
?>