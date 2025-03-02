<?php
$title= "Create Resume| Resume Builder"; // To make it dynamic
require './assets/includes/header.php';
require './assets/includes/navbar.php';
 /** @var \mysqli $fn **/
 
 /** @var \mysqli $fn **/
 $fn->authPage();
 $slug=$_GET['resume']??'';
 $resumes = $db->query("SELECT * FROM resumes WHERE ( slug='$slug' AND  user_id= ".$fn->Auth()['id'].")");
 $resume=$resumes->fetch_assoc();
 if(!$resume){   
      $fn->redirect('myresumes.php');  
}
$exps= $db->query("SELECT * FROM experiences WHERE (resume_id=".$resume['id'].")");
$exps=$exps->fetch_all(1);

$edus= $db->query("SELECT * FROM educations WHERE (resume_id=".$resume['id'].")");
$edus=$edus->fetch_all(1);

$skills= $db->query("SELECT * FROM skills WHERE (resume_id=".$resume['id'].")");
$skills=$skills->fetch_all(1);
?>

    <div class="container">

        <div class="bg-white rounded shadow p-2 mt-4" style="min-height:80vh">
            <div class="d-flex justify-content-between border-bottom">
                <h5>Create Resume</h5>
                <div>
                <a href="myresumes.php" class="text-decoration-none" style="cursor: pointer;" ><i class="bi bi-arrow-left-circle"></i> Back</a>
                </div>
            </div>

            <div>

                <form action="actions/updateresume.action.php" method="post" class="row g-3 p-3">
                <input type="hidden" name="id" value="<?=$resume['id']?>" />
                <input type="hidden" name="slug" value="<?=$resume['slug']?>" />
                <div class="col-md-6">
                        <label class="form-label" >Resume Title</label>
               
                        <input type="text" name="resume_title" value="<?=@$resume['resume_title']?>" placeholder="Web developer consultent" class="form-control" required>
                    </div>
                    <h5 class="mt-3 text-secondary"><i class="bi bi-person-badge"></i> Personal Information</h5>
                    <div class="col-md-6">
                        <label class="form-label" name="Full_Name">Full Name</label>
                        <input type="text" placeholder="Name"  value="<?=@$resume['Full_Name']?>" class="form-control" required>
                    </div>
                   
                    <div class="col-md-6">
                        <label class="form-label" >Email</label>
                        <input type="email" name="email" placeholder="name@gmail.com" value="<?=@$resume['email']?>"class="form-control" required>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label"> Objective</label>
                        <textarea class="form-control" name="objective" id=""><?=@$resume['objective']?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mobile No</label>
                        <input type="number" name="mobile_no" min="1111111111" placeholder="9569569569" max="9999999999"
                           value="<?=@$resume['mobile_no']?>" class="form-control" required> 
                    </div>
                    <div class="col-md-6"   >
                        <label class="form-label"  >Date Of Birth</label>
                        <input type="date" class="form-control" name="dob"value="<?=$resume['dob']?>" required >
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Gender</label>
                        <select class="form-select" name="gender">
                            <option <?=($resume['gender']=='Male')?'select':''?>>Male</option>
                            <option <?=($resume['gender']=='Female')?'select':''?>>Female</option>
                            <option <?=($resume['gender']=='Transgender')?'select':''?>>Transgender</option>




                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Religion</label>
                        <select class="form-select" name="religion">
                            <option <?=($resume['religion']=='Hindu')?'select':''?>>Hindu</option>
                            <option <?=($resume['religion']=='Muslim')?'select':''?>>Muslim</option>
                            <option <?=($resume['religion']=='Sikh')?'select':''?>>Sikh</option>
                            <option <?=($resume['religion']=='Christian')?'select':''?>>Christian</option>



                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Nationality</label>
                        <select class="form-select" name="nationality">
                            <option <?=($resume['nationality']=='Indian')?'select':''?>>Indian</option>
                            <option <?=($resume['nationality']=='Non Indian')?'select':''?>>Non Indian</option>


                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Marital Status</label>
                        <select class="form-select" name="marital_status">
                            <option <?=($resume['marital_status']=='Married')?'select':''?>>Married</option>
                            <option <?=($resume['marital_status']=='Single')?'select':''?>>Single</option>
                            <option <?=($resume['marital_status']=='Divorced')?'select':''?>>Divorced</option>
                            

                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Hobbies</label>
                        <input type="text" name="hobbies" value="<?=@$resume['hobbies']?>"placeholder="Reading Books, Watching Movies" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Languages Known</label>
                        <input type="text" name="languages"value="<?=@$resume['languages']?>" placeholder="Hindi,English" class="form-control" required>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label"> Address</label>
                        <input type="text" class="form-control"value="<?=@$resume['address']?>" name="address" id="inputAddress" placeholder="1234 Main St" required>
                    </div>
                   
                    <hr>
                    <div class="d-flex justify-content-between">
                        <h5 class=" text-secondary"><i class="bi bi-briefcase"></i> Experience</h5>
                        <div>
                            <a class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#addexp" style="cursor: pointer;"><i class="bi bi-file-earmark-plus"></i> Add New</a>
                        </div>
                    </div>
               
                    <div class="d-flex flex-wrap">


