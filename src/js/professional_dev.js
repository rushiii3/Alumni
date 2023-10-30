
$(document).ready(function() {

/*----------------------
Bottom Navigation Logic

-------------------------*/
//alert("Hello");
$("#professional_dev_page").show();
  $("#post_jobs_page").hide();
$("#jobs_posted_by_you_page").hide();


//show professional dev page
$("#btn_Professional_Dev").on("click", function () {
  
  $("#section_name").text("All Jobs");
  $("#professional_dev_page").show();
  $("#post_jobs_page").hide();
  $("#jobs_posted_by_you_page").hide();
  $("#search_bar_div").show();
});
// show post jobs page
$("#btn_Post_Jobs").on("click", function () {
 
  $("#section_name").text("Post a job for other Alumni");
  $("#professional_dev_page").hide();
  $("#post_jobs_page").show();
$("#jobs_posted_by_you_page").hide();
$("#search_bar_div").hide();
});

// show jobs_posted_by_you page
$("#btn_Jobs_Posted_By_You").on("click", function () {
 
  $("#section_name").text("Jobs you have posted so far");
  $("#professional_dev_page").hide();
  $("#post_jobs_page").hide();
$("#jobs_posted_by_you_page").show();
$("#search_bar_div").show();
});

//by default select scholarship awards
$("#btn_Professional_Dev").click();

/*---------------------------
Display hiring status in green
----------------------------*/

    var jobStatusElement = document.querySelectorAll("#job_status");

    for(i=0;i<jobStatusElement.length;i++){
    var jobStatusValue = jobStatusElement[i].innerText;

    if (jobStatusValue === 'hiring') {
      jobStatusValue = "currently " + jobStatusValue;
      jobStatusElement[i].innerText=jobStatusValue;
      jobStatusElement[i].style.color="#99cc00"; //green

    } else {
        jobStatusElement[i].style.color="cc0000"; //red

    }

}

/*---------------------------
Hide the div_no_jobs div initially
----------------------------*/

$("#div_no_jobs").hide();
displayMessageWhenJobsAreNotPresent();

/*---------------------------
Hide the div_no_YOUR_jobs div initially
----------------------------*/

$("#div_no_your_jobs").hide();
  displayMessageWhenYourJobsAreNotPresent();

  /*---------------------------
Disable search bar on post jobs page
----------------------------*/

  });

  

 //----------------------------------------------------------------FORM VALIDATION----------------------------------------------------------
//INITIALIZE ALL THE FIELDS --> GLOBAL VARIABLES

var pj_company_input=document.getElementById("pj_company_input");
var pj_post_input=document.getElementById("pj_post_input");
var pj_yrs_of_exp_input=document.getElementById("pj_yrs_of_exp_input");
var pj_qualification_input=document.getElementById("pj_qualification_input");
var pj_job_desc_input=document.getElementById("pj_job_desc_input");
var pj_email_input=document.getElementById("pj_email_input");
var pj_phone_input=document.getElementById("pj_phone_input");

var pj_company_feedback=document.getElementById("pj_company_feedback");
var pj_post_feedback=document.getElementById("pj_post_feedback");
var pj_yrs_of_exp_feedback=document.getElementById("pj_yrs_of_exp_feedback");
var pj_qualification_feedback=document.getElementById("pj_qualification_feedback");
var pj_job_desc_feedback=document.getElementById("pj_job_desc_feedback");
var pj_email_feedback=document.getElementById("pj_email_feedback");
var pj_phone_feedback=document.getElementById("pj_phone_feedback");

var pj_company="";
var pj_post="";
var pj_yrs_of_exp="";
var pj_qualification="";
var pj_job_desc="";
var pj_email="";
var pj_phone="";

let errorInputFieldsArray = new Array();

var post_job_form = document.getElementById("postjobsform");

//----------------------------------------------------EVENT LISTENERS----------------------------------------------

 //---------WHEN USER IS TYPING------

//1.the email is valid
pj_email_input.addEventListener("input", function () {
  var entered_email = pj_email_input.value.trim();
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!emailRegex.test(entered_email)) {
    pj_email_feedback.innerText = "Please enter a valid email";

    pj_email_input.classList.add("is-invalid");
  } else {
    pj_email = entered_email;
    pj_email_input.classList.remove("is-invalid");
  }
});

