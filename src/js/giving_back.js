//GLOBAL Variables

var scholarship_award_form=document.getElementById("scholarship_award_form");
var internship_job_form=document.getElementById("internship_job_form");

//var logged_in_username = $("#alumni_name").text();
let errorInputFieldsArray = new Array();

var all_scholarships_awards_posted;
var all_internship_jobs_posted;
var all_scholarships_posted_by_user=[];
var all_internship_jobs_posted_by_user=[];

//Scholarship Awards Page
var sa_name_input = document.getElementById("sa_name"); //$("#sa_name");
var sa_department_input = document.getElementById("sa_department_list"); //$("#sa_department_list");
var sa_class_input = document.getElementById("sa_class_list"); //$("#sa_class_list");
var sa_amt_per_student_input = document.getElementById("amt_per_student"); //$("#amt_per_student");
var sa_no_students_to_be_awarded_input = document.getElementById(
  "no_of_students_to_be_awarded"
); //$("#no_of_students_to_be_awarded");
var sa_total_amt_input = document.getElementById("total_amount"); //$("#total_amount");
var feedback_total_amt = document.getElementById("feedback_total_amt"); //$("#feedback_total_amt");
var sa_submit_btn = document.getElementById("sa_submit"); //$("#sa_submit");

var sa_name = "",
  sa_department = "",
  sa_class = "",
  sa_amt_per_student = "",
  sa_no_students_to_be_awarded = "",
  sa_total_amt = "";

//Internship Job Page

var sj_company_input = document.getElementById("sj_company");
var sj_post_input = document.getElementById("sj_post");
var sj_qualification_input = document.getElementById("sj_qualification");
var sj_description_input = document.getElementById("sj_description");
var sj_no_of_vacancies_input = document.getElementById("sj_no_of_vacancies");
var sj_email_input = document.getElementById("sj_email");
var sj_contact_no_input = document.getElementById("sj_contact_no");
var sj_job_or_internship_input = document.getElementById(
  "sj_job_or_internship"
);

var feedback_sj_email = document.getElementById("feedback_sj_email");
var feedback_sj_contact_no = document.getElementById("feedback_sj_contact_no");
var feedback_sj_no_of_vacancies = document.getElementById("feedback_sj_no_of_vacancies");

var sj_company = "",
  sj_post = "",
  sj_qualification = "",
  sj_description = "",
  sj_no_of_vacancies = "",
  sj_email = "",
  sj_contact_no = "",
  sj_job_or_internship = "";

//Accolades by You Page

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------

$(document).ready(function () {
  /*-----------------------------------------
bottom navigation logic
    ---------------------------------------------------*/

  $("#Scholarship_awards_page").hide();
  $("#Internship_jobs_page").hide();
  $("#Accolades_you_page").hide();
  //show scholarship page
  $(".Scholarship_awards").on("click", function () {
    $("#section_name").text("Scholarship & awards");
    $("#Scholarship_awards_page").show();
    $("#Internship_jobs_page").hide();
    $("#Accolades_you_page").hide();
  });
  // show Internship page
  $(".Internship_jobs").on("click", function () {
    $("#section_name").text("Internship & jobs");
    $("#Internship_jobs_page").show();
    $("#Scholarship_awards_page").hide();
    $("#Accolades_you_page").hide();
  });

  $(".Accolades_you").on("click", function () {
    $("#section_name").text("Accolades by you");
    $("#Accolades_you_page").show();
    $("#Internship_jobs_page").hide();
    $("#Scholarship_awards_page").hide();
  });

  //by default select scholarship awards
  $(".Scholarship_awards").click();
});

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
//Functions to be executed

//fetchScholarshipAwardsByUser();

//------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------
//OTHER LISTENERS
/*
//1.When clicked on scholarship award submit button
sa_submit_btn.addEventListener("click", function (e) {
  e.preventDefault();
  //alert("clicked");
  if (validateScholarshipAwardForm()) {

    console.log("successfully validated");
    insertScholarshipAwardsByUser(logged_in_username);
  } else {
    console.log("not validated");
  }
});

*/

//------------------------------------------------------------------------------------------------------------------

//VALIDATION WHEN USER IS TYPING

