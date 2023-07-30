<?php
session_start();
$_SESSION['isloggedin']=true;
$_SESSION['username']="abc12@gmail.com";

if(!isset($_SESSION['isloggedin']) || !$_SESSION['isloggedin']){
    echo "<script> window.location.href='../main/login.php' </script>";
    exit;
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    <script src="../js/navigation.js"></script>
    <script src="../js/giving_back.js"></script>
   
    <link rel="stylesheet" href="../css/navigation.css">
   
</head>
<body>
    <?php
    //include_once "loader.html";
    ?>
    <main id="main">
<div class="wrapper">
        <!-- Sidebar  -->
        <?php
            include "navbar1.php";
        ?>
        <!-- Page Content  -->
        <div id="content">
        <?php
            include "navbar2.php";
        ?>
            <!-- write all files here -->
            <!-- page name -->

            
            <div class="d-flex">
                <h1>
                        Your Profile
                </h1>
                <div class="ms-auto">
                    <button type="button" class="btn fs-5 edit"> Edit </button>
                    <button type="button" class="btn fs-5 delete">Delete</button>
                    <button type="button" class="btn fs-5 px-5 border save">Save</button>
                </div>
                
            </div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs mt-3 flex-column flex-lg-row">
                <li class="nav-item flex-md-fill text-lg-center">
                    <a class="nav-link active" role="button" >Personal  Details</a>
                </li>
                <li class="nav-item flex-md-fill text-lg-center">
                    <a class="nav-link " role="button">Change  Password</a>
                </li>
                <li class="nav-item flex-md-fill text-lg-center">
                    <a class="nav-link  " role="button">Degree  Details</a>
                </li>
                <li class="nav-item flex-md-fill text-lg-center">
                    <a class="nav-link  " role="button">Professional  Details</a>
                </li>
            </ul>
            <!-- card for personal details -->

            <?php
            // getting user email
            $user_id = $_SESSION['username'];
$url = 'https://alumniandroidapp.000webhostapp.com/all_alumni_fetch.php'; // path to your JSON file
$data = file_get_contents($url); // put the contents of the file into a variable
$characters = json_decode($data); // decode the JSON feed
foreach ($characters as $character) {
    if($character->username == $user_id)
    {
            ?>
            <div class="card my-4">
                <div class="card-header">Personal Details</div>
                <div class="card-body">
                    <form id="target">

                            <!-- personal details page -->
                        <div id="personal_details_page">
                                    <!-- Form Row-->
                                <div class="row gx-3 gy-1 mb-2">
                                    <!-- Form Group (first name)-->
                                    <div class="col-lg-4">
                                        <label class="small mb-1" for="first_name">First Name (as on your marksheet)</label>
                                        <input class="form-control" name="first_name" id="first_name" type="text" value="<?php echo($character->firstname) ?>" placeholder="Enter your first name" >
                                    </div>
                                    <!-- Form Group (middle name)-->
                                    <div class="col-lg-4">
                                        <label class="small mb-1" for="middle_name">Middle Name (as on your marksheet)</label>
                                        <input class="form-control" id="middle_name" name="middle_name" type="text" value="<?php echo($character->middlename) ?>"  placeholder="Enter your middle name">
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-lg-4">
                                        <label class="small mb-1" for="last_name">Last Name (as on your marksheet)</label>
                                        <input class="form-control" name="last_name" id="last_name" type="text" value="<?php echo($character->lastname) ?>"  placeholder="Enter your last name" >
                                    </div>
                                </div>
                                
                                <!-- Form Row        -->
                                <div class="row gx-3 gy-1 mb-2">
                                    <!-- Form Group (Phone number)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="phone_number">Phone Number</label>
                                        <input class="form-control"  maxLength="10" name="phone_number" class="form-control" value="<?php echo($character->phoneno) ?>"  id="phone_number" type="number" placeholder="Enter your phone number" >
                                    </div>
                                    <!-- Form Group (Email)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="email">Email</label>
                                        <input class="form-control" autocomplete="username"  name="email" id="email"type="email" value="<?php echo($character->username) ?>" placeholder="Enter your email" >
                                    </div>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (Linkedin Address)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="linkedin_address">Linkedin Address</label>
                                        <input class="form-control" name="linkedin_address" id="linkedin_address" value="<?php echo($character->linkedin_profile) ?>" type="text" placeholder="Enter your Linkedin Address" >
                                    </div>
                                    <!-- Form Group (DOb)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="dob">Date of Birth</label>
                                        <input class="form-control"   type="date" name="dob" id="dob" value="<?php echo($character->dateofbirth) ?>" placeholder="Enter your birthday" min='1950-01-01' required>
                                    </div>
                                </div>
                            </div>
                       

                           <!-- Degree Deatils page -->
                            <div id="degree_details_page">

                                    <!-- Form Row-->
                                    <div class="row gx-3  mb-2">
                                        
                                        <div class="col-12">
                                            <p>
                                                Bachelors Degree
                                            </p>
                                        </div>
                                        <div class="col-lg-4">
                                            <!-- Form Group (Degree name)-->
                                            <label class="small mb-1" for="bachelors_degree_list">Select Degree</label>

                                            <input type="text" class="d-none" id="bachelor_degree__name" value="<?php echo($character->bachelor_degree) ?>">

                                            <select class="form-select" aria-label="Bachelors degree" name="bachelors_degree_list" id="bachelors_degree_list">
                                                <option selected>Select a Bachelors degree</option>
                                                <option value="BA">BA</option>
                                                <option value="BSC">BSC</option>
                                                <option value="BCOM">BCOM</option>
                                                <option value="BCOM-BI">BCOM-BI</option>
                                                <option value="BCOM-AF">BCOM-AF</option>
                                                <option value="BVoc">BVoc</option>
                                                <option value="BSC(IT)">BSC(IT)</option>
                                                <option value="BSC(BT)">BSC(BT)</option>
                                                <option value="BAMMC">BAMMC</option>
                                                <option value="BMS">BMS</option>
                                                <option value="Other">Other</option>
                                            </select>  
                                            <div class="invalid-feedback">
                                    Please select a degree
                                </div>                                      
                                        </div>
                                        <!-- Form Group (Bachelor college name)-->
                                        <div class="col-lg-4">
                                            <label class="small mb-1" for="bachelor_college_name">Name of College</label>
                                            <input class="form-control" name="bachelor_college_name" id="bachelor_college_name" type="text" value="<?php echo($character->bachelor_degree_college) ?>" list="vaze_college_name" placeholder="Enter your name of College">
                                            <!--auto suggest the name of Vaze college-->
                                            <datalist id="vaze_college_name">
                                                <option value="KET's V.G. Vaze College of Arts,Science and Commerce">
                                            </datalist>
                                            <div class="invalid-feedback" id="feedback_bachelor_degree_college_name">
                                                Please enter the name of the college
                                            </div>
                                        </div>
                                        <!-- Form Group ( bachelors admission year )-->
                                        <div class="col-lg-4">
                                            <label class="small mb-1" for="bachelors_admission_year">Year of Admission</label>
                                            <input type="number" maxLength="4" name="bachelors_admission_year" value="<?php echo($character->bachelor_admission_year) ?>" class="form-control" placeholder="Enter your admission year"  id="bachelors_admission_year" min="1950" required>
                                            <div class="invalid-feedback" id="feedback_bachelor_degree_admission_year">
                                                Please enter the year you took admission in the college
                                            </div>
                                        </div>

                                        <!-- master degree -->
                                        <div class="col-12 mt-5">
                                            <p>
                                                Master Degree
                                            </p>
                                        </div>
                                        <div class="col-lg-4">
                                            <!-- Form Group (Master degree name)-->
                                            <label class="small mb-1" for="masters_degree_list">Select Course</label>
                                            <input type="text" class="d-none" id="master_degree__name" value="<?php echo($character->master_degree) ?>">

                                            <select class="form-select" aria-label="Masters degree" name="masters_degree_list" id="masters_degree_list">
                                                <option value="None">None</option>
                                                <option value="MSC(IT)">MSC(IT)</option>
                                                <option value="MSC(BT)">MSC(BT)</option>
                                                <option value="MSC">MSC</option>
                                                <option value="MCOM">MCOM</option>
                                                <option value="Ph.D. Arts">Ph.D. Arts</option>
                                                <option value="Ph.D. Science">Ph.D. Science</option>
                                                <option value="PGDPCM">PGDPCM</option>
                                                <option value="Other">Other</option>
                                            </select>  
                                            <div class="invalid-feedback">
                                    Please select a degree
                                </div>                                      
                                        </div>
                                        <!-- Form Group (Master college name)-->
                                        <div class="col-lg-4">
                                            <label class="small mb-1" for="masters_college_name">Name of College</label>
                                            <input class="form-control" name="masters_college_name" id="masters_college_name" type="text" value="<?php echo($character->master_degree_college) ?>" list="vaze_college_name" placeholder="Enter your name of College">
                                            <!--auto suggest the name of Vaze college-->
                                            <datalist id="vaze_college_name">
                                                <option value="KET's V.G. Vaze College of Arts,Science and Commerce">
                                            </datalist>
                                            <div class="invalid-feedback" id="feedback_bachelor_degree_college_name">
                                                Please enter the name of the college
                                            </div>
                                        </div>
                                        <!-- Form Group (Master year of admission)-->
                                        <div class="col-lg-4">
                                            <label class="small mb-1" for="masters_admission_year">Year of Admission</label>
                                            <input type="number" maxLength="4" name="masters_admission_year" value="<?php echo($character->master_admission_year) ?>" class="form-control" placeholder="Enter your admission year"   id="masters_admission_year" min="1950" required>
                                            <div class="invalid-feedback" id="feedback_bachelor_degree_admission_year">
                                                Please enter the year you took admission in the college
                                            </div>
                                        </div>
                                    </div>
                            </div>



                             <!-- Degree Deatils page -->
                             <div id="professional_details_page">

                                        <!-- Form Row-->
                                        <div class="row gx-3 gy-3  mb-2">
                                            <!-- Form Group (comapny name)-->
                                            
                                            <div class="col-lg-12">
                                                <label class="small mb-1" for="company_name">Currently Working in Company/Institution</label>
                                                <input class="form-control" name="company_name" id="company_name" type="text" value="<?php echo($character->company) ?>"  placeholder="Enter your Company/Institution name">
                                            </div>
                                            <!-- Form Group (Designation)-->
                                            <div class="col-lg-12">
                                                <label class="small mb-1" for="designation">Designation</label>
                                                <input class="form-control" name="designation" id="designation" type="text" value="<?php echo($character->designation) ?>" placeholder="Enter your Designation">
                                                
                                            </div>
                                        </div>
                                </div>
                        <!-- Change password page -->
                        <div id="change_password_page">

                            <!-- Form Row-->
                            <div class="row gx-3 gy-3  mb-2">



<!-- password -->
<div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" autocomplete="new-password"  name="password" class="form-control" id="password" required>
                                    <span class="input-group-text pass_icon" id="basic-addon1">
                                        <i class="bi bi-eye-fill pass_open_eye"></i>
                                        <i class="bi bi-eye-slash-fill pass_close_eye"></i>
                                    </span>
                                    <div class="invalid-feedback" id="feedback_password_input">
                                    Please set a password
                                </div>
                                </div>
                               
                            </div>
                            <!-- confirm password -->
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" name="confirm_password" autocomplete="current-password" class="form-control" id="confirm_password" required>
                                    
                            <span class="input-group-text confirm_pass_icon" id="basic-addon1">
                                        <i class="bi bi-eye-fill cpass_open_eye"></i>
                                        <i class="bi bi-eye-slash-fill cpass_close_eye"></i>
                                    </span>
                                    <div class="invalid-feedback" id="feedback_confirm_password_input">
                                    Please re-enter the password
                                </div>

                                <div class="valid-feedback" >
                                    The passwords match!
                                </div>
                                </div>
                                
                            </div>

                                <div class="col-lg-12 mt-4">
                                    <button type="submit" id="SubmitPassword" class="btn btn-primary w-25">Submit </button>
                                </div>
                                
                        </div>
                    </form>
                </div>
            </div>
            
            <?php
}
}
            ?>
</div>
</div>
</div>
</div>

</main>
<script src="../js/profile.js"></script>
</body>
</html>
