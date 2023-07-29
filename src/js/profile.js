//let errorInputFieldsArray = new Array();
let is_email_verified = false;
let is_phone_number_valid = false;
let is_valid_linkedin_address = false;
let firstname_input = document.getElementById("first_name");
let middlename_input = document.getElementById("middle_name");
let lastname_input = document.getElementById("last_name");
let dob_input = document.getElementById("dob");
let linkedin_address_input = document.getElementById("linkedin_address");
let phone_number_input = document.getElementById("phone_number");
let email_input = document.getElementById("email");
let verify_email_button = document.getElementById("emailbutton-addon2");
let verify_otp_div = document.getElementById("verify_email_otp_div");
let verify_otp_input = document.getElementById("verify_email_otp");
// page 1
let first_name = "",
  middle_name = "",
  last_name = "",
  dob = "",
  linkedin_address = "",
  phone_number = "",
  email = "";


//PAGE 2.
let bachelors_degree = "",
  bachelors_admission_year = "",
  bachelors_degree_college_name = "";
let masters_degree = "",
  masters_admission_year = "",
  masters_degree_college_name = "";

let college_name = "KET's V.G. Vaze College of Arts,Science and Commerce";

let is_valid_bachelors_year = false,
  is_valid_masters_admission_year = false;

let bachelors_degree_input = document.getElementById("bachelors_degree_list");
let bachelors_admission_year_input = document.getElementById(
  "bachelors_admission_year"
);
let bachelors_degree_college_name_input = document.getElementById(
  "bachelor_college_name"
);

let masters_degree_input = document.getElementById("masters_degree_list");
let masters_admission_year_input = document.getElementById(
  "masters_admission_year"
);
let masters_degree_college_name_input = document.getElementById(
  "masters_college_name"
);

//PAGE 3
let company = "",
  designation = "";

let company_input = document.getElementById("company_name");
let designation_input = document.getElementById("designation");

//PAGE 4
let password = "",
  confirm_password = "",
  final_password = "";
let are_passwords_verified = false;
let password_input = document.getElementById("password");
let confirm_password_input = document.getElementById("confirm_password");

let feedback_password_input = document.getElementById(
  "feedback_password_input"
);
let feedback_confirm_password_input = document.getElementById(
  "feedback_confirm_password_input"
);

let submit_button = document.getElementById("SubmitPassword");


// password symbol enable disable
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
// confirm password symbol enable disable
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

// disable input of persnal deatils page
$("#personal_details_page :input").prop("disabled", true);
// disable input of degree deatils page
$("#degree_details_page :input").prop("disabled", true);
// disable input of professional deatils page
$("#professional_details_page :input").prop("disabled", true);

// hide save button
$('.save').hide();
// hide degree_details_page
$('#degree_details_page').hide();
// hide professional_details_page
$('#professional_details_page').hide();
//  hide change_password_page
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
// when edit is clicked inputs of personal page, degree page and prof details are enabled and edit and delete button is hideen
$('.edit').on('click',function(){
    $("#personal_details_page :input").prop("disabled", false);
    $("#degree_details_page :input").prop("disabled", false);
    $("#professional_details_page :input").prop("disabled", false);
    $('.edit').hide();
    $('.delete').hide();
    $('.save').show();
})

// this selects the degree of bachelor
$bachelor_degree_name = $('#bachelor_degree__name').val();
$("#bachelors_degree_list option").each(function()
{
if($(this).text()==$bachelor_degree_name){
    $(this).prop("selected", true);
}
});
// this selects the degree of master
$master_degree_name = $('#master_degree__name').val();
$("#masters_degree_list option").each(function()
{
if($(this).text()==$master_degree_name){
    $(this).prop("selected", true);
}
});


