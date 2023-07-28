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
                                        <label class="small mb-1" for="inputFirstName">First Name (as on your marksheet)</label>
                                        <input class="form-control" id="inputFirstName" type="text" value="<?php echo($character->firstname) ?>" placeholder="Enter your first name" >
                                    </div>
                                    <!-- Form Group (middle name)-->
                                    <div class="col-lg-4">
                                        <label class="small mb-1" for="inputLastName">Middle Name (as on your marksheet)</label>
                                        <input class="form-control" id="inputLastName" type="text" value="<?php echo($character->middlename) ?>"  placeholder="Enter your middle name">
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-lg-4">
                                        <label class="small mb-1" for="inputLastName">Last Name (as on your marksheet)</label>
                                        <input class="form-control" id="inputLastName" type="text" value="<?php echo($character->lastname) ?>"  placeholder="Enter your last name" >
                                    </div>
                                </div>
                                
                                <!-- Form Row        -->
                                <div class="row gx-3 gy-1 mb-2">
                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="phone_number">Phone Number</label>
                                        <input class="form-control"  maxLength="10" name="phone_number" class="form-control" value="<?php echo($character->phoneno) ?>"  id="phone_number" type="tel" placeholder="Enter your phone number" >
                                    </div>
                                    <!-- Form Group (location)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="email">Email</label>
                                        <input class="form-control" name="email" id="email"type="email" value="<?php echo($character->username) ?>" placeholder="Enter your email" >
                                    </div>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (phone number)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="linkedin_address">Linkedin Address</label>
                                        <input class="form-control" name="linkedin_address" id="linkedin_address" value="<?php echo($character->linkedin_profile) ?>" type="text" placeholder="Enter your Linkedin Address" >
                                    </div>
                                    <!-- Form Group (birthday)-->
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
                                        <!-- Form Group (first name)-->
                                        <div class="col-12">
                                            <p>
                                                Bachelors Degree
                                            </p>
                                        </div>
                                        <div class="col-lg-4">
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
                                        </div>
                                        <!-- Form Group (middle name)-->
                                        <div class="col-lg-4">
                                            <label class="small mb-1" for="inputLastName">Name of College</label>
                                            <input class="form-control" id="inputLastName" type="text" value="<?php echo($character->bachelor_degree_college) ?>" list="vaze_college_name" placeholder="Enter your name of College">
                                            <!--auto suggest the name of Vaze college-->
                                            <datalist id="vaze_college_name">
                                                <option value="KET's V.G. Vaze College of Arts,Science and Commerce">
                                            </datalist>
                                            <div class="invalid-feedback" id="feedback_bachelor_degree_college_name">
                                                Please enter the name of the college
                                            </div>
                                        </div>
                                        <!-- Form Group (last name)-->
                                        <div class="col-lg-4">
                                            <label class="small mb-1" for="inputLastName">Year of Admission</label>
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
                                            <label class="small mb-1" for="inputFirstName">Select Course</label>
                                            <input type="text" class="d-none" id="master_degree__name" value="<?php echo($character->master_degree) ?>">

                                            <select class="form-select" aria-label="Masters degree" name="master_degree_list" id="master_degree_list">
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
                                        </div>
                                        <!-- Form Group (middle name)-->
                                        <div class="col-lg-4">
                                            <label class="small mb-1" for="inputLastName">Name of College</label>
                                            <input class="form-control" id="inputLastName" type="text" value="<?php echo($character->master_degree_college) ?>" list="vaze_college_name" placeholder="Enter your name of College">
                                            <!--auto suggest the name of Vaze college-->
                                            <datalist id="vaze_college_name">
                                                <option value="KET's V.G. Vaze College of Arts,Science and Commerce">
                                            </datalist>
                                            <div class="invalid-feedback" id="feedback_bachelor_degree_college_name">
                                                Please enter the name of the college
                                            </div>
                                        </div>
                                        <!-- Form Group (last name)-->
                                        <div class="col-lg-4">
                                            <label class="small mb-1" for="inputLastName">Year of Admission</label>
                                            <input type="number" maxLength="4" name="bachelors_admission_year" value="<?php echo($character->master_admission_year) ?>" class="form-control" placeholder="Enter your admission year"   id="bachelors_admission_year" min="1950" required>
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
                                            <!-- Form Group (first name)-->
                                            
                                            <div class="col-lg-12">
                                                <label class="small mb-1" for="inputFirstName">Currently Working in Company/Institution</label>
                                                <input class="form-control" id="inputLastName" type="text" value="<?php echo($character->company) ?>"  placeholder="Enter your Company/Institution name">
                                            </div>
                                            <!-- Form Group (middle name)-->
                                            <div class="col-lg-12">
                                                <label class="small mb-1" for="inputLastName">Designation</label>
                                                <input class="form-control" id="inputLastName" type="text" value="<?php echo($character->designation) ?>" placeholder="Enter your Designation">
                                                
                                            </div>
                                        </div>
                                </div>
                        <!-- Change password page -->
                        <div id="change_password_page">

                            <!-- Form Row-->
                            <div class="row gx-3 gy-3  mb-2">
                                <!-- Old password -->
                                <div class="col-lg-12">
                                    <label for="password" class="form-label">Old Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control" id="password" required>
                                        <span class="input-group-text pass_icon" id="basic-addon1">
                                            <i class="bi bi-eye-fill pass_open_eye"></i>
                                            <i class="bi bi-eye-slash-fill pass_close_eye"></i>
                                        </span>
                                    </div>
                                </div>
