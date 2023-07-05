<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../css/sign_up.css">

</head>
<body>
    <?php
    include_once "loader.html";
    ?>
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
                            <div class="step-name text-center">Bachlor <br>Degree</div>
                        </div>
                        <div class="stepper-item ">
                            <div class="step-counter">3</div>
                            <div class="step-name text-center">Master<br>Degree </div>
                        </div>
                        <div class="stepper-item ">
                            <div class="step-counter">4</div>
                            <div class="step-name text-center">Professional <br>Details</div>
                        </div>
                        <div class="stepper-item ">
                            <div class="step-counter">5</div>
                            <div class="step-name text-center">Set up <br>Password</div>
                        </div>
                        </div>
                    </div>
                    <form action="<?php $_PHP_SELF ?>" method="POST">
                        <!-- Page 1 starts  Personal Details -->
                        <div id="page1">
                            <!-- First name -->
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="e.g. abc def" required>
                            </div>
                            <!-- middle name -->
                            <div class="mb-3">
                                <label for="middle_name" class="form-label">Middle Name</label>
                                <input type="text" name="middle_name" class="form-control" id="middle_name" placeholder="e.g. abc def" required>
                            </div>
                            <!-- last name -->
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="e.g. abc def" required>
                            </div>
                            <!-- Date of birth -->
                            <div class="mb-3">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" name="dob" class="form-control" id="dob" placeholder="e.g. abc def" required>
                            </div>
                            <!-- linkedin addres -->
                            <div class="mb-3">
                                <label for="linkedin_address" class="form-label">Linkedin Address</label>
                                <input type="text" name="linkedin_address" class="form-control" id="linkedin_address" placeholder="e.g. abc def" required>
                            </div>
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Email" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Verify</button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <!-- next page button -->
                                <button type="button" name="next_page_2" id="next_page_2" class="btn btn-primary px-5 py-2 ms-5 mt-3">Next</button>
                            </div>
                        </div>
                        
                        <!-- Page 2 starts  Bachlor Degree -->
                        <div id="page2">
                            <!-- Bachlor Degree course name -->
                            <div class="mb-3">
                                <label for="bachlor_course" class="form-label">Course</label>
                                <input type="text" name="bachlor_course" class="form-control" id="bachlor_course" placeholder="e.g. abc def" required>
                            </div>
                            <!-- Bachlor Degree college name -->
                            <div class="mb-3">
                                <label for="bachlor_college_name" class="form-label">Name of College</label>
                                <input type="text" name="bachlor_college_name" class="form-control" id="bachlor_college_name" placeholder="e.g. abc def" required>
                            </div>
                            <!-- Bachlor Degree admission year -->
                            <div class="mb-3">
                                <label for="bachlor_college_year_admission" class="form-label">Year of Admission </label>
                                <input type="text" name="bachlor_college_year_admission" class="form-control" id="bachlor_college_year_admission" placeholder="e.g. abc def" required>
                            </div>
                            
                            <div class="mb-3">
                                <!-- previous page button -->
                                <button type="button" name="previous_page_1" id="previous_page_1" class="btn btn-secondary px-5 py-2 ms-2 mt-3">Previous</button>

                                <!-- next page button -->
                                <button type="button" name="next_page_3" id="next_page_3" class="btn btn-primary px-5 py-2 ms-2 mt-3">Next</button>
                            </div>
                        </div>
                        <!-- Page 3 starts Master Degree -->
                        <div id="page3">
                            <!--Master Degree course name -->
                            <div class="mb-3">
                                <label for="master_course" class="form-label">Course</label>
                                <input type="text" name="master_course" class="form-control" id="master_course" placeholder="e.g. abc def" required>
                            </div>
                            <!-- Master Degree college name -->
                            <div class="mb-3">
                                <label for="master_college_name" class="form-label">Name of College</label>
                                <input type="text" name="master_college_name" class="form-control" id="master_college_name" placeholder="e.g. abc def" required>
                            </div>
                            <!-- Master Degree admission year -->
                            <div class="mb-3">
                                <label for="master_college_year_admission" class="form-label">Year of Admission</label>
                                <input type="text" name="master_college_year_admission" class="form-control" id="master_college_year_admission" placeholder="e.g. abc def" required>
                            </div>
                            
                            <div class="mb-3">
                                <!-- previous page button -->
                                <button type="button" name="previous_page_2" id="previous_page_2" class="btn btn-secondary px-5 py-2 ms-2 mt-3">Previous</button>

                                <!-- next page button -->
                                <button type="button" name="next_page_4" id="next_page_4" class="btn btn-primary px-5 py-2 ms-2 mt-3">Next</button>
                            </div>
                        </div>

                        <!-- Page 4 starts  Professional Details -->
                        <div id="page4">
                            <!-- Name of Company/Institution -->
                            <div class="mb-3">
                                <label for="company_name" class="form-label">Name of Company/Institution</label>
                                <input type="text" name="company_name" class="form-control" id="company_name" placeholder="e.g. abc def" required>
                            </div>
                            <!-- Designation -->
                            <div class="mb-3">
                                <label for="Designation" class="form-label">Designation</label>
                                <input type="text" name="Designation" class="form-control" id="Designation" placeholder="e.g. abc def" required>
                            </div> 
                            <div class="mb-3">
                                <!-- previous page button -->
                                <button type="button" name="previous_page_3" id="previous_page_3" class="btn btn-secondary px-5 py-2 ms-2 mt-3">Previous</button>

                                <!-- next page button -->
                                <button type="button" name="next_page_5" id="next_page_5" class="btn btn-primary px-5 py-2 ms-2 mt-3">Next</button>
                            </div>
                        </div>

                        <!-- Page 5 starts  Bachlor Degree -->
                        <div id="page5">
                            <!-- password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="e.g. abc def" required>
                                    <span class="input-group-text pass_icon" id="basic-addon1">
                                        <i class="bi bi-eye-fill pass_open_eye"></i>
                                        <i class="bi bi-eye-slash-fill pass_close_eye"></i>
                                    </span>
                                </div>
                            </div>
                            <!-- confirm password -->
                            <div class="mb-3">
                                <label for="confirm-password" class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" name="confirm-password" class="form-control" id="confirm-password" placeholder="e.g. abc def" required>
                                    <span class="input-group-text confirm_pass_icon" id="basic-addon1">
                                        <i class="bi bi-eye-fill cpass_open_eye"></i>
                                        <i class="bi bi-eye-slash-fill cpass_close_eye"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <!-- previous page button -->
                                <button type="button" name="previous_page_4" id="previous_page_4" class="btn btn-secondary px-5 py-2 ms-2 mt-3">Previous</button>

                                <!-- Submit button -->
                                <button type="submit" name="submit" id="submit" class="btn btn-primary px-5 py-2 ms-2 mt-3">Submit</button>

                            </div>
                        </div>

                    </form>
                </div>
                <div class="p-4 col-lg-6 my-auto">
                    <!-- image -->
                    <img src="https://img.freepik.com/premium-vector/online-registration-sign-up-with-man-sitting-near-smartphone_268404-95.jpg?w=1480" alt="" class="img-fluid h-auto w-100 my-5" />
                    <p class="text-center mt-5">
                        <a href="sign_in.php"  class="link-dark">Already have an account? Sign in</a>
                    </p>
                </div>
                
               
            </div>
        </div>
</main>
        <script src="../js/sign_up.js"></script>
</body>
</html>