function displayErrorinInputField(inputfield) {
    inputfield.classList.add("is-invalid");
    errorInputFieldsArray.push(inputfield);
    removeErrorWhenInputFieldIsNotEmpty();
  }

  function removeErrorWhenInputFieldIsNotEmpty() {
    errorInputFieldsArray.forEach((element) => {
      element.addEventListener("input", function () {
        if (element.value.trim() !== "") {
          element.classList.remove("is-invalid");
        } else {
          element.classList.add("is-invalid");
        }
      });
    });
  }

// validate linkedin
  linkedin_address_input.addEventListener("input", function () {
    var entered_linked_address = linkedin_address_input.value.trim();
    var linkedin_regex =
      /^(https?:\/\/)?(www\.)?linkedin\.com\/in\/([a-zA-Z0-9_-]+)$/;
  
    if (!linkedin_regex.test(entered_linked_address)) {
      linkedin_address_input.classList.add("is-invalid");
      is_valid_linkedin_address = false;
    } else {
      linkedin_address_input.classList.remove("is-invalid");
      is_valid_linkedin_address = true;
    }
  });

//   validate phone number
phone_number_input.addEventListener("input", function () {
    var entered_phone_number = phone_number_input.value.trim();
    var phone_number_regex = /^\d{10}$/;
  
    if (!phone_number_regex.test(entered_phone_number)) {
      phone_number_input.classList.add("is-invalid");
      is_phone_number_valid = false;
    } else {
      phone_number_input.classList.remove("is-invalid");
      is_phone_number_valid = true;
    }
  });


  //9.check whether the admission year is a valid year
function isValidYear(entered_year) {
    var currentyear = new Date().getFullYear();
    var validYearRegex = /^\d{4}$/;
  
    if (
      entered_year < 1950 ||
      entered_year > currentyear ||
      !validYearRegex.test(entered_year)
    ) {
      return false;
    } else {
      bachelors_degree = bachelors_degree_input.value;
      bachelors_admission_year = bachelors_admission_year_input.value;
      bachelors_degree_college_name = bachelors_degree_college_name_input.value;
  
      if (masters_degree_input.value.toLowerCase() === "none") {
        masters_admission_year = "";
        masters_degree_college_name = "";
      }
  
      return true;
    }
  }
  function disableEnableMastersFields() {
    if (masters_degree_input.value.toLowerCase() === "none") {
      masters_admission_year_input.value = "";
      masters_admission_year_input.disabled = true;
      masters_degree_college_name_input.value = "";
      masters_degree_college_name_input.disabled = true;
    } else {
      masters_admission_year_input.disabled = false;
      masters_degree_college_name_input.disabled = false;
    }
  }


  document.addEventListener("DOMContentLoaded", function () {
    //set the max date in the calendar
    setMaxDateofCalendar();
  
    //when none is selected disable the masters_college and masters_admission_year fields
    if (masters_degree_input.value.toLowerCase() === "none") {
      masters_admission_year_input.disabled = true;
      masters_degree_college_name_input.disabled = true;
    }
  
    //when the user submits the form
    registration_form.addEventListener("submit", function (e) {
      e.preventDefault();
      registerUser();
    });
  
    //display the success modal when registration is successful
  });
  
  //3.Enabling or disabling the masters_college and masters_admission_year fields based on the option selected from dropdown
  masters_degree_input.addEventListener("change", disableEnableMastersFields);

$('.save').on('click',function(){
    if(FirstPage()){
        if(SecondPage()){
            $('.edit').show();
            $('.delete').show();
            $('.save').hide();
            $("#personal_details_page :input").prop("disabled", true);
        $("#degree_details_page :input").prop("disabled", true);
        $("#professional_details_page :input").prop("disabled", true);
        }  
    }
    
});




