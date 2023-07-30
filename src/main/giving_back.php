<?php
session_start();
//$_SESSION['isloggedin'] = true;
//$_SESSION['username'] = "abc12@gmail.com";

if (!isset($_SESSION['isloggedin']) || !$_SESSION['isloggedin']) {
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
    <title>Giving Back</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    <script src="../js/navigation.js"></script>
   

    <link rel="stylesheet" href="../css/navigation.css">
    <link rel="stylesheet" href="../css/giving_back.css">

   <!-- <style>
        #loadingDiv {
            display: none;
        }
    </style>
    -->

</head>

<body>
    <?php
    include_once "loader.html";
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
                <h1>
                    Giving Back
                </h1>
                <!-- section name -->
                <h3 id="section_name">

                </h3>

                <!-- Scholarship_awards page -->
                <div id="Scholarship_awards_page">
                    <form id="scholarship_award_form">
                        <div class="mb-3">
                            <!--Scholarship/Award Name-->
                            <label for="sa_name" class="form-label">Name of Scholarship/Award</label>
                            <input type="text" name="sa_name" class="form-control" id="sa_name" required>
                            <div class="invalid-feedback">
                                Please enter a name.
                            </div>
                        </div>
                        <!-- Department -->
                        <div class="mb-3">
                            <label for="sa_department_list" class="form-label">Department</label>

                            <select class="form-select" aria-label="Department" name="sa_department_list" id="sa_department_list">
                                <option selected>Select a department</option>
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
                                Please select a department
                            </div>
                        </div>

                        <!-- Class -->
                        <div class="mb-3">

                            <label for="sa_class_list" class="form-label">Class</label>

                            <select class="form-select" aria-label="Class" name="sa_class_list" id="sa_class_list">
                                <option selected>Select a class</option>
                                <option value="First Year">First Year</option>
                                <option value="Second Year">Second Year</option>
                                <option value="Third Year">Third Year</option>
                            </select>

                            <div class="invalid-feedback" >
                                Please select a class
                            </div>

                        </div>

                        <!-- Amount per student -->
                        <div class="mb-3">

                            <label for="amt_per_student" class="form-label">Amount Per Student</label>
                            <input type="number" name="amt_per_student" class="form-control" id="amt_per_student" required>

                            <div class="invalid-feedback" id="feedback_amt_per_student">
                                Please enter the amount offered for each student
                            </div>
                        </div>
                        <!-- Number of students to be Awarded -->
                        <div class="mb-3">
                            <label for="no_of_students_to_be_awarded" class="form-label">Number of students to be Awarded </label>
                            <input type="number" name="no_of_students_to_be_awarded" class="form-control" id="no_of_students_to_be_awarded" required>
                            <div class="invalid-feedback" id="feedback_no_of_students_awarded">
                                Please enter the number of students to be awarded
                            </div>
                        </div>

                        <!-- Total Amount -->
                        <div class="mb-3">
                            <label for="total_amount" class="form-label">Total Amount</label>
                            <input type="number" maxLength="10" name="total_amount" class="form-control" id="total_amount" required>
                            <div class="invalid-feedback" id="feedback_total_amt">
                                Please enter an amount.
                                <!--The amounts do no match.Please verify the amounts and number of students again-->
                            </div>
                        </div>

                        <div class="mb-3">
                            <!-- Submit button -->
                            <button type="submit" name="sa_submit" id="sa_submit" class="btn btn-primary px-5 py-2 ms-2 mt-3" >Submit</button>
                        </div>

                    </form>
                </div>

                <!-- Internship_jobs page -->
                <div id="Internship_jobs_page">

                    <form id="internship_job_form">

                        <!--Internship/Job Company-->
                        <div class="mb-3">

                            <label for="sj_company" class="form-label">Company</label>
                            <input type="text" name="sj_company" class="form-control" id="sj_company" required>
                            <div class="invalid-feedback">
                                Please enter a company.
                            </div>
                        </div>

                        <!--Internship/Job Post-->
                        <div class="mb-3">

                            <label for="sj_post" class="form-label">Post</label>
                            <input type="text" name="sj_post" class="form-control" id="sj_post" required>
                            <div class="invalid-feedback">
                                Please enter a post.
                            </div>
                        </div>

                        <!--Internship/Job Qualification-->
                        <div class="mb-3">

                            <label for="sj_qualification" class="form-label">Qualification</label>
                            <input type="text" name="sj_qualification" class="form-control" id="sj_qualification" required>
                            <div class="invalid-feedback">
                                Please enter the qualification required.
                            </div>
                        </div>

                        <!--Internship/Job Job description-->
                        <div class="mb-3">

                            <label for="sj_description" class="form-label">Description</label>
                            <input type="text" name="sj_description" class="form-control" id="sj_description" required maxlength="5000">
                            <div class="invalid-feedback">
                                Please enter the description
                            </div>
                        </div>

                        <!--Internship/Job Number of Vacancies-->
                        <div class="mb-3">

                            <label for="sj_no_of_vacancies" class="form-label">Number of Vacancies</label>
                            <input type="number" name="sj_no_of_vacancies" class="form-control" id="sj_no_of_vacancies" required>
                            <div class="invalid-feedback" id="feedback_sj_no_of_vacancies">
                                Please enter the number of vacancies
                            </div>
                        </div>

                        <!--Internship/Job email-->
                        <div class="mb-3">

                            <label for="sj_email" class="form-label">Email</label>
                            <input type="email" name="sj_email" class="form-control" id="sj_email" required>
                            <div class="invalid-feedback" id="feedback_sj_email">
                                Please enter a email.
                            </div>
                        </div>

                        <!--Internship/Job contact number-->
                        <div class="mb-3">

                            <label for="sj_contact_no" class="form-label">Contact number</label>
                            <input type="tel" maxlength="10" name="sj_contact_no" class="form-control" id="sj_contact_no" required>
                            <div class="invalid-feedback" id="feedback_sj_contact_no">
                                Please enter a contact number.
                            </div>
                        </div>

                        <!--Internship/Job Job or internship-->
                        <div class="mb-3">

                            <label for="sj_job_or_internship" class="form-label">Job or Internship</label>
                            <select id="sj_job_or_internship" name="sj_job_or_internship" class="form-select" aria-label="job_or_internship">
                                <option selected value="j">Job</option>
                                <option value="i">Internship</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select whether it's a job or internship.
                            </div>
                        </div>

                        <div class="mb-3">
                            <!-- Submit button -->
                            <button type="submit" name="ij_submit" id="ij_submit" class="btn btn-primary px-5 py-2 ms-2 mt-3" >Submit</button>
                        </div>

                    </form>

                </div>


                <!-- Accolades_you page -->
                <div id="Accolades_you_page">

                
                <!--<object type="text/html" data="loader.html"></object>-->
                    <div class="form-check mb-3">

                        <input type="radio" class="form-check-input" name="exampleRadios" id="aby_scholarship_by_you" value="Scholarship and Awards by you">
                        <label for="aby_scholarship_by_you" class="form-check-label">Scholarship and Awards by you</label>

                    </div>

                    <div class="form-check mb-3">

                        <input type="radio" class="form-check-input" name="exampleRadios" id="aby_internship_by_you" value="Jobs and Internships by you">
                        <label for="aby_internship_by_you" class="form-check-label">Jobs and Internships by you</label>

                    </div>

                   
                    <div class="container mt-4" style="height:calc(100vh-60px);" >
                        <div class="row p-1" id="card_container">

                           
                        </div>
                    </div>
                </div>


                <!-- Bottom navigation -->
                <div class="position-fixed fixed-bottom bg-white d-flex justify-content-evenly py-1 " id="down_navigation">
                    <button type="button" class="text-center mx-2 btn Scholarship_awards">
                        <span class="material-symbols-outlined">
                            social_leaderboard
                        </span>
                        <br />
                        Scholarship & awards
                    </button>

                    <button type="button" class="text-center mx-2 btn Internship_jobs">
                        <img src="../img/ic_internship.svg" />
                        <br />
                        Internship & jobs
                    </button>

                    <button type="button" class="text-center mx-2 btn Accolades_you">
                        <span class="material-symbols-outlined">
                            card_travel
                        </span>
                        <br />
                        Accolades by you
                    </button>
                </div>


            </div>
        </div>
    </main>

    <script src="../js/giving_back.js"> </script>
    
    <script>
        //1.When clicked on scholarship award submit button
        
  var sa_submit_button=document.getElementById("sa_submit");
  sa_submit_button.addEventListener("click", function (e) {
  e.preventDefault();
  //alert("clicked");
  if (validateScholarshipAwardForm()) {

    //console.log("successfully validated");
    insertScholarshipAwardsByUser("<?php echo $_SESSION["username"];?>");
    
  } else {
    console.log(" scholarship award form is not valid");
  }
});
  

