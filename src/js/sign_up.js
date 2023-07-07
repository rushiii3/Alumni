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

   let first_name="",middle_name="",last_name="",dob="",linkedin_address="",phone_number="",email="";
   let errorInputFieldsArray=new Array();
   let generated_OTP="";

   //PAGE 2.
   let bachelors_degree="",bachelors_admission_year="",bachelors_degree_college_name="";
   let masters_degree="",masters_admission_year="",masters_degree_college_name="";

   let college_name="KET's V.G. Vaze College of Arts,Science and Commerce";

let is_valid_bachelors_year=false, is_valid_masters_admission_year=false;

   let bachelors_degree_input=document.getElementById("bachelors_degree_list");
   let bachelors_admission_year_input=document.getElementById("bachelors_admission_year");
   let bachelors_degree_college_name_input=document.getElementById("bachelor_college_name");

   let masters_degree_input=document.getElementById("masters_degree_list");
   let masters_admission_year_input=document.getElementById("masters_admission_year");
   let masters_degree_college_name_input=document.getElementById("masters_college_name");

  

   
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
    //$page5 = $('#page5');
    $page2.hide();
    $page3.hide();
    $page4.hide();
   // $page5.hide();
   
    //NEXT BUTTON
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

  if(validateFieldsOnPage2()){
    $page2.fadeOut();
    $page2.hide();
    $page3.fadeIn();
    $page3.show();
    $step.eq(1).removeClass("active");
    $step.eq(1).addClass("completed");
    $step.eq(2).addClass("active");
  }
})

//PAGE 3 TO PAGE 4
$('#next_page_4').on('click',function(){
    $page3.fadeOut();
    $page3.hide();
    $page4.fadeIn();
    $page4.show();
    $step.eq(2).removeClass("active");
    $step.eq(2).addClass("completed");
    $step.eq(3).addClass("active");
})

//PAGE 4 TO PAGE 5
/*
$('#next_page_5').on('click',function(){
    $page4.fadeOut();
    $page4.hide();
    $page5.fadeIn();
    $page5.show();
    $step.eq(3).removeClass("active");
    $step.eq(3).addClass("completed");
    $step.eq(4).addClass("active");
})
*/

//PREVIOUS
//PAGE 2 TO PAGE 1
$('#previous_page_1').on('click',function(){
    $step.eq(0).addClass("active");
    $step.eq(1).removeClass("active");
    $page2.fadeOut();
    $page2.hide();
    $page1.fadeIn();
    $page1.show();
})

//PAGE 3 TO PAGE 2
$('#previous_page_2').on('click',function(){
    $step.eq(1).addClass("active");
    $step.eq(2).removeClass("active");
    $page3.fadeOut();
    $page3.hide();
    $page2.fadeIn();
    $page2.show();
})

//PAGE 4 TO PAGE 3
$('#previous_page_3').on('click',function(){
    $step.eq(2).addClass("active");
    $step.eq(3).removeClass("active");
    $page4.fadeOut();
    $page4.hide();
    $page3.fadeIn();
    $page3.show();
})

//PAGE 5 TO PAGE 4
/*
$('#previous_page_4').on('click',function(){
    $step.eq(3).addClass("active");
    $step.eq(4).removeClass("active");
    $page5.fadeOut();
    $page5.hide();
    $page4.fadeIn();
    $page4.show();
})
*/

//GENERAL LOGIC

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

//2. Setting the max content when DOMcontent is loaded
document.addEventListener('DOMContentLoaded',function(){
  setMaxDateofCalendar();

  //when none is selected disable the masters_college and masters_admission_year fields
  if(masters_degree_input.value.toLowerCase()==='none'){
masters_admission_year_input.disabled=true;
masters_degree_college_name_input.disabled=true;
  }
});

//3.Enabling or disabling the masters_college and masters_admission_year fields based on the option selected from dropdown
masters_degree_input.addEventListener("change",disableEnableMastersFields);

//------------------------------------------------------------------------------------------------------------------------------
//FUNCTIONS