//....................................................SCHOLARSHIP AWARDS PAGE....................................................

//1. add and remove third year depending on the course selected
sa_department_input.addEventListener("change", function () {
  var sa_dept_selected = sa_department_input.value;
  switch (sa_dept_selected) {
    case "BSC(IT)":
      sa_department = "BSC(IT)";
      addThirdYearToClasslist();
      break;
    case "BSC(BT)":
      sa_department = "BSC(BT)";
      addThirdYearToClasslist();
      break;
    case "BSC":
      sa_department = "BSC";
      addThirdYearToClasslist();
      break;
    case "BCOM":
      sa_department = "BCOM";
      addThirdYearToClasslist();
      break;
    case "BA":
      sa_department = "BA";
      addThirdYearToClasslist();
      break;
    case "BMS":
      sa_department = "BMS";
      addThirdYearToClasslist();
      break;
    case "BBI":
      sa_department = "BBI";
      addThirdYearToClasslist();
      break;
    case "BCOM-BI":
      sa_department = "BCOM-BI";
      addThirdYearToClasslist();
      break;
    case "BCOM-AF":
      sa_department = "BCOM-AF";
      addThirdYearToClasslist();
      break;
    case "BVoc":
      sa_department = "BVoc";
      addThirdYearToClasslist();
      break;
    case "BAMMC":
      sa_department = "BAMMC";
      addThirdYearToClasslist();
      break;
    //Masters start here
    case "MSC(IT)":
      sa_department = "MSC(IT)";
      removeThirdYearToClasslist();
      break;
    case "MSC(BT)":
      sa_department = "MSC(BT)";
      removeThirdYearToClasslist();
      break;
    case "MSC":
      sa_department = "MSC";
      removeThirdYearToClasslist();
      break;
    case "MCOM":
      sa_department = "MCOM";
      removeThirdYearToClasslist();
      break;
    case "PGDPCM":
      sa_department = "PGDPCM";
      removeThirdYearToClasslist();
      break;
    case "Ph.D. Arts":
      //TODO:ask teacher for the list of degrees in the college and their durations and for Phd as well
      sa_department = "Ph.D. Arts";
      addThirdYearToClasslist();
      break;
    case "Ph.D. Science":
      sa_department = "Ph.D. Science";
      addThirdYearToClasslist();
      break;
    default:
      sa_department = "Other";
      break;
  }
});

//2.Total amount should be a multiplication of the number of students and amt per student

sa_total_amt_input.addEventListener("input", function () {
  var no_of_students = parseInt(
    sa_no_students_to_be_awarded_input.value.trim()
  );
  var amt_per_student = parseInt(sa_amt_per_student_input.value.trim());
  var entered_total_amt = parseInt(sa_total_amt_input.value.trim());

  if (entered_total_amt != no_of_students * amt_per_student) {
    
    /*console.log(
      "total amt:" +
        entered_total_amt +
        " multiplication: " +
        no_of_students +
        amt_per_student
    );
    */
    feedback_total_amt.innerText = "Please check the entered values";
    sa_total_amt_input.classList.add("is-invalid");
  } else {
    sa_total_amt_input.classList.remove("is-invalid");
    sa_total_amt = entered_total_amt.toString();
  }
});

//....................................................INTERNSHIPS JOB PAGE....................................................

//1.the email is valid
sj_email_input.addEventListener("input", function () {
  var entered_email = sj_email_input.value.trim();
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!emailRegex.test(entered_email)) {
    feedback_sj_email.innerText = "Please enter a valid email";

    sj_email_input.classList.add("is-invalid");
  } else {
    sj_email = entered_email;
    sj_email_input.classList.remove("is-invalid");
  }
});

//2. the phone is valid
sj_contact_no_input.addEventListener("input", function () {
  var entered_phone_number = sj_contact_no_input.value.trim();
  var phone_number_regex = /^\d{10}$/;

  if (!phone_number_regex.test(entered_phone_number)) {
    feedback_sj_contact_no.innerText = "Please enter a valid contact number";
    sj_contact_no_input.classList.add("is-invalid");
  } else {
    sj_contact_no_input.classList.remove("is-invalid");
    sj_contact_no = entered_phone_number;
  }
});