function FirstPage(){
    if (firstname_input.value === "") {
        //firstname_input.classList.add("is-invalid");
        displayErrorinInputField(firstname_input);
        firstname_input.focus();
        return false;
      } else if (lastname_input.value === "") {
        //lastname_input.classList.add("is-invalid");
        displayErrorinInputField(lastname_input);
        lastname_input.focus();
        return false;
      } else if (dob_input.value === "") {
        //dob_input.classList.add("is-invalid");
        displayErrorinInputField(dob_input);
        dob_input.focus();
        return false;
      } else if (phone_number_input.value === "") {
        phone_number_input.focus();
        phone_number_input.dispatchEvent(new Event("input")); //trigger the phone number verification
        return false;
      } else if (email_input.value === "") {
        email_input.focus();
        email_input.dispatchEvent(new Event("input")); //trigger the email verification
        return false;
      } else if (
        (linkedin_address_input.value !== "") &
        !is_valid_linkedin_address
      ) {
        linkedin_address_input.focus();
        linkedin_address_input.dispatchEvent(new Event("input")); //trigger thelinkedin verification
        return false;
      } else if (!is_phone_number_valid) {
        phone_number_input.focus();
        phone_number_input.dispatchEvent(new Event("input")); //trigger the phone number verification
        return false;
      }  else {
        //after successful verification assign the values to the variables
        if (middlename_input.value !== "") {
          middle_name = middlename_input.value;
        }
    
        if (!linkedin_address_input.value !== "") {
          linkedin_address = linkedin_address_input.value;
        }
    
        first_name = firstname_input.value;
        last_name = lastname_input.value;
        dob = dob_input.value;
        phone_number = phone_number_input.value;
        email = email_input.value;
        
        return true;
        
      }
}

