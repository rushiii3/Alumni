//GLOBAL VARIABLES

var forgotpassword_form = document.getElementById("forgotpasswordform");

var failed_modal_message_para = document.getElementById(
  "failed_registration_message"
);

var email_input_feedback = document.getElementById("email_input_feedback");
//PAGE 1
var generated_OTP = "";
var email_sent_to_address = "";
var email = "";
var email_input = document.getElementById("email");
var verify_email_button = document.getElementById("emailbutton-addon2");
var verify_otp_div = document.getElementById("verify_email_otp_div");
var verify_otp_input = document.getElementById("verify_email_otp");

let does_user_exist = false;

//PAGE 2
var password = "",
  confirm_password = "",
  final_password = "";
var are_passwords_verified = false;
var password_input = document.getElementById("password");
var confirm_password_input = document.getElementById("confirm_password");

var feedback_password_input = document.getElementById(
  "feedback_password_input"
);
var feedback_confirm_password_input = document.getElementById(
  "feedback_confirm_password_input"
);

var submit_button = document.getElementById("submit");

//----------------------------------------------------------------------------------------------------------------------------------------------------------
//PASSWORD HIDE AND UNHIDE
$step = $(".stepper-item");
$step.eq(0).addClass("active");

$(".pass_open_eye").hide();
$(".cpass_open_eye").hide();
$(".pass_icon").on("click", function () {
  if ("password" == $("#password").attr("type")) {
    $("#password").prop("type", "text");
    $(".pass_open_eye").show();
    $(".pass_close_eye").hide();
  } else {
    $("#password").prop("type", "password");
    $(".pass_open_eye").hide();
    $(".pass_close_eye").show();
  }
});
$(".confirm_pass_icon").on("click", function () {
  if ("password" == $("#confirm_password").attr("type")) {
    $("#confirm_password").prop("type", "text");
    $(".cpass_open_eye").show();
    $(".cpass_close_eye").hide();
  } else {
    $("#confirm_password").prop("type", "password");
    $(".cpass_open_eye").hide();
    $(".cpass_close_eye").show();
  }
});

//STEPPER VIEW NAVIGATION
$page1 = $("#page1");
$page2 = $("#page2");

//$page5 = $('#page5');
$page2.hide();

// $page5.hide();

//NEXT BUTTON
//page 1 to page 2
$("#next_page_2").on("click", function () {
  if (!validateFieldsOnPage1()) {
    //alert("Please fill in all the required fields");
  } else {
    //console.log(validateFieldsOnPage1);
    //else go to next page
    $page1.fadeOut();
    $page1.hide();
    $page2.fadeIn();
    $page2.show();
    $step.eq(0).removeClass("active");
    $step.eq(0).addClass("compvared");
    $step.eq(1).addClass("active");
  }
});

//PREVIOUS BUTTON
//PAGE 2 TO PAGE 1
$("#previous_page_1").on("click", function () {
  $step.eq(0).addClass("active");
  $step.eq(1).removeClass("active");
  $page2.fadeOut();
  $page2.hide();
  $page1.fadeIn();
  $page1.show();
});

//-----------------------------------------------------------------------------------------------------------------------------------
//OTHER LISTENERS

//1.When clicked on verify button display the verify otp section
verify_email_button.addEventListener("click", function () {
  //displayEmailOTPDiv();

  //check whether the email exists with us

  checkWhetherUserEmailExists(email_input.value)
    .then(function (userExists) {
      if (userExists == true) {
        //todo:generate the otp and send the email
        generateOTP();
        sendEmail(email_input.value);
        verify_otp_div.removeAttribute("hidden");
        email_input.classList.remove("is-invalid");
      } else if (userExists == "User not found") {
        failed_modal_message_para.innerHTML =
          "<strong>We could not find a user with this email </strong>";
        $("#failed_modal").modal("show");

        email_input_feedback.innerText = "No such user exists";
        email_input.classList.add("is-invalid");
      }
    })
    .catch(function (error) {
      failed_modal_message_para.innerHTML =
        "<strong> Oops!Some unexpected error occured.Please try again later</strong>";
      $("#failed_modal").modal("show");
    });
});

//WHEN USER SUBMITS THE FORM
document.addEventListener("DOMContentLoaded",function(){

  forgotpassword_form.addEventListener("submit",function(e){
    e.preventDefault();

    resetPasswordOfUserInDatabase();
  })
})

//

//-----------------------------------------------------------------------------------------------------------------------------------

//FUNCTIONS
//1.displays the Enter OTP div . Should be visible only when the email is valid
function displayEmailOTPDiv() {
  verify_otp_div.removeAttribute("hidden");
}