//....................................................ACCOLADES BY YOU PAGE....................................................

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------

/*-----------------
FUNCTIONS
----------------------*/

//....................................................SCHOLARSHIP AWARDS PAGE....................................................

//1.insert the scholarship award by user into the db
function insertScholarshipAwardsByUser(username) {
  var scholarshipAwardFormData = {
    sa_name: sa_name,
    sa_for_department: sa_department,
    sa_class: sa_class,
    sa_amount_per_student: sa_amt_per_student,
    sa_number_of_students_awarded: sa_no_students_to_be_awarded,
    sa_total_amount: sa_total_amt,
    sa_username: username,
  };

  //console.log("username is :" + username);
  $.ajax({
    url: "https://alumniandroidapp.000webhostapp.com/post_scholarship_award_giving_back_fragment.php",
    type: "POST",
    data: scholarshipAwardFormData,
    dataType: "text",
    success: function (response) {
      console.log(response);
      if (response.includes("Inserted scholarship/award successfully")) {
        alert("Scholarship/Award Posted Successfully");

        //reset the form after successful submission

        scholarship_award_form.reset();
        //reload the accolades by you section
        $("#section_name").text("Accolades by you");
    $("#Accolades_you_page").show();
    $("#Internship_jobs_page").hide();
    $("#Scholarship_awards_page").hide();

      } else {
        alert("Sorry! Couldnt post Scholarship/Award.Please try again later");
      }
    },
    error: function (xhr, status, error) {
      console.error("Request failed. Status: " + status + ". Error: " + error);
      alert("Oops!Couldnt post your scholarship/award. Please try again later.");
    }
  });
}

//2.Validate the scholarship award form
function validateScholarshipAwardForm() {
  sa_name = sa_name_input.value.trim();
  sa_department = sa_department_input.value.trim();
  sa_class = sa_class_input.value.trim();
  sa_amt_per_student = sa_amt_per_student_input.value.trim();
  sa_no_students_to_be_awarded =
    sa_no_students_to_be_awarded_input.value.trim();
  // sa_total_amt = sa_total_amt_input.value.trim();

  /*console.log(
    sa_name +
      " " +
      sa_department +
      " " +
      sa_class +
      " " +
      sa_amt_per_student +
      " " +
      sa_no_students_to_be_awarded +
      " " +
      sa_total_amt
  );
  */

  if (sa_name === "") {
    displayErrorinInputField(sa_name_input);
    sa_name_input.focus();
    return false;
  } else if (sa_department.includes("Select a department")) {
    sa_department_input.classList.add("is-invalid");
    sa_department_input.focus();
    return false;
  } else if (sa_class.includes("Select a class")) {
    sa_class_input.classList.add("is-invalid");
    sa_class_input.focus();
    return false;
  } else if (sa_amt_per_student === "") {
    displayErrorinInputField(sa_amt_per_student_input);
    sa_amt_per_student_input.focus();
    return false;
  } else if (sa_no_students_to_be_awarded === "") {
    displayErrorinInputField(sa_no_students_to_be_awarded_input);
    sa_no_students_to_be_awarded_input.focus();
    return false;
  } else if (sa_total_amt === "") {
    sa_total_amt_input.dispatchEvent(new Event("input"));
    sa_total_amt_input.focus();
    return false;
  } else if (sa_no_students_to_be_awarded === ".") {
    sa_no_students_to_be_awarded_input.classList.add("is-invalid");
    return false;
  } else if (sa_amt_per_student === ".") {
    sa_amt_per_student_input.classList.add("is-invalid");
    return false;
  } else if (sa_total_amt_input.classList.contains("is-invalid")) {
    sa_total_amt_input.dispatchEvent(new Event("input"));
    sa_total_amt_input.focus();
    return false;
  } else if (
    parseInt(sa_total_amt) !=
    parseInt(sa_amt_per_student) * parseInt(sa_no_students_to_be_awarded)
  ) {
    sa_total_amt_input.dispatchEvent(new Event("input"));
    sa_total_amt_input.focus();
    return false;
  } else {
    sa_no_students_to_be_awarded_input.classList.remove("is-invalid");
    sa_amt_per_student_input.classList.remove("is-invalid");
    return true;
  }
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
    element.addEventListener("input", function () {
      if (element.value.trim() !== "") {
        element.classList.remove("is-invalid");
      } else {
        element.classList.add("is-invalid");
      }
    });
  });
}