//...........................................................PAGE 1...............................................................

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
      //after successful verification assign the values to the variables
      if(middlename_input.value!==''){
        middle_name=middlename_input.value;
      }

      if(!linkedin_address_input.value!==''){
        linkedin_address=linkedin_address_input.value;
      
      }

      first_name=firstname_input.value;
      last_name=lastname_input.value;
      dob=dob_input.value;
      phone_number=phone_number_input.value;
      email=email_input.value;

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

  //7. set the max date and current date selected in the calendar
  function setMaxDateofCalendar() {
    //set the max date to 31st December but 20 years from today
    const todayDate = new Date();
    const before20Years = todayDate.getFullYear() - 20;
    const maxDate = new Date(before20Years+1,0,1);
    const maxDateString = maxDate.toISOString().split("T")[0];
    dob_input.max = maxDateString;
  
    //set the date to current date but 20 years from now
    const currentDate20YearsBefore = new Date(before20Years, todayDate.getMonth(),todayDate.getDate()+1);
    const currentDate20YearsBeforeString = currentDate20YearsBefore.toISOString().split("T")[0];
    dob_input.value = currentDate20YearsBeforeString;
  }
  

  //...........................................................PAGE 2...............................................................

  //8.Page 2 validation
  function validateFieldsOnPage2(){

  //get the data from the input fields
  bachelors_degree=bachelors_degree_input.value;
  bachelors_degree_college_name=bachelors_degree_college_name_input.value;
  bachelors_admission_year=bachelors_admission_year_input.value;

  masters_degree=masters_degree_input.value;
  masters_degree_college_name=masters_degree_college_name_input.value;
  masters_admission_year=masters_admission_year_input.value;

  let bachelor_college_feedback_div=document.getElementById("feedback_bachelor_degree_college_name");
  let master_college_feedback_div=document.getElementById("feedback_master_degree_college_name");

  let bachelor_admission_year_feedback_div=document.getElementById("feedback_bachelor_degree_admission_year");
  let master_admission_year_feedback_div=document.getElementById("feedback_master_degree_admission_year");


  //check whether the student is of vaze college
        //anyone one college either masters or bachelors should be Vaze

        //1.student has only done bachelors which is not from Vaze College
        if(bachelors_degree_college_name!=='' & masters_degree_college_name==='' & bachelors_degree_college_name!==college_name){
          
          //set the message
          bachelor_college_feedback_div.innerText="You must be a student of Vaze college";

          bachelors_degree_college_name_input.classList.add("is-invalid");
          bachelors_degree_college_name_input.focus();
          return false;
        }

         //2. if the student has done masters and bachelors either of which are not from Vaze College
         else if(bachelors_degree_college_name!=='' & masters_degree_college_name !=='' & bachelors_degree_college_name!==college_name & masters_degree_college_name!==college_name){
          bachelor_college_feedback_div.innerText="You must be a student of Vaze college";
          master_college_feedback_div.innerText="You must be a student of Vaze college";

          bachelors_degree_college_name_input.classList.add("is-invalid");
          masters_degree_college_name_input.classList.add("is-invalid");

          bachelors_degree_college_name_input.focus();
          masters_degree_college_name_input.focus();
          return false;
         } 

         //3. the bachelors college is empty
         else if(bachelors_degree_college_name===''){
          displayErrorinInputField(bachelors_degree_college_name_input);
          bachelors_degree_college_name_input.focus();
          return false;
         }

         //4.else the student is of vaze college
         else{
          //remove any errors set 
          bachelors_degree_college_name_input.classList.remove("is-invalid");
          masters_degree_college_name_input.classList.remove("is-invalid");
         }


         //validation of graduation year
        //masters should always be greater than the bachelors
        if(bachelors_admission_year!=='' & masters_admission_year !==''){
          if(bachelors_admission_year >= masters_admission_year){
            bachelor_admission_year_feedback_div.innerText="Bachelors admission year cant be greater than Masters admission year";
           master_admission_year_feedback_div.innerText="Bachelors admission year cant be greater than Masters admission year";

          bachelors_admission_year_input.classList.add("is-invalid");
          bachelors_admission_year_input.focus();
          return false;
          }
          else{

            //if the masters and bachelors degree have a difference of greater than 80 years then the entries are fake
            if(masters_admission_year - bachelors_admission_year > 80 ){
            bachelor_admission_year_feedback_div.innerText="Please enter valid details";
            master_admission_year_feedback_div.innerText="Please enter valid details";
            bachelors_admission_year_input.classList.add("is-invalid");
            masters_admission_year_input.classList.add("is-invalid");
          bachelors_admission_year_input.focus();
          masters_admission_year_input.focus();
          return false;
        
            }

            else {
              bachelors_admission_year_input.classList.remove("is-invalid");
            masters_admission_year_input.classList.remove("is-invalid");
            }

          }
        }

        else{
          if(bachelors_admission_year===''){
          //the bachelors_admission_year is empty
          bachelor_admission_year_feedback_div.innerText="Please enter the admission year";
          bachelors_admission_year_input.dispatchEvent(new Event("input"));//trigger the validation of admission year
        }
      }
        
//Validation , if the student is from vaze college they should enter the correct graduation in accordance with or college, eg:student cannot enter a value of 1984 since our college began in 1983 so minimum three years for graduation is 1986
        //For Bachelors
        //if the student is from vaze college

        if(bachelors_degree_college_name===college_name){
if(bachelors_admission_year!==''){
  //bachelor admission year is not empty
  if(bachelors_admission_year < 1985){
    bachelor_admission_year_feedback_div.innerText="Please enter a valid admission year";
    bachelors_admission_year_input.classList.add("is-invalid");
    return false;

  }else{
    if(isValidYear(bachelors_admission_year)){
    bachelors_admission_year_input.classList.remove("is-invalid");
    }
  }

}
else{
  //bachelor admission year is empty
  bachelors_admission_year_input.dispatchEvent(new Event("input"));//trigger the validation of admission year
  return false;
}
        }else{
          //student is from another college
          bachelors_admission_year_input.classList.remove("is-invalid");
        }

//Validation , if the student is from vaze college they should enter the correct admission year in accordance with or college, eg:student cannot enter a value of 1984 since our college began in 1983 so minimum three years for graduation is 1986
        //For Masters
        //if the student is from vaze college

        if(masters_degree_college_name===college_name){
          if(masters_admission_year!==''){
            //bachelor admission year is not empty
            if(masters_admission_year < 1985){
              master_admission_year_feedback_div.innerText="Please enter a valid admission year";
              masters_admission_year_input.classList.add("is-invalid");
              return false;
          
            }else{
              if(isValidYear(masters_admission_year)){
              masters_admission_year_input.classList.remove("is-invalid");
            }
          }
          
          }
          else{
            //bachelor admission year is empty
            masters_admission_year_input.dispatchEvent(new Event("input"));//trigger the validation of admission year
            return false;
          }
                  }else{
                    //student is from another college
                    masters_admission_year_input.classList.remove("is-invalid");
                  }


    if(bachelors_degree_input.value==='Select a bachelors degree'){
      displayErrorinInputField(bachelors_degree_input);
      bachelors_degree_input.focus();
      return false;
    }
    else if(bachelors_degree_college_name_input.value===''){
      //displayErrorinInputField(bachelors_degree_college_name_input);
      bachelors_admission_year_input.dispatchEvent(new Event("input"));
      bachelors_degree_college_name_input.focus();
      return false;
    }
    else if(bachelors_degree_college_name_input.classList.contains("is-invalid")){
      bachelors_degree_college_name_input.focus();
      return false;
    }
    else if(bachelors_admission_year_input.classList.contains("is-invalid")){
      bachelors_admission_year_input.dispatchEvent(new Event('input'));
      bachelors_admission_year_input.focus();
      return false;
    }

    //masters 
    else if(masters_degree===''){
      masters_degree_input.classList.add("please select a masters degree or select none");
    }

  else if(masters_degree.toLowerCase()!=="none" & masters_admission_year_input.classList.contains("is-invalid")){
//error in admission year if some master degree is selected
masters_admission_year_input.dispatchEvent(new Event('input'));
masters_admission_year_input.focus();
return false;
  }
else if(masters_degree.toLowerCase()!=="none" &  masters_admission_year===''){
  //admission year is empty if some master degree is selected
  masters_admission_year_input.dispatchEvent(new Event('input'));
  masters_admission_year_input.focus();
}
  else if(masters_degree.toLowerCase()!=="none" & masters_degree_college_name_input.classList.contains("is-invalid")){
    masters_admission_year_input.focus();
    return false;
  }
  else if(masters_degree.toLowerCase()!=="none" & masters_degree_college_name===''){
    displayErrorinInputField(masters_degree_college_name_input);
    masters_degree_college_name_input.focus();
    return false;
  }

  else if(masters_admission_year_input.classList.contains("is-invalid")){
    masters_admission_year_input.focus();
    return false;

  }
  else if(masters_degree_college_name_input.classList.contains("is-invalid")){
    masters_degree_college_name_input.focus();
    return false;
  }
    
    /*
    else if(bachelors_admission_year_input.value===''){
      displayErrorinInputField(bachelors_admission_year_input);
      bachelors_admission_year_input.focus();
      return false;
    }
    else if(!isValidYear(bachelors_admission_year_input)){
return false;
    }
    */
    else{

      return true;
    }
  }

  //9.check whether the admission year is a valid year
  function isValidYear(entered_year){
    var currentyear=new Date().getFullYear();
    var validYearRegex=/^\d{4}$/;

    if(entered_year<1950 || entered_year > currentyear || !validYearRegex.test(entered_year)){
      return false;
    }
    else{
      bachelors_degree=bachelors_degree_input.value;
      bachelors_admission_year=bachelors_admission_year_input.value;
      bachelors_degree_college_name=bachelors_degree_college_name_input.value;

      if(masters_degree_input.value.toLowerCase()==='none'){
        masters_admission_year="";
        masters_degree_college_name="";
      }
  
      return true;
    }

  
  }

  //10.disable the input fields if none is selected and enable them is some degree is selected
  function disableEnableMastersFields(){
    if(masters_degree_input.value.toLowerCase()==='none'){
      masters_admission_year_input.value="";
      masters_admission_year_input.disabled=true;
      masters_degree_college_name_input.value="";
      masters_degree_college_name_input.disabled=true;

    }
    else{
      masters_admission_year_input.disabled=false;
      masters_degree_college_name_input.disabled=false;
    }
  }
  //...........................................................PAGE 3...............................................................
  //Page 3 validation
  function validateFieldsOnPage3(){
    
  }
  //...........................................................PAGE 4...............................................................
  //Page 4 validation
  function validateFieldsOnPage4(){
    
  }
  //...........................................................PAGE 5...............................................................