//2.send the email with OTP
function sendEmail(email_to) {
  email_sent_to_address = email_to;
  var body_of_email = `<div id='emailContent' style='max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; background-color: #f9f9f9;'><div style='max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; background-color: #f9f9f9;'><table style='height: 100%; width: 100%; background-color: #f5f6f8;'><tbody><tr><td valign='top' class='edimg' style='padding: 5px; box-sizing: border-box; text-align: center;'><img src='https://github.com/rushiii3/Book_A_Slot/blob/main/src/img/logo11.jpeg?raw=true' alt='Image' width='108' style='border-width: 0px; border-style: none; max-width: 108px; width: 100%;'></td> </tr><tr><td valign='top' class='edtext' style='padding: 5px; text-align: left; color: #5f5f5f; font-size: 15px; '><h2 class='text-center' style='text-align: center;'><strong>V.G. Vaze College of Arts, Science and Commerce (Autonomous)</strong></h2></td></tr><tr><td valign='top' class='edtext' style='background-color: #ffffff;padding: 32px; text-align: left; color: #5f5f5f; font-size: 15px; '><p class='text-center' style='text-align: center; margin: 0px; padding: 0px;'>Greetings <strong> ${email_to}</strong>!</p><br><p class='text-center' style='text-align: center; margin: 0px; padding: 0px;'>You have requested to verify this email address </p><br><br><p class='text-center' style='text-align: center; margin: 0px; padding: 0px;'>The requested OTP is :  <strong>${generated_OTP}</strong>.Please do not share this OTP with anyone. </p> <p style='margin: 0px; font-size: 15px;margin-top:4rem ;'>Vaze Alumni App</p></td></tr><tr><td valign='top' class='edtext' style='padding: 20px; text-align: left; color: #5f5f5f; font-size: 15px;'><p class='text-center' style='line-height: 1.75em; text-align: center; margin: 0px; padding: 0px;'><span style='font-size: 11px;'>If you no longer wish to receive mail from us, you can <a href='{unsubscribe}' style='background-color: initial; color: #5457ff; text-decoration: none;'>unsubscribe</a></span><br></p></td></tr></tbody></table></div></div>`;
  Email.send({
    SecureToken: "9a49be4b-36f9-4e80-ace1-6be7717131e8",
    To: email_to,
    From: "vazealumniappmanager@gmail.com",
    Subject: "Email verification for Vaze Alumni",
    Body: body_of_email,
  }).then((message) => console.log(message));
}

//2.generate an OTP
function generateOTP() {
  generated_OTP = Math.floor(Math.random() * 900000) + 100000;
  //console.log(generated_OTP);
  return generated_OTP;
}

//3. Check whether the user with entered email exists
function checkWhetherUserEmailExists(email) {
  return new Promise(function (resolve, reject) {
    // var does_user_exist=false;
    var requestdata = {
      email: email,
    };

    $.ajax({
      url: "https://alumniandroidapp.000webhostapp.com/check_is_user_registered_forgot_password_activity.php",

      //https://vazecollege.net/ALUMNI/check_is_user_registered_forgot_password_activity.php
      //https://alumniandroidapp.000webhostapp.com/

      // PHP file to handle the form data
      type: "POST", // HTTP method (POST in this case)
      data: requestdata, // Form data object
      dataType: "text", // Expected data type of the response
      success: function (response) {
        if (response.includes("User not found")) {
          // failed_modal_message_para.innerHTML =
          //   "<strong>We could not find a user with this email </strong>";
          // $("#failed_modal").modal("show");

          resolve("User not found");
          //does_user_exist=false;

          is_email_verified = false; // to prevent the user from going to next screen which is to reset password
        } else if (response.includes("User found")) {
          //registration successful
          //$("#success_modal").modal("show");
          //does_user_exist=true;
          resolve(true);
        }

        console.log(response);
      },
      error: function (xhr, status, error) {
        // Handle the error

        reject("AJAX ERROR:" + status + error);
        // failed_modal_message_para.innerHTML =
        //   "<strong> Oops!Some unexpected error occured.Please try again later</strong>";
        // $("#failed_modal").modal("show");
        // alert("Oops! There was some error occured.Please try again later")
        console.error(
          "AJAX Request failed. Status: " + status + ". Error: " + error
        );
      },
    });
  });
}

//Page 2 validation
function validateFieldsOnPage1() {
  if (email_input.value === "") {
    email_input.focus();
    email_input.dispatchEvent(new Event("input")); //trigger the email verification
    return false;
  } else if (!is_email_verified) {
    alert("Please verify your email to proceed further");
    return false;
  } else {
    email = email_input.value;

    return true;
  }
}

//Page 2 validation
function validateFieldsOnPage2() {
  //get the data from input fields

  password = password_input.value;
  confirm_password = confirm_password_input.value;
  if (password === "") {
    password_input.dispatchEvent(new Event("input")); //trigger the validation of password
    return false;
  } else if (confirm_password === "") {
    confirm_password_input.dispatchEvent(new Event("input")); ///trigger the validation of confirm password
    return false;
  } else if (!are_passwords_verified) {
    confirm_password_input.dispatchEvent(new Event("input")); ///trigger the validation of confirm password
    return false;
  } else {
    password = password_input.value;
    return true;
  }
}