<?php
if($exps){
foreach($exps as $exp){
    ?>
    <div class="col-12 col-md-6 p-2">
                            <div class="p-2 border rounded">
                                <div class="d-flex justify-content-between">
                                    <h6><?=$exp['position']?></h6>
                                    <a href="actions/deleteexp.action.php?id=<?=$exp['id']?>&resume_id=<?=$resume['id']?>&slug=<?=$resume['slug']?>"><i class="bi bi-x-lg"></i></a>
                                </div>

                                <p class="small text-secondary m-0" >
                                    <i class="bi bi-buildings"></i> <?=$exp['company']?> (<?=$exp['started'].' - '.$exp['ended']?>)
                                <p class="small text-secondary m-0" >
                                <?=$exp['job_desc']?>
                                </p>

                            </div>
                        </div>
                        <?php
}
   
} else{

    ?>

<div class="col-12 col-md-6 p-2">
                            <div class="p-2 border rounded">
                                <div class="d-flex justify-content-between">
                                    <h6>I am Fresher</h6>
                                   
                                </div>
                                <p class="small text-secondary m-0" >
                                    if you have experience , you can add it
                                </p>

                            </div>
                        </div>
    <?php
}

         ?>               
                    </div>   

                    <hr>
                    <div class="d-flex justify-content-between">
                        <h5 class=" text-secondary"><i class="bi bi-journal-bookmark"></i> Education</h5>
                        <div>
                            <a class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#addedu" style="cursor: pointer;"><i class="bi bi-file-earmark-plus"></i> Add New</a>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap">
           
                    <?php
if($edus){
foreach($edus as $exp){
    ?>
    <div class="col-12 col-md-6 p-2">
                            <div class="p-2 border rounded">
                                <div class="d-flex justify-content-between">
                                    <h6><?=$exp['course']?></h6>
                                    <a href="actions/deleteedu.action.php?id=<?=$exp['id']?>&resume_id=<?=$resume['id']?>&slug=<?=$resume['slug']?>"><i class="bi bi-x-lg"></i></a>
                                </div>

                                <p class="small text-secondary m-0" >
                                <i class="bi bi-book"></i> <?=$exp['institute']?> 
                                <p class="small text-secondary m-0" >
                                <?=$exp['started'].' - '.$exp['ended']?>
                                </p>

                            </div>
                        </div>
                        <?php
}
   
} else{

    ?>

<div class="col-12 col-md-6 p-2">
                            <div class="p-2 border rounded">
                                <div class="d-flex justify-content-between">
                                    <h6>I have no education</h6>
                                   
                                </div>
                                <p class="small text-secondary m-0" >
                                    if you have education , you can add it
                                </p>

                            </div>
                        </div>
    <?php
}

         ?>     


                    </div>

                    <hr>
                    <div class="d-flex justify-content-between">
                        <h5 class=" text-secondary"><i class="bi bi-boxes"></i> Skills</h5>
                        <div>
                            <a  class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#addskill" style="cursor: pointer;"><i class="bi bi-file-earmark-plus"></i> Add New</a>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap">

