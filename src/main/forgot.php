<?php
//include the dbconnect file to connect to the database
//require "dbconnect.php";

//start the session
session_start();

//check if user is already logged in and redirect the user if logged in.

if (isset($_SESSION['isloggedin'])) {
    if ($_SESSION['isloggedin']) {

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
    <title>Reset Password</title>
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
                    <p class="fs-6 text-center"><strong>Congratulations.</strong> <br /> Your password has been successfully reset.</p>
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
                    <p class="fs-6 text-center" id="failed_registration_message"><strong>Failed to reset password.</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Try Again</button>
                </div>
            </div>
        </div>
    </div>


    <main id="main">
        <div class="container mt-5 mb-5 shadow p-3 mb-5 bg-body" id="container">
            <div class="row p-3">

                <div class="p-1 col-lg-6">
                    <p class="h1 mb-3">Forgot Password?</p>

                    <div class="pro">
                        <div class="stepper-wrapper">
                            <div class="stepper-item ">
                                <div class="step-counter">1</div>
                                <div class="step-name text-center">Enter Email</div>
                            </div>
                            <div class="stepper-item ">
                                <div class="step-counter">2</div>
                                <div class="step-name text-center">Enter new Password</div>
                            </div>

                        </div>
                    </div>


                    <form id="forgotpasswordform">
                        <!-- Page 1 starts  Personal Details -->
                        <div id="page1">
                        
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" name="email" id="email" aria-describedby="button-addon2">
                                    <div class="invalid-feedback" id="email_input_feedback">
                                        Please enter a valid email address
                                    </div>
                                    <button class="btn btn-outline-secondary" type="button" id="emailbutton-addon2" disabled>Verify Email</button>
                                </div>

                            </div>

                            <!-- Verify the OTP  -->
                            <div class="mb-3" id="verify_email_otp_div" hidden>
                                <label for="verify_email_otp" class="form-label">Verify your OTP</label>

                                <input type="tel" pattern="\d*" maxLength="6" name="verify_email_otp" class="form-control mb-2" id="verify_email_otp">
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

                        <!-- PAGE 2 ENTER NEW PASSWORD STARTS-->
                        <div id="page2">
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

                                    <div class="valid-feedback">
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
            </div>
        </div>
    </main>
    <script src="../js/forgot_password.js"></script>

</body>


</html>