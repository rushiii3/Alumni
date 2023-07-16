<?php
//include the dbconnect file to connect to the database
//require "dbconnect.php";

//start the session
session_start();

//check if user is already logged in and redirect the user if logged in.

if(isset($_SESSION['isloggedin'])){
if($_SESSION['isloggedin']){
    
    echo '<script>//alert("Please log out and register again");
    window.location.href="../main/home.php"</script>';
exit;
}
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
    <title>Sign Up</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <script src="https://smtpjs.com/v3/smtp.js"></script>

    <link rel="stylesheet" href="../css/sign_up.css">

</head>
<body>
    <?php
    include_once "loader.html";

    ?>

    <!-- SUCCESS MODAL -->
    <div class="modal fade" id="success_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-dialog-centered w-75 mx-auto">
                <div class="modal-content">
                    <div class="modal-body">
                        <img src="https://img.freepik.com/free-vector/confirmed-concept-illustration_114360-545.jpg?w=1060&t=st=1683867581~exp=1683868181~hmac=1e7364b0ade26d1472f5c388369363e9158af74c9e3784a415576453158c7a65" class="img-fluid" alt="">
                        <p class="fs-6 text-center"><strong>Congratulations.</strong> <br/> Your account has been successfully created.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="location.href='login.php';" class="btn btn-primary">Login</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAILED MODAL-->
        <div class="modal fade" id="failed_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-dialog-centered w-75 mx-auto">
                <div class="modal-content">
                    <div class="modal-body">
                        <img src="https://img.freepik.com/free-vector/removing-goods-from-basket-refusing-purchase-changing-decision-item-deletion-emptying-trash-online-shopping-app-laptop-user-cartoon-character-vector-isolated-concept-metaphor-illustration_335657-2843.jpg?w=1060&t=st=1683869448~exp=1683870048~hmac=351919e98226dbde35a446a66fcd783e63766b69193d06232b36da08b0ca3b2c" class="img-fluid" alt="">
                        <p class="fs-6 text-center" id="failed_registration_message"><strong>Failed to register.</strong></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Try Again</button>
                    </div>
                </div>
            </div>
        </div>

        <!--MAIN STEPPER VIEW-->
    <main id="main">
<div class="container mt-5 mb-5 shadow p-3 mb-5 bg-body" id="container">
            <div class="row p-3">

            <div class="p-1 col-lg-6">
                <p class="h1 mb-3">Sign up</p>

                <div class="pro">
                    <div class="stepper-wrapper">
                        <div class="stepper-item ">
                            <div class="step-counter">1</div>
                            <div class="step-name text-center">Personal <br> Details</div>
                        </div>
                        <div class="stepper-item ">
                            <div class="step-counter">2</div>
                            <div class="step-name text-center">Degree <br>Details</div>
                        </div>
                        <div class="stepper-item ">
                            <div class="step-counter">3</div>
                            <div class="step-name text-center">Professional <br>Details</div>
                        </div>
                        <div class="stepper-item ">
                            <div class="step-counter">4</div>
                            <div class="step-name text-center">Set up <br>Password</div>
                        </div>
                        </div>
                    </div>


                    <form   id="signupform" >
                        <!-- Page 1 starts  Personal Details -->
                        <div id="page1">
                            <!-- First name -->
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name (as on your marksheet)</label>
                                <input type="text" name="first_name" class="form-control" id="first_name"  required>
                                <div class="invalid-feedback">
                                    Please enter your firstname
                                </div>
                            </div>
                            <!-- middle name -->
                            <div class="mb-3">
                                <label for="middle_name" class="form-label">Middle Name (as on your marksheet)</label>
                                <input type="text" name="middle_name" class="form-control" id="middle_name">
                            </div>
                            <!-- last name -->
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name (as on your marksheet)</label>
                                <input type="text" name="last_name" class="form-control" id="last_name" required>
                                <div class="invalid-feedback">
                                    Please enter your lastname
                                </div>
                            </div>
                            <!-- Date of birth -->
                            <div class="mb-3">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" name="dob" class="form-control" id="dob"  min='1950-01-01' required>
                                <div class="invalid-feedback">
                                    Please enter your date of birth
                                </div>
                            </div>
                            <!-- linkedin addres -->
                            <div class="mb-3">
                                <label for="linkedin_address" class="form-label">Linkedin Address</label>
                                <input type="text" name="linkedin_address" class="form-control" id="linkedin_address" placeholder="eg: https://www.linkedin.com/in/abc" >
                                    <div class="invalid-feedback">
                                    Please enter a valid Linkedin address to your profile.Copy it from your Linked profile.
                                </div>
                            </div>

                             <!-- Phone number -->
                             <div class="mb-3">
                                <label for="phone_number" class="form-label">Phone number</label>
                                <input type="tel" maxLength="10" name="phone_number" class="form-control"  id="phone_number" >
                                <div class="invalid-feedback">
                                    Please enter a valid phone number
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group">
                                    <input type="email" class="form-control"  name="email" id="email" aria-describedby="button-addon2">
                                    <div class="invalid-feedback">
                                    Please enter a valid email address
                                </div>
                                    <button class="btn btn-outline-secondary" type="button" id="emailbutton-addon2" disabled>Verify Email</button>
                                </div>
                               
                            </div>

                            <!-- Verify the OTP  -->
                            <div class="mb-3" id="verify_email_otp_div" hidden>
                                <label for="verify_email_otp" class="form-label">Verify your OTP</label>
                               
                                    <input type="tel"  pattern ="\d*" maxLength="6" name="verify_email_otp" class="form-control mb-2"  id="verify_email_otp" >
                                    <div class="invalid-feedback">
                                        Please enter a the OTP sent to your email.Please check your SPAM folder as well
                                    </div>
                                    <div class="valid-feedback">
                                        Email is successfully verified! 
                                    </div>
                            
                        </div>


                            <div class="mb-3">
                                <!-- next page button -->
                                <button type="button" name="next_page_2" id="next_page_2" class="btn btn-primary px-5 py-2 ms-5 mt-3">Next</button>
                            </div>
                        </div>
                        
                        <!-- Page 2 starts  Bachelor Degree -->
                        <div id="page2">
                            <!-- Bachelor Degree degree name -->
                            <div class="mb-3">
                                <label for="bachelors_degree_list" class="form-label">Bachelor's Degree</label>
                               
                                <select class="form-select" aria-label="Bachelors degree" name="bachelors_degree_list" id="bachelors_degree_list">
                                    <option selected>Select a bachelors degree</option>
                                    <option value="BA">BA</option>
                                    <option value="BSC">BSC</option>
                                    <option value="BCOM">BCOM</option>
                                    <option value="BCOM-BI">BCOM-BI</option>
                                    <option value="BCOM-AF">BCOM-AF</option>
                                    <option value="BVoc">BVoc</option>
                                    <option value="BAMMC">BAMMC</option>
                                    <option value="BMS">BMS</option>
                                    <option value="Other">Other</option>
                                </select>
                                
                                <div class="invalid-feedback">
                                    Please select a degree
                                </div>
                            </div>
                            <!-- Bachelor Degree college name -->
                            <div class="mb-3">
                                <label for="bachelor_college_name" class="form-label">Name of College</label>
                                <input type="text" name="bachelor_college_name" list="vaze_college_name" class="form-control" id="bachelor_college_name"  required>

                                <!--auto suggest the name of Vaze college-->
                                <datalist id="vaze_college_name">
                                    <option value="KET's V.G. Vaze College of Arts,Science and Commerce">
                                </datalist>

                                <div class="invalid-feedback" id="feedback_bachelor_degree_college_name">
                                    Please enter the name of the college
                                </div>

                            </div>
                            <!-- Bachelor Degree admission year -->
                            <div class="mb-3">
                                <label for="bachelors_admission_year" class="form-label">Year of Admission</label>
                                <input type="number" maxLength="4" name="bachelors_admission_year" class="form-control"  id="bachelors_admission_year" min="1950" required>
                                <div class="invalid-feedback" id="feedback_bachelor_degree_admission_year">
                                    Please enter the year you took admission in the college
                                </div>
                            </div>
                        
                               
                        <!--starts Master Degree -->
                    
                            <!--Master Degree  name -->
                            <div class="mb-3">
                                <label for="masters_degree_list" class="form-label">Master's Degree</label>
                                <select class="form-select" aria-label="Bachelors degree" name="masters_degree_list" id="masters_degree_list">
                                    <option selected>None</option>
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
                            <!-- Master Degree college name -->
                            <div class="mb-3">
                                <label for="masters_college_name" class="form-label">Name of College</label>
                                <input type="text" name="masters_college_name" list ="vaze_college_name" class="form-control" id="masters_college_name">

                                <div class="invalid-feedback" id="feedback_master_degree_college_name">
                                Please enter the name of the college
                                </div>
 <!--auto suggest the name of Vaze college-->
                                <datalist id="vaze_college_name">
                                    <option value="KET's V.G. Vaze College of Arts,Science and Commerce">
                                </datalist>
                            </div>

                            <!-- Master Degree admission year -->
                            <div class="mb-3">
                                <label for="masters_admission_year" class="form-label">Year of Admission</label>
                                <input type="number" maxLength="4" name="masters_admission_year" class="form-control" id="masters_admission_year" min="1950">
                                <div class="invalid-feedback" id="feedback_master_degree_admission_year">
                                    Please enter the year you took admission in the college
                                </div>
                            </div>
                            
                                <div class="mb-3">
                                <!-- previous page button -->
                                <button type="button" name="previous_page_1" id="previous_page_1" class="btn btn-secondary px-5 py-2 ms-2 mt-3">Previous</button>

                                <!-- next page button -->
                                <button type="button" name="next_page_3" id="next_page_3" class="btn btn-primary px-5 py-2 ms-2 mt-3">Next</button>
                            </div>
                            
                                </div>

                        <!-- Page 3 starts  Professional Details -->
                        <div id="page3">
                            <!-- Name of Company/Institution -->
                            <div class="mb-3">
                                <label for="company_name" class="form-label">Name of Company/Institution</label>
                                <input type="text" name="company_name" class="form-control" id="company_name" >
                                <div class="invalid-feedback">
                                    Please enter your company/institution name
                                </div>

                            </div>
                            <!-- Designation -->
                            <div class="mb-3">
                                <label for="designation" class="form-label">Designation</label>
                                <input type="text" name="designation" class="form-control" id="designation" >
                                <div class="invalid-feedback">
                                    Please enter your designation
                                </div>
                            </div> 
                            <div class="mb-3">
                                <!-- previous page button -->
                                <button type="button" name="previous_page_2" id="previous_page_2" class="btn btn-secondary px-5 py-2 ms-2 mt-3">Previous</button>

                                <!-- next page button -->
                                <button type="button" name="next_page_4" id="next_page_4" class="btn btn-primary px-5 py-2 ms-2 mt-3">Next</button>
                            </div>
                        </div>

                        <!-- Page 4 starts  Password -->
                        <div id="page4">
                            <!-- password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" id="password" required>
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
                                    <input type="password" name="confirm_password" class="form-control" id="confirm_password" required>
                                    
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
                            <div class="mb-3">
                                <!-- previous page button -->
                                <button type="button" name="previous_page_3" id="previous_page_3" class="btn btn-secondary px-5 py-2 ms-2 mt-3">Previous</button>

                                <!-- Submit button -->
                                <button type="submit" name="submit" id="submit" class="btn btn-primary px-5 py-2 ms-2 mt-3" disabled>Submit</button>

                            </div>
                        </div>

                    </form>
                </div>
                <div class="p-4 col-lg-6 my-auto">
                    <!-- image -->
                    <img src="https://img.freepik.com/premium-vector/online-registration-sign-up-with-man-sitting-near-smartphone_268404-95.jpg?w=1480" alt="" class="img-fluid h-auto w-100 my-5" />
                    <p class="text-center mt-5">
                        <a href="../main/login.php"  class="link-dark">Already have an account? Log in</a>
                    </p>
                </div>
                
               
            </div>
        </div>
</main>
        <script src="../js/sign_up.js"></script>
</body>
</html>