// 5. Add "Third Year" in the class list
function addThirdYearToClasslist() {
  const third_year = document.createElement("option");
  third_year.value = "Third Year";
  third_year.textContent = "Third Year";
  if (sa_class_input.childElementCount < 4) {
    sa_class_input.appendChild(third_year);
  }
}

// 6. Remove "Third Year" from the class list
function removeThirdYearToClasslist() {
  if (sa_class_input.childElementCount == 4) {
    var optionToDelete = sa_class_input.querySelector(
      'option[value="Third Year"]'
    );
    sa_class_input.removeChild(optionToDelete);
  }
}

//....................................................INTERNSHIPS JOB PAGE....................................................

//1.validate the internship job form
function validateInternshipJobForm() {
  sj_company = sj_company_input.value.trim();
  sj_post = sj_post_input.value.trim();
  sj_description = sj_description_input.value.trim();
  sj_qualification = sj_qualification_input.value.trim();
  sj_no_of_vacancies = sj_no_of_vacancies_input.value.trim();
  sj_email = sj_email_input.value.trim();
  sj_contact_no = sj_contact_no_input.value.trim();
  sj_job_or_internship = sj_job_or_internship_input.value.trim();

  if (sj_company === "") {
    displayErrorinInputField(sj_company_input);
    sj_company_input.focus();
    return false;
  } else if (sj_post === "") {
    displayErrorinInputField(sj_post_input);
    sj_post_input.focus();
    return false;
  } else if (sj_description === "") {
    displayErrorinInputField(sj_description_input);
    sj_description_input.focus();
    return false;
  } else if (sj_qualification === "") {
    displayErrorinInputField(sj_qualification_input);
    sj_qualification_input.focus();
    return false;
  } else if (sj_no_of_vacancies === "") {
    displayErrorinInputField(sj_no_of_vacancies_input);
    sj_no_of_vacancies_input.focus();
    return false;
  } 
  else if(parseInt(sj_no_of_vacancies) >99999){
    feedback_sj_no_of_vacancies.innerText="Please enter a valid number of vacancies."
    sj_no_of_vacancies_input.classList.add("is-invalid");
    sj_no_of_vacancies_input.focus();
    return false;

  }
  else if (sj_email === "") {
    sj_email_input.dispatchEvent(new Event("input"));
    sj_email_input.focus();
    return false;
  } else if (sj_contact_no === "") {
    sj_contact_no_input.dispatchEvent(new Event("input"));
    sj_contact_no_input.focus();
    return false;
  } else if (sj_job_or_internship === "") {
    sj_job_or_internship_input.classList.add("is-invalid");
    sj_job_or_internship_input.focus();
    return false;
  } else {
    sj_no_of_vacancies_input.classList.remove("is-invalid");
    return true;
  }
}

//2.insert the internship job into the database after successful validation
function insertInternshipJobByUser(username) {
  var internshipJobFormData = {
    "sj_username": username,
    "sj_company_name": sj_company,
    "sj_post": sj_post,
    "sj_contact_number": sj_contact_no,
    "sj_contact_email": sj_email,
    "sj_description": sj_description,
    "sj_qualification": sj_qualification,
    "sj_number_of_vacancies":sj_no_of_vacancies,
    "sj_job_or_internship" : sj_job_or_internship
  };

  $.ajax({
    url: "https://alumniandroidapp.000webhostapp.com/post_student_job_giving_back_fragment.php",
    type: "POST",
    data: internshipJobFormData,
    dataType: "text",
    success: function (response) {
      console.log(response);
      if (response.includes("Inserted successfully")) {
        alert("Internship/Job Posted Successfully");

        //clear the form
        internship_job_form.reset();

        //reload the accolades by you section
       $("#section_name").text("Accolades by you");
    $("#Accolades_you_page").show();
    $("#Internship_jobs_page").hide();
    $("#Scholarship_awards_page").hide();

      } else {
        alert("Sorry! Couldnt post the internship/job.Please try again later");
      }
    },
    error: function (xhr, status, error) {
      console.error("Request failed. Status: " + status + ". Error: " + error);
      alert("Oops!Couldnt post your internship/job.Please try again later.");
    }
  });
}