function SecondPage(){
    //get the data from the input fields
  bachelors_degree = bachelors_degree_input.value;
  bachelors_degree_college_name = bachelors_degree_college_name_input.value;
  bachelors_admission_year = bachelors_admission_year_input.value;
  masters_degree = masters_degree_input.value;
  masters_degree_college_name = masters_degree_college_name_input.value;
  masters_admission_year = masters_admission_year_input.value;

  let bachelor_college_feedback_div = document.getElementById(
    "feedback_bachelor_degree_college_name"
  );
  let master_college_feedback_div = document.getElementById(
    "feedback_master_degree_college_name"
  );

  let bachelor_admission_year_feedback_div = document.getElementById(
    "feedback_bachelor_degree_admission_year"
  );
  let master_admission_year_feedback_div = document.getElementById(
    "feedback_master_degree_admission_year"
  );

  //check whether the student is of vaze college
  //anyone one college either masters or bachelors should be Vaze

  //1.student has only done bachelors which is not from Vaze College
  if (
    (bachelors_degree_college_name !== "") &
    (masters_degree_college_name === "") &
    (bachelors_degree_college_name !== college_name)
  ) {
    console.log("yes");
    //set the message
    bachelor_college_feedback_div.innerText =
      "You must be a student of Vaze college";

    bachelors_degree_college_name_input.classList.add("is-invalid");
    bachelors_degree_college_name_input.focus();
    return false;
  }

  //2. if the student has done masters and bachelors either of which are not from Vaze College
  else if (
    (bachelors_degree_college_name !== "") &
    (masters_degree_college_name !== "") &
    (bachelors_degree_college_name !== college_name) &
    (masters_degree_college_name !== college_name)
  ) {
    bachelor_college_feedback_div.innerText =
      "You must be a student of Vaze college";
    master_college_feedback_div.innerText =
      "You must be a student of Vaze college";

    bachelors_degree_college_name_input.classList.add("is-invalid");
    masters_degree_college_name_input.classList.add("is-invalid");

    bachelors_degree_college_name_input.focus();
    masters_degree_college_name_input.focus();
    return false;
  }

  //3. the bachelors college is empty
  else if (bachelors_degree_college_name === "") {
    displayErrorinInputField(bachelors_degree_college_name_input);
    bachelors_degree_college_name_input.focus();
    return false;
  }

  //4.else the student is of vaze college
  else {
    //remove any errors set
    bachelors_degree_college_name_input.classList.remove("is-invalid");
    masters_degree_college_name_input.classList.remove("is-invalid");
  }

  //validation of graduation year
  //masters should always be greater than the bachelors
  if ((bachelors_admission_year !== "") & (masters_admission_year !== "")) {
    if (bachelors_admission_year >= masters_admission_year) {
      bachelor_admission_year_feedback_div.innerText =
        "Bachelors admission year cant be greater than Masters admission year";
      master_admission_year_feedback_div.innerText =
        "Bachelors admission year cant be greater than Masters admission year";

      bachelors_admission_year_input.classList.add("is-invalid");
      bachelors_admission_year_input.focus();
      return false;
    } else {
      //if the masters and bachelors degree have a difference of greater than 80 years then the entries are fake
      if (masters_admission_year - bachelors_admission_year > 80) {
        bachelor_admission_year_feedback_div.innerText =
          "Please enter valid details";
        master_admission_year_feedback_div.innerText =
          "Please enter valid details";
        bachelors_admission_year_input.classList.add("is-invalid");
        masters_admission_year_input.classList.add("is-invalid");
        bachelors_admission_year_input.focus();
        masters_admission_year_input.focus();
        return false;
      } else {
        bachelors_admission_year_input.classList.remove("is-invalid");
        masters_admission_year_input.classList.remove("is-invalid");
      }
    }
  } else {
    if (bachelors_admission_year === "") {
      //the bachelors_admission_year is empty
      bachelor_admission_year_feedback_div.innerText =
        "Please enter the admission year";
      bachelors_admission_year_input.dispatchEvent(new Event("input")); //trigger the validation of admission year
    }
  }

  //Validation , if the student is from vaze college they should enter the correct graduation in accordance with or college, eg:student cannot enter a value of 1984 since our college began in 1983 so minimum three years for graduation is 1986
  //For Bachelors
  //if the student is from vaze college

  if (bachelors_degree_college_name === college_name) {
    if (bachelors_admission_year !== "") {
      //bachelor admission year is not empty
      if (bachelors_admission_year < 1985) {
        bachelor_admission_year_feedback_div.innerText =
          "Please enter a valid admission year";
        bachelors_admission_year_input.classList.add("is-invalid");
        return false;
      } else {
        if (isValidYear(bachelors_admission_year)) {
          bachelors_admission_year_input.classList.remove("is-invalid");
        }
      }
    } else {
      //bachelor admission year is empty
      bachelors_admission_year_input.dispatchEvent(new Event("input")); //trigger the validation of admission year
      return false;
    }
  } else {
    //student is from another college
    bachelors_admission_year_input.classList.remove("is-invalid");
  }

  //Validation , if the student is from vaze college they should enter the correct admission year in accordance with or college, eg:student cannot enter a value of 1984 since our college began in 1983 so minimum three years for graduation is 1986
  //For Masters
  //if the student is from vaze college

  if (masters_degree_college_name === college_name) {
    if (masters_admission_year !== "") {
      //bachelor admission year is not empty
      if (masters_admission_year < 1985) {
        master_admission_year_feedback_div.innerText =
          "Please enter a valid admission year";
        masters_admission_year_input.classList.add("is-invalid");
        return false;
      } else {
        if (isValidYear(masters_admission_year)) {
          masters_admission_year_input.classList.remove("is-invalid");
        }
      }
    } else {
      //bachelor admission year is empty
      masters_admission_year_input.dispatchEvent(new Event("input")); //trigger the validation of admission year
      return false;
    }
  } else {
    //student is from another college
    masters_admission_year_input.classList.remove("is-invalid");
  }

  if (bachelors_degree_input.value === "Select a bachelors degree") {
    displayErrorinInputField(bachelors_degree_input);
    bachelors_degree_input.focus();
    return false;
  } else if (bachelors_degree_college_name_input.value === "") {
    //displayErrorinInputField(bachelors_degree_college_name_input);
    bachelors_admission_year_input.dispatchEvent(new Event("input"));
    bachelors_degree_college_name_input.focus();
    return false;
  } else if (
    bachelors_degree_college_name_input.classList.contains("is-invalid")
  ) {
    bachelors_degree_college_name_input.focus();
    return false;
  } else if (bachelors_admission_year_input.classList.contains("is-invalid")) {
    bachelors_admission_year_input.dispatchEvent(new Event("input"));
    bachelors_admission_year_input.focus();
    return false;
  }

  //masters
  else if (masters_degree === "") {
    masters_degree_input.classList.add(
      "please select a masters degree or select none"
    );
  } else if (
    (masters_degree.toLowerCase() !== "none") &
    masters_admission_year_input.classList.contains("is-invalid")
  ) {
    //error in admission year if some master degree is selected
    masters_admission_year_input.dispatchEvent(new Event("input"));
    masters_admission_year_input.focus();
    return false;
  } else if (
    (masters_degree.toLowerCase() !== "none") &
    (masters_admission_year === "")
  ) {
    //admission year is empty if some master degree is selected
    masters_admission_year_input.dispatchEvent(new Event("input"));
    masters_admission_year_input.focus();
  } else if (
    (masters_degree.toLowerCase() !== "none") &
    masters_degree_college_name_input.classList.contains("is-invalid")
  ) {
    masters_admission_year_input.focus();
    return false;
  } else if (
    (masters_degree.toLowerCase() !== "none") &
    (masters_degree_college_name === "")
  ) {
    displayErrorinInputField(masters_degree_college_name_input);
    masters_degree_college_name_input.focus();
    return false;
  } else if (masters_admission_year_input.classList.contains("is-invalid")) {
    masters_admission_year_input.focus();
    return false;
  } else if (
    masters_degree_college_name_input.classList.contains("is-invalid")
  ) {
    masters_degree_college_name_input.focus();
    return false;
  } else {

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
    return true;
  }
}

