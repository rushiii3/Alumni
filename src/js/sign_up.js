//GLOBAL VARIABLES

//PAGE 1
   let is_email_verified=false;
   let is_phone_number_valid=false;
   let is_valid_linkedin_address=false;

   let firstname_input=document.getElementById("first_name");
   let middlename_input=document.getElementById("middle_name");
   let lastname_input=document.getElementById("last_name");
   let dob_input=document.getElementById("dob");
   let linkedin_address_input=document.getElementById("linkedin_address");
   let phone_number_input=document.getElementById("phone_number");

   let email_input=document.getElementById("email");
   let verify_email_button=document.getElementById("emailbutton-addon2");
   let verify_otp_div=document.getElementById("verify_email_otp_div");
   let verify_otp_input=document.getElementById("verify_email_otp");



   let errorInputFieldsArray=new Array();
   let generated_OTP="";

   //PAGE 2.
   
//----------------------------------------------------------------------------------------------------------------------------------------------------------
//PASSWORD HIDE AND UNHIDE 
$step = $('.stepper-item');
$step.eq(0).addClass("active");
$('.pass_open_eye').hide();
$('.cpass_open_eye').hide();
$('.pass_icon').on('click',function(){
    if('password' == $('#password').attr('type')){
        $('#password').prop('type', 'text');
        $('.pass_open_eye').show();
        $('.pass_close_eye').hide();

   }else{
        $('#password').prop('type', 'password');
        $('.pass_open_eye').hide();
        $('.pass_close_eye').show();
   }
})
$('.confirm_pass_icon').on('click',function(){
    if('password' == $('#confirm_password').attr('type')){
        $('#confirm_password').prop('type', 'text');
        $('.cpass_open_eye').show();
        $('.cpass_close_eye').hide();

   }else{
        $('#confirm_password').prop('type', 'password');
        $('.cpass_open_eye').hide();
        $('.cpass_close_eye').show();
   }
})

//STEPPER VIEW NAVIGATION
   $page1 = $('#page1');
    $page2 = $('#page2');
    $page3 = $('#page3');
    $page4 = $('#page4');
    $page5 = $('#page5');
    $page2.hide();
    $page3.hide();
    $page4.hide();
    $page5.hide();
   
    //page 1 to page 2
$('#next_page_2').on('click',function(){
    if(!validateFieldsOnPage1()){
//alert("Please fill in all the required fields");
    }
    else{
//console.log(validateFieldsOnPage1);
    //else go to next page
    $page1.fadeOut();
    $page1.hide();
    $page2.fadeIn();
    $page2.show();
    $step.eq(0).removeClass("active");
    $step.eq(0).addClass("completed");
    $step.eq(1).addClass("active");
    }
})

//PAGE 2 TO PAGE 3
$('#next_page_3').on('click',function(){
    $page2.fadeOut();
    $page2.hide();
    $page3.fadeIn();
    $page3.show();
    $step.eq(1).removeClass("active");
    $step.eq(1).addClass("completed");
    $step.eq(2).addClass("active");
})
$('#next_page_4').on('click',function(){
    $page3.fadeOut();
    $page3.hide();
    $page4.fadeIn();
    $page4.show();
    $step.eq(2).removeClass("active");
    $step.eq(2).addClass("completed");
    $step.eq(3).addClass("active");
})
$('#next_page_5').on('click',function(){
    $page4.fadeOut();
    $page4.hide();
    $page5.fadeIn();
    $page5.show();
    $step.eq(3).removeClass("active");
    $step.eq(3).addClass("completed");
    $step.eq(4).addClass("active");
})

$('#previous_page_1').on('click',function(){
    $step.eq(0).addClass("active");
    $step.eq(1).removeClass("active");
    $page2.fadeOut();
    $page2.hide();
    $page1.fadeIn();
    $page1.show();
})
$('#previous_page_2').on('click',function(){
    $step.eq(1).addClass("active");
    $step.eq(2).removeClass("active");
    $page3.fadeOut();
    $page3.hide();
    $page2.fadeIn();
    $page2.show();
})
$('#previous_page_3').on('click',function(){
    $step.eq(2).addClass("active");
    $step.eq(3).removeClass("active");
    $page4.fadeOut();
    $page4.hide();
    $page3.fadeIn();
    $page3.show();
})
$('#previous_page_4').on('click',function(){
    $step.eq(3).addClass("active");
    $step.eq(4).removeClass("active");
    $page5.fadeOut();
    $page5.hide();
    $page4.fadeIn();
    $page4.show();
})
//-----------------------------------------------------------------------------------------------------------------------------------
//OTHER LISTENERS

//1.When clicked on verify button display the verify otp section
verify_email_button.addEventListener('click',function(){
    //displayEmailOTPDiv();
    generateOTP();
    sendEmail();
    verify_otp_div.removeAttribute("hidden");
    //todo:generate the otp and send the email
});

//------------------------------------------------------------------------------------------------------------------------------
//FUNCTIONS