//2. the phone is valid
pj_phone_input.addEventListener("input", function () {
  var entered_phone_number = pj_phone_input.value.trim();
  var phone_number_regex = /^\d{10}$/;

  if (!phone_number_regex.test(entered_phone_number)) {
    pj_phone_feedback.innerText = "Please enter a valid contact number";
    pj_phone_input.classList.add("is-invalid");
  } else {
    pj_phone_input.classList.remove("is-invalid");
    pj_phone= entered_phone_number;
  }
});


//-------------------------------------------------WHEN UPDATE STATUS BUTTON IS CLICKED---------------------------------------------------------------------------------

//DISPLAY THE MODAL AND UPDATE THE STATUS ACCORDINGLY
$("#pj_btn_update_status").click(function(){
  $("#update_status_modal").modal("show");

  $("#modal_cross_button").click(function(){
    $("#update_status_modal").modal("hide");
  });

  $("#btn_update_status_modal_yes").click(function(){
   updateStatusOfYourJobsInDatabase();
  })
  
  $("#btn_delete_modal_no").click(function(){
    $("#btn_update_status_modal_no").modal("hide");
  })

})


//SEARCH JOBS

$(".btn-search").on("mouseover", function() {
  $('#PD_title').hide();
}).on("mouseenter", function() {
  $('#PD_title').hide();
}).on("mouseout", function() {
  $('#PD_title').show();
});
$(".input-search").on("mouseover", function() {
  $('#PD_title').hide();
}).on("mouseenter", function() {
  $('#PD_title').hide();
}).on("mouseout", function() {
  $('#PD_title').show();
});

$('.input-search').on('input', function() {
  var x = document.querySelectorAll("#job_title");
  var card = document.querySelectorAll(".ToidentifyCard");
  var input = $('.input-search').val();
  var filter = input.toUpperCase();
  //console.log(filter);
  for (var i = 0; i < x.length; i++) {
    var txtValue = x[i].innerText.toUpperCase();
    if (txtValue.indexOf(filter) > -1) {
      card[i].style.display = "";
    } else {
      card[i].style.display = "none";
    }
  }
});

//----------------------------------------------------------FUNCTIONS---------------------------------------

//1.function that checks whether the input fields which were empty earlier are not empty anymore
function displayErrorinInputField(inputfield) {
  inputfield.classList.add("is-invalid");
  errorInputFieldsArray.push(inputfield);
  removeErrorWhenInputFieldIsNotEmpty();
}

//2.function to remove the error when user types into the inputfield which was initially empty
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

//3.VALIDATE THE FORM

function validatePostJobForm(){

  pj_company=pj_company_input.value.trim();
  pj_post=pj_post_input.value.trim();
  pj_yrs_of_exp=pj_yrs_of_exp_input.value.trim();
  pj_job_desc=pj_job_desc_input.value.trim();
  pj_qualification=pj_qualification_input.value.trim();
  pj_email=pj_email_input.value.trim();
  pj_phone=pj_phone_input.value.trim();


  if(pj_company == ""){
    pj_company_feedback.innerText="Please enter a company name";
    displayErrorinInputField(pj_company_input);
    pj_company_input.focus();
    return false;
  }
  else if(pj_post == ""){
    pj_post_feedback.innerText="Please enter the designation/position.";
    displayErrorinInputField(pj_post_input);
    pj_post_input.focus();
    return false;
  }
  else if(pj_qualification == ""){
    pj_qualification_feedback.innerText="Please enter the required qualification.";
    displayErrorinInputField(pj_qualification_input);
    pj_qualification_input.focus();
    return false;
  }
  else if(pj_job_desc ==""){
    pj_job_desc_feedback.innerText="Please enter the job description.";
    displayErrorinInputField(pj_job_desc_input);
    pj_job_desc_input.focus();
    return false;
  }
  else if(pj_yrs_of_exp == ""){
    pj_yrs_of_exp_feedback.innerText="Please enter valid number of experience.";
    displayErrorinInputField(pj_yrs_of_exp_input);
    pj_yrs_of_exp_input.focus();
    return false;
  }
  else if(parseInt(pj_yrs_of_exp) > 50){
    pj_yrs_of_exp_feedback.innerText="Please enter valid number of experience.";
    displayErrorinInputField(pj_yrs_of_exp_input);
    pj_yrs_of_exp_input.focus();
    return false;
  }
  else if(pj_email == ""){
    pj_email_input.dispatchEvent(new Event("input"));
    pj_email_input.focus();
    return false;
  }
  else if(pj_phone == ""){
    pj_phone_input.dispatchEvent(new Event("input"));
    pj_phone_input.focus();
    return false;
  }
  else{
    pj_company_input.classList.remove("is-invalid");
    pj_post_input.classList.remove("is-invalid");
    pj_qualification_input.classList.remove("is-invalid");
    pj_job_desc_input.classList.remove("is-invalid");
    pj_yrs_of_exp_input.classList.remove("is-invalid");
    pj_email_input.classList.remove("is-invalid");
    pj_phone_input.classList.remove("is-invalid");
    alert("form is valid");
pj_phone = "+91"+pj_phone;
    return true;
  }

}