//5. Validate the bachelor admission year
bachelors_admission_year_input.addEventListener("input", function () {
    if (bachelors_admission_year_input.value === "") {
      bachelors_admission_year_input.classList.add("is-invalid");
      is_valid_bachelors_year = false;
    } else if (!isValidYear(bachelors_admission_year_input.value)) {
      bachelors_admission_year_input.classList.add("is-invalid");
      is_valid_bachelors_year = false;
    } else {
      bachelors_admission_year_input.classList.remove("is-invalid");
      is_valid_bachelors_year = true;
    }
  });
  
  //6. Validate the masters admission year
  masters_admission_year_input.addEventListener("input", function () {
    if (masters_degree.toLowerCase() !== "none") {
      if (masters_admission_year_input.value === "") {
        masters_admission_year_input.classList.add("is-invalid");
        is_valid_masters_year = false;
      } else if (!isValidYear(masters_admission_year_input.value)) {
        masters_admission_year_input.classList.add("is-invalid");
        is_valid_masters_year = false;
      } else {
        masters_admission_year_input.classList.remove("is-invalid");
        is_valid_masters_year = true;
      }
    } else {
      //the masters degree is none
      masters_admission_year = "";
      masters_admission_year_input.classList.remove("is-invalid");
    }
  });

// password 
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



$('#SubmitPassword').on('click',function(e){
  e.preventDefault();
  password = password_input.value;
  confirm_password = confirm_password_input.value;
  if (password === "") {
    password_input.dispatchEvent(new Event("input")); //trigger the validation of password
  } else if (confirm_password === "") {
    confirm_password_input.dispatchEvent(new Event("input")); ///trigger the validation of confirm password
  } else if (password === confirm_password) {
    $.ajax({
      type: 'POST',
      url: 'https://alumniandroidapp.000webhostapp.com/alumni_update_password_profile_fragment.php',
      data: {username:email_input.value,password:password_input.value},
      success: function(data){
          console.log(data);
          
      },
      error: function(response) {
          console.log(response.status);
      },
  })
  }

})



  
  