<!-- new password -->
                                <div class="col-lg-12">
                                    <label for="password" class="form-label">New Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control" id="password" required>
                                        <span class="input-group-text pass_icon" id="basic-addon1">
                                            <i class="bi bi-eye-fill pass_open_eye"></i>
                                            <i class="bi bi-eye-slash-fill pass_close_eye"></i>
                                        </span>
                                    </div>
                                </div>
<!-- confirm password -->
                                <div class="col-lg-12">
                                    <label for="password" class="form-label">Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control" id="password" required>
                                        <span class="input-group-text pass_icon" id="basic-addon1">
                                            <i class="bi bi-eye-fill pass_open_eye"></i>
                                            <i class="bi bi-eye-slash-fill pass_close_eye"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <button type="button" class="btn btn-primary w-25">Save </button>
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
</main>
</body>
</html>
<script>
    $("#personal_details_page :input").prop("disabled", true);
    $("#degree_details_page :input").prop("disabled", true);
    $("#professional_details_page :input").prop("disabled", true);
    $('.save').hide();
    $('#degree_details_page').hide();
    $('#professional_details_page').hide();
    $('#change_password_page').hide();
    
    $('.nav-link ').on('click',function(){
        $('.nav-link ').removeClass("active");
        $(this).addClass("active");
        $('.card-header').text($(this).text());
        if($(this).text() == "Personal  Details"){
            $('#personal_details_page').show();
            $('#degree_details_page').hide();
            $('#professional_details_page').hide();
            $('#change_password_page').hide();
        }else if($(this).text() == "Degree  Details"){
            $('#degree_details_page').show();
            $('#personal_details_page').hide();
            $('#professional_details_page').hide();
            $('#change_password_page').hide();
        }else if($(this).text() == "Professional  Details"){
            $('#professional_details_page').show();
            $('#degree_details_page').hide();
            $('#personal_details_page').hide();
            $('#change_password_page').hide();
        }else if($(this).text() == "Change  Password"){
            $('#professional_details_page').hide();
            $('#degree_details_page').hide();
            $('#personal_details_page').hide();
            $('#change_password_page').show();
        }
    })

    $('.edit').on('click',function(){
        $("#personal_details_page :input").prop("disabled", false);
    $("#degree_details_page :input").prop("disabled", false);
    $("#professional_details_page :input").prop("disabled", false);
        $('.edit').hide();
        $('.delete').hide();
        $('.save').show();
    })
    $('.save').on('click',function(){
        $('.edit').show();
        $('.delete').show();
        $('.save').hide();
        $("#personal_details_page :input").prop("disabled", true);
    $("#degree_details_page :input").prop("disabled", true);
    $("#professional_details_page :input").prop("disabled", true);
    })
    
    
    $bachelor_degree_name = $('#bachelor_degree__name').val();
    $("#bachelors_degree_list option").each(function()
    {
    if($(this).text()==$bachelor_degree_name){
        $(this).prop("selected", true);
        console.log("yes");
    }
    });

    $master_degree_name = $('#master_degree__name').val();
    console.log($master_degree_name);
    $("#master_degree_list option").each(function()
    {
    if($(this).text()==$master_degree_name){
        $(this).prop("selected", true);
    }
    });

</script>