//Page 5 validation
function validateFieldsOnPage5(){
    
}
  

 
  //----------------------------------------------------------------------------------------------------------------------------------------

  //VALIDATION WHEN THE USER IS TYPING

//...........................................................PAGE 1...............................................................

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

  //...........................................................PAGE 2...............................................................

  //5. Validate the bachelor admission year
  bachelors_admission_year_input.addEventListener("input",function(){

    if(bachelors_admission_year_input.value===''){
      bachelors_admission_year_input.classList.add("is-invalid");
      is_valid_bachelors_year=false;
    }
    else if(!isValidYear(bachelors_admission_year_input.value)){
      bachelors_admission_year_input.classList.add("is-invalid");
      is_valid_bachelors_year=false;
    }
    else {
      bachelors_admission_year_input.classList.remove("is-invalid");
      is_valid_bachelors_year=true;
    }
  });

   //6. Validate the masters admission year
   masters_admission_year_input.addEventListener("input",function(){
    
    if(masters_degree.toLowerCase()!=="none"){
    if(masters_admission_year_input.value===''){
      masters_admission_year_input.classList.add("is-invalid");
      is_valid_masters_year=false;
    }
    else if(!isValidYear(masters_admission_year_input.value)){
      masters_admission_year_input.classList.add("is-invalid");
      is_valid_masters_year=false;
    }
    else {
      masters_admission_year_input.classList.remove("is-invalid");
      is_valid_masters_year=true;
    }
  }
  else{
    //the masters degree is none
    masters_admission_year="";
    masters_admission_year_input.classList.remove("is-invalid");
  }

  });


//...........................................................PAGE 3...............................................................
//...........................................................PAGE 4...............................................................
//...........................................................PAGE 5...............................................................
//...........................................................PAGE 6...............................................................

    
    
    