//RESET the password of the user
function resetPasswordOfUserInDatabase(){

  var final_password= password_input.value;

  var resetPasswordform={
username: email_input.value,
password:final_password
  }

  $.ajax({
    url: "https://alumniandroidapp.000webhostapp.com/alumni_update_password_profile_fragment.php",

    //https://vazecollege.net/ALUMNI/check_is_user_registered_forgot_password_activity.php
    //https://alumniandroidapp.000webhostapp.com/

    // PHP file to handle the form data
    type: "POST", // HTTP method (POST in this case)
    data: resetPasswordform, // Form data object
    dataType: "text", // Expected data type of the response
    success: function (response) {
      if (response.includes("Update password unsuccessful")) {
         failed_modal_message_para.innerHTML =
           "<strong>There was some error resetting the password. Please try again later. </strong>";
         $("#failed_modal").modal("show");

        resolve("User not found");
        //does_user_exist=false;

        is_email_verified = false; // to prevent the user from going to next screen which is to reset password
      } else if (response.includes("Updated password successfully")) {
        //password reset successful
        $("#success_modal").modal("show");
        
       
      }

      console.log(response);
    },
    error: function (xhr, status, error) {
      // Handle the error

      failed_modal_message_para.innerHTML =
           "<strong>There was some error resetting the password. Please try again later. </strong>";
         $("#failed_modal").modal("show");
      console.error(
        "AJAX Request failed. Status: " + status + ". Error: " + error
      );
    },
  });


}

//VALIDATION WHEN THE USER IS TYPING

//...........................................................PAGE 1...............................................................

//1.Validate the email when user is typing in the text field
email_input.addEventListener("input", function () {
  var entered_email = email_input.value.trim();
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!emailRegex.test(entered_email)) {
    email_input_feedback.innerText = "Please enter a valid email address";
    email_input.classList.add("is-invalid");
    verify_email_button.disabled = true;
    verify_email_button.classList.add("disabled");
    is_email_verified = false;
  } else {
    if (
      (email_sent_to_address !== "") &
      (entered_email !== email_sent_to_address)
    ) {
      //when user verifies an email and then tries to change the entered email then reset the otp field
      verify_otp_input.classList.remove("is-valid");
      verify_otp_input.classList.add("is-invalid");
      verify_otp_input.value = "";
    } else {
      email_input.classList.remove("is-invalid");
      verify_email_button.disabled = false;
      verify_email_button.classList.remove("disabled");
    }
  }
});

//4.validate the OTP field
verify_otp_input.addEventListener("input", function () {
  var entering_OTP = verify_otp_input.value.trim();
  var OTP_regex = /^\d{6}$/;

  if (!OTP_regex.test(entering_OTP)) {
    verify_otp_input.classList.add("is-invalid");
    verify_otp_input.classList.remove("is-valid");
  } else if (
    (entering_OTP == generated_OTP) &
    (email_input.value == email_sent_to_address)
  ) {
    // the email is the same to which the mail was sent
    is_email_verified = true;
    verify_otp_input.classList.add("is-valid");
    verify_otp_input.classList.remove("is-invalid");
  } else if (entering_OTP != generated_OTP) {
    is_email_verified = false;
    verify_otp_input.classList.remove("is-valid");
    verify_otp_input.classList.add("is-invalid");
  } else {
    is_email_verified = false;
    verify_otp_input.classList.remove("is-valid");
    verify_otp_input.classList.add("is-invalid");
  }
});

//...........................................................PAGE 2...............................................................

//1.the password should be minimum 8 characters and should contain 1 character,one uppercase alphabet and 1 digit
password_input.addEventListener("input", function () {
  var passwordRegex = /^(?=.*\d)(?=.*[a-zA-Z])(?=.*[A-Z]).+$/;
  var entered_password = password_input.value;

  if (entered_password.length < 8) {
    feedback_password_input.innerText =
      "Password should be contain minimum 8 characters.";
    password_input.classList.add("is-invalid");
  } else {
    if (!passwordRegex.test(entered_password)) {
      //invalid password
      feedback_password_input.innerText =
        "Password should be contain one digit and one capital case alphabet.";
      password_input.classList.add("is-invalid");
    } else {
      // Valid password
      password = entered_password;
      password_input.classList.remove("is-invalid");

      // Check if confirm password is mismatched
      if (confirm_password_input.value !== password) {
        confirm_password_input.dispatchEvent(new Event("input")); // Trigger confirm password validation
      }
    }
  }
});

//8.confirm password
confirm_password_input.addEventListener("input", function () {
  var entered_confirm_password = confirm_password_input.value;
  if (entered_confirm_password === password) {
    //enable the submit button
    submit_button.disabled = false;
    final_password = password;
    confirm_password_input.classList.remove("is-invalid");
    confirm_password_input.classList.add("is-valid");
  } else if (entered_confirm_password !== password) {
    //disable the submit button
    submit_button.disabled = true;
    feedback_confirm_password_input.innerText = "The passwords dont match";
    confirm_password_input.classList.add("is-invalid");
    confirm_password_input.classList.remove("is-valid");
  }
});