//2.When clicked on internship job submit button

      
var ij_submit_button=document.getElementById("ij_submit");
  ij_submit_button.addEventListener("click", function (e) {
  e.preventDefault();
  //alert("clicked");
  if (validateInternshipJobForm()) {

    //console.log("successfully validated");
    insertInternshipJobByUser("<?php echo $_SESSION["username"];?>");
    
  } else {
    console.log("Internship/Job form is not valid");
  }
});

//3.When user changes the radio button selected

const radioButtons = document.querySelectorAll('input[type="radio"]');
  
  radioButtons.forEach(function(radioButton) {
    radioButton.addEventListener("change", function(event) {
      if (event.target.checked) {

        const selectedOption = event.target.value;
        // Execute different functions based on the selected option

        if (selectedOption === "Scholarship and Awards by you") {
          // alert("Scholarships by you");
           fetchAllScholarshipAwardsByUser("<?php echo $_SESSION["username"];?>")
           .then(function(data){
            displayScholarshipsAwardsByUser();
           });
          
        } else if (selectedOption === "Jobs and Internships by you") {
           //alert("Internships by you");
           fetchAllInternshipJobsByUser("<?php echo $_SESSION["username"];?>")
           .then(function(data){
            displayInternshipJobsByUser();
           });
           
        } 
      }
    });
  });

    </script>


</body>

</html>