//4.Store the form
function insertPostJobDataToDatabase(username){
 
  var formdata={
    "pj_username":username,
    "pj_company_name":pj_company,
    "pj_post":pj_post,
    "pj_description":pj_job_desc,
    "pj_qualification":pj_qualification,
    "pj_years_of_experience":pj_yrs_of_exp,
    "pj_contact_email":pj_email,
    "pj_contact_number":pj_phone,
    "pj_verification_status":"not verified",
    "pj_status":"hiring"

  }

  $.ajax({
    url: "https://alumniandroidapp.000webhostapp.com/post_job_professional_dev_fragment.php",
    type: "POST",
    data: formdata,
    dataType: "text",
    success: function (response) {
      console.log(response);
      if (response.includes("Form submitted successfully")) {
        alert("Form submitted successfully");

        //clear the form
        post_job_form.reset();

        //reload the jobs posted by you section
        $("#section_name").text("Jobs you have posted so far");
        $("#professional_dev_page").hide();
        $("#post_jobs_page").hide();
      $("#jobs_posted_by_you_page").show();

      } else {
        alert("Sorry! Couldnt post the job.Please try again later");
      }
    },
    error: function (xhr, status, error) {
      console.error("Request failed. Status: " + status + ". Error: " + error);
      alert("Oops!Couldnt post your job.Please try again later.");
    }
  });

  }

/*---------------------------
5. Display theres nothing here when no jobs are present
----------------------------*/
function displayMessageWhenJobsAreNotPresent(){
  
var all_cards=document.querySelectorAll("#card");

if(all_cards.length < 1 ){
  $("#div_no_jobs").show();
}
else{
  $("#div_no_jobs").hide();
}
}

/*-------------------------------------------
6.Display theres nothing here when no YOUR jobs are present
----------------------------*/
function displayMessageWhenYourJobsAreNotPresent(){
  
  var all_cards=document.querySelectorAll("#your_job_card");
  
  if(all_cards.length < 1 ){
    $("#div_no_your_jobs").show();
   
  }
  else{
    $("#div_no_your_jobs").hide();
  }
  }

  //7.Update the status of the job
  function updateStatusOfYourJobsInDatabase(){
    var pj_id = document.getElementById("para_your_jobs_id").textContent.trim();
    var pj_status = document.getElementById("job_status").textContent.trim();

    var final_status="";
    if(pj_status.toLowerCase() =="hiring"){
      final_status="filled";
    }
    else{
      final_status=pj_status;
    }

    $.ajax({
      url: "https://alumniandroidapp.000webhostapp.com/update_status_professional_dev_fragment.php",
      type: "POST",
      data: {"pj_id":pj_id,"pj_status":final_status},
      dataType: "text",
      success: function (response) {
        console.log(response);
        if (response.includes("Updated successfully")) {
          alert("Status Updated Successfully");
  
  
        } else {
          alert("Sorry! Couldnt update the hiring status.Please try again later");
        }
      },
      error: function (xhr, status, error) {
        console.error("Request failed. Status: " + status + ". Error: " + error);
        alert("Oops! Couldnt update the hiring status.Please try again later.");
      }
    });
  
    
  }