//....................................................ACCOLADES BY YOU PAGE....................................................

//1. fetch all the scholarships awards
function fetchAllScholarshipAwardsByUser(username) {
  //$('#loadingDiv').show();

  return new Promise(function(resolve,reject){
  $.ajax({
    url: "https://alumniandroidapp.000webhostapp.com/all_student_scholarship_award_fetch.php",
    type: "POST",
    dataType: "json",
    success: function (response) {
      //console.log(response);
      all_scholarships_awards_posted=response;
      all_scholarships_posted_by_user = all_scholarships_awards_posted.filter((scholarship) => scholarship.sa_username === username);
      //$('#loadingDiv').hide();
      resolve("success");
    },
    error: function (xhr, status, error) {
      console.error("Request failed. Status: " + status + ". Error: " + error);
      reject("error");
      //$('#loadingDiv').hide();
      //alert("Error occurred while logging out");
    },
  });
});
}

//2. fetch all the internship jobs
function fetchAllInternshipJobsByUser(username){

 // $('#loadingDiv').show();

  return new Promise(function(resolve,reject){
  $.ajax({
    url: "https://alumniandroidapp.000webhostapp.com/all_student_internship_job_fetch.php",
    type: "POST",
    dataType: "json",
    success: function (response) {
      //console.log(response);
      all_internship_jobs_posted=response;
      all_internship_jobs_posted_by_user = all_internship_jobs_posted.filter((internship) => internship.sj_username === username);
     // $('#loadingDiv').hide();
     resolve("success");
    },
    error: function (xhr, status, error) {
      console.error("Request failed. Status: " + status + ". Error: " + error);
      reject("error");
     // $('#loadingDiv').hide();
      //alert("Error occurred while logging out");
    },
  });
});

}

//3. display scholarship awards by user
function displayScholarshipsAwardsByUser(){
  const cardContainer = document.getElementById("card_container");
  cardContainer.innerHTML = ""; // Clear existing content before adding new cards

  // Loop through the sorted scholarship data and generate cards
  if(all_scholarships_posted_by_user.length > 0){
  all_scholarships_posted_by_user.forEach((scholarship) => {
    const cardHtml = `
      <div class="col-lg-4 col-md-6 mb-5">
        <div class="card shadow p-1" style="width: auto;border-radius: 20px;">
          <div class="card-body ">
            <h5 class="card-title fw-bold">${scholarship.sa_name}</h5>
            <p class="card-text " style="overflow: hidden;display:-webkit-box;-webkit-line-clamp: 3;line-clamp: 3; -webkit-box-orient: vertical;height:4.5rem">${scholarship.sa_for_department} ${scholarship.sa_class}</p>
          </div>
        </div>
      </div>
    `;

    // Append the card HTML to the container
    cardContainer.insertAdjacentHTML("beforeend", cardHtml);
  });
}
}


//4. display internship jobs by user
function displayInternshipJobsByUser(){
  const cardContainer = document.getElementById("card_container");
  cardContainer.innerHTML = ""; // Clear existing content before adding new cards

  // Loop through the sorted scholarship data and generate cards

  if(all_internship_jobs_posted_by_user.length > 0){
 all_internship_jobs_posted_by_user.forEach((internship) => {
    const cardHtml = `
      <div class="col-lg-4 col-md-6 mb-5">
        <div class="card shadow p-1" style="width: auto;border-radius: 20px;">
          <div class="card-body ">
            <h5 class="card-title fw-bold">${internship.sj_post}</h5>
            <p class="card-text " style="overflow: hidden;display:-webkit-box;-webkit-line-clamp: 3;line-clamp: 3; -webkit-box-orient: vertical;height:4.5rem">${internship.sj_company_name}</p>
          </div>
        </div>
      </div>
    `;

    // Append the card HTML to the container
    cardContainer.insertAdjacentHTML("beforeend", cardHtml);
  });

}
}