<?php
if($skills){
foreach($skills as $skill)
?>
 <div class="col-12  p-2">
                            <div class="p-2 border rounded">
                                <div class="d-flex justify-content-between">
                                    <h6><i class="bi bi-caret-right"></i> <?=$skill['skill']?> </h6>
                                    <a href="actions/deleteskill.action.php?id=<?=$skill['id']?>&resume_id=<?=$resume['id']?>&slug=<?=$resume['slug']?>"><i class="bi bi-x-lg"></i></a>
                                </div>
                            </div>
                        </div>
<?php





}
else{
?>


<div class="col-12 p-2">
                            <div class="p-2 border rounded">
                                <div class="d-flex justify-content-between ">
                                    <h6><i class="bi bi-caret-right"></i> I have no skills</h6>
                                 
                                </div>
                              
                            </div>
                        </div>


                       
<?php
}
?>



</div>
<hr>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-outline-warning"><i class="bi bi-floppy"></i> Update
                            Resume</button>
                    </div>
                </form>
            </div>





        </div>

    </div>


        <!--modal Experience -->

        <div class="modal fade" id="addexp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Experience</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="row g-3" method="post" action="actions/addexperience.action.php">
      <input type="hidden" name="resume_id" value="<?=$resume['id']?>" />
      <input type="hidden" name="slug" value="<?=$resume['slug']?>" />
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">Position / Job Role</label>
    <input type="text" class="form-control" name="position" placeholder="Web Developer Consultant (2+ Years)" id="inputEmail4" required>
  </div>
  <div class="col-md-12">
    <label for="inputPassword4" class="form-label">Company</label>
    <input type="text" class="form-control" name="company" placeholder="Dominos,New Delhi" id="inputPassword4" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Joined</label>
    <input type="text" name="started" class="form-control" placeholder="October 21" id="inputPassword4" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Resigned
    <input type="text" class="form-control" name ="ended" id="inputPassword4" placeholder="Currently Pursuing" required>
  </div>
  <div class="col-md-12">
    <label for="inputPassword4" class="form-label">Job Description</label>
   <textarea class="form-control" name="job_desc" id="" required></textarea>
   
  </div>

 
  <div class="col-12 text-end">
    <button type="submit" class="btn btn-outline-warning">Add Experience</button>
  </div>
</form>
      </div>
      
    </div>
  </div>
</div>

                   <!--modal  -->

                      <!--modal Education -->

        <div class="modal fade" id="addedu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Education</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="row g-3" method="post" action="actions/addeducation.action.php">
      <input type="hidden" name="resume_id" value="<?=$resume['id']?>" />
      <input type="hidden" name="slug" value="<?=$resume['slug']?>" />
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">Course / Degree</label>
    <input type="text" class="form-control" name="course" placeholder="Completed 12th Class (Arts Stream)" id="inputEmail4" required>
  </div>
  <div class="col-md-12">
    <label for="inputPassword4" class="form-label">Institute / Board</label>
    <input type="text" class="form-control" name="institute" placeholder="Central Board Of Secondary Education, New Delhi" id="inputPassword4" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Started</label>
    <input type="text" name="started" class="form-control" placeholder="October 21" id="inputPassword4" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Ended
    <input type="text" class="form-control" name ="ended" id="inputPassword4" placeholder="Currently Pursuing" required>
  </div>
  

 
  <div class="col-12 text-end">
    <button type="submit" class="btn btn-outline-warning">Add Education</button>
  </div>
</form>
      </div>
      
    </div>
  </div>
</div>

                   <!--modal  -->


                                         <!--modal Skills -->

        <div class="modal fade" id="addskill" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Skills</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="row g-3" method="post" action="actions/addskill.action.php">

      <input type="hidden" name="resume_id" value="<?=$resume['id']?>" />
      <input type="hidden" name="slug" value="<?=$resume['slug']?>" />
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">Skill</label>
    <input type="text" class="form-control" name="skill" placeholder="Basic Knowledge in Computer & Internet" id="inputEmail4" required>
  </div>

  

 
  <div class="col-12 text-end">
    <button type="submit" class="btn btn-outline-warning">Add Skill</button>
  </div>
</form>
      </div>
      
    </div>
  </div>
</div>

<!--modal -->
                   

<?php
require './assets/includes/footer.php';
?>