//PAGE 1 validation

//1.validate the fields on page1
function validateFieldsOnPage1(){

    if(firstname_input.value===''){
     //firstname_input.classList.add("is-invalid");
     displayErrorinInputField(firstname_input);
     firstname_input.focus();
     return false;
    }
    else if(lastname_input.value===''){
     //lastname_input.classList.add("is-invalid");
     displayErrorinInputField(lastname_input);
     lastname_input.focus();
     return false;
    }
    else if(dob_input.value===''){
     //dob_input.classList.add("is-invalid");
     displayErrorinInputField(dob_input);
     dob_input.focus();
     return false;
    }
    
    else if(phone_number_input.value===''){
     phone_number_input.focus();
    phone_number_input.dispatchEvent(new Event("input"));//trigger the phone number verification
     return false;
    }
    
    else if(email_input.value===''){
        email_input.focus();
    email_input.dispatchEvent(new Event("input"));//trigger the email verification
     return false;
    }
    else if(linkedin_address_input.value!=="" & !is_valid_linkedin_address){
        linkedin_address_input.focus();
       linkedin_address_input.dispatchEvent(new Event("input"));//trigger thelinkedin verification
     return false;
    }
    else if(!is_phone_number_valid){
        phone_number_input.focus();
        phone_number_input.dispatchEvent(new Event("input"));//trigger the phone number verification
     return false;
    }
    else if(!is_email_verified){
    
     alert("Please verify your email to proceed further");
     return false;
    }
    else{
     return true;
 
    }

 }
 

//2.displays the Enter OTP div . Should be visible only when the email is valid
function displayEmailOTPDiv(){
verify_otp_div.removeAttribute("hidden");
}


  //3.function that checks whether the input fields which were empty earlier are not empty anymore
  function displayErrorinInputField(inputfield) {
    inputfield.classList.add("is-invalid");
    errorInputFieldsArray.push(inputfield);
    removeErrorWhenInputFieldIsNotEmpty();
  }
  

  //4.function to remove the error when user types into the inputfield which was initially empty
  function removeErrorWhenInputFieldIsNotEmpty() {
    errorInputFieldsArray.forEach((element) => {
      element.addEventListener('input', function() {
        if (element.value.trim() !== '') {
          element.classList.remove('is-invalid');
        }else{
            element.classList.add('is-invalid');
        }
      });
    });
  }

  //5.send the email with OTP
  function sendEmail(){

  }

  //6.generate an OTP
  function generateOTP(){
   generated_OTP= Math.floor(Math.random() * 900000) + 100000;
   console.log(generated_OTP);
    return generated_OTP;
  }

 
  //----------------------------------------------------------------------------------------------------------------------------------------

  //Validation
  //1.Validate the email when user is typing in the text field
email_input.addEventListener('input', function() {
    var entered_email = email_input.value.trim();
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  
    if (!emailRegex.test(entered_email)) {
      email_input.classList.add('is-invalid');
      verify_email_button.disabled = true;
      verify_email_button.classList.add('disabled');
    } else {
      email_input.classList.remove('is-invalid');
      verify_email_button.disabled = false;
      verify_email_button.classList.remove('disabled');
    }
  });

  //2. Validate the linkedin address as the user is typing
  linkedin_address_input.addEventListener('input',function(){
    var entered_linked_address=linkedin_address_input.value.trim();
    var linkedin_regex=/^(https?:\/\/)?(www\.)?linkedin\.com\/in\/([a-zA-Z0-9_-]+)$/;

    if(!linkedin_regex.test(entered_linked_address)){
        linkedin_address_input.classList.add("is-invalid");
        is_valid_linkedin_address=false;
    }else{
        linkedin_address_input.classList.remove("is-invalid");
        is_valid_linkedin_address=true;
    }
  });

  //3.validate the phone number
  phone_number_input.addEventListener('input',function(){
    var entered_phone_number=phone_number_input.value.trim();
    var phone_number_regex=/^\d{10}$/;

    if(!phone_number_regex.test(entered_phone_number)){
       phone_number_input.classList.add("is-invalid");
       is_phone_number_valid=false;
    }else{
        phone_number_input.classList.remove("is-invalid");
        is_phone_number_valid=true;
    }
  });

  //4.validate the OTP field
  verify_otp_input.addEventListener('input',function(){
    var entering_OTP=verify_otp_input.value.trim();
    var OTP_regex=/^\d{6}$/;

    if(!OTP_regex.test(entering_OTP)){
        verify_otp_input.classList.add("is-invalid");
        verify_otp_input.classList.remove("is-valid");
       
    }
    else if(entering_OTP==generated_OTP){
        is_email_verified=true;
        verify_otp_input.classList.add("is-valid");
        verify_otp_input.classList.remove("is-invalid");
    }
    else if(entering_OTP!=generated_OTP){
        is_email_verified=false;
        verify_otp_input.classList.remove("is-valid");
        verify_otp_input.classList.add("is-invalid");
    }
    
  });

    
    
    


