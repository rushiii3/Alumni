$(document).ready(function () {
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

    history.pushState({ tab: "professional_dev_page" },"",window.location.href);
    console.log(history.length);
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

    history.pushState({ tab: "jobs_posted_by_you_page" },"",window.location.href);
    console.log(history.length);
  });

  //by default select scholarship awards
  //$("#btn_Professional_Dev").click();

  /*------------------------------------------------------------------------------------
IF COMING FROM SPECIFIC PROFESSIONAL DEV , THEN SELECT THE TAB THAT WAS SELECTED
Eg: if "your jobs" tab was selected then it should return to that tab
-------------------------------------------------------------------------------------*/
  if (history.state && history.state.tab) {
    var selectedTab = history.state.tab;
    //alert("triggered")
    console.log("selected tab" + selectedTab);
    // Now you have the selected tab name. You can use it to determine which tab to show.
    if (selectedTab === "professional_dev_page") {
      $("#btn_Professional_Dev").click();
      history.pushState({ tab: "professional_dev_page" },"",window.location.href);

    } 
    else if (selectedTab === "jobs_posted_by_you_page") {
      $("#btn_Jobs_Posted_By_You").click();
      //alert("here");

      history.pushState({ tab: "jobs_posted_by_you_page" },"",window.location.href);
    }
    
  }

  /*---------------------------
Display hiring status in green
----------------------------*/

  var jobStatusElement1 = document.querySelectorAll("#job_status");
  var jobStatusElement2 = document.querySelectorAll("#your_job_status");

  var jobStatusElement = Array.from(jobStatusElement1).concat(
    Array.from(jobStatusElement2)
  );

  for (i = 0; i < jobStatusElement.length; i++) {
    var jobStatusValue = jobStatusElement[i].innerText;

    if (jobStatusValue === "hiring") {
      jobStatusValue = "currently " + jobStatusValue;
      jobStatusElement[i].innerText = jobStatusValue;
      jobStatusElement[i].style.color = "#99cc00"; //green
    } else {
      jobStatusElement[i].style.color = "#cc0000"; //red
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

var pj_company_input = document.getElementById("pj_company_input");
var pj_post_input = document.getElementById("pj_post_input");
var pj_yrs_of_exp_input = document.getElementById("pj_yrs_of_exp_input");
var pj_qualification_input = document.getElementById("pj_qualification_input");
var pj_job_desc_input = document.getElementById("pj_job_desc_input");
var pj_email_input = document.getElementById("pj_email_input");
var pj_phone_input = document.getElementById("pj_phone_input");

var pj_company_feedback = document.getElementById("pj_company_feedback");
var pj_post_feedback = document.getElementById("pj_post_feedback");
var pj_yrs_of_exp_feedback = document.getElementById("pj_yrs_of_exp_feedback");
var pj_qualification_feedback = document.getElementById(
  "pj_qualification_feedback"
);
var pj_job_desc_feedback = document.getElementById("pj_job_desc_feedback");
var pj_email_feedback = document.getElementById("pj_email_feedback");
var pj_phone_feedback = document.getElementById("pj_phone_feedback");

var pj_company = "";
var pj_post = "";
var pj_yrs_of_exp = "";
var pj_qualification = "";
var pj_job_desc = "";
var pj_email = "";
var pj_phone = "";

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
    pj_phone = entered_phone_number;
  }
});

//SEARCH JOBS

$(".btn-search")
  .on("mouseover", function () {
    $("#PD_title").hide();
  })
  .on("mouseenter", function () {
    $("#PD_title").hide();
  })
  .on("mouseout", function () {
    $("#PD_title").show();
  });
$(".input-search")
  .on("mouseover", function () {
    $("#PD_title").hide();
  })
  .on("mouseenter", function () {
    $("#PD_title").hide();
  })
  .on("mouseout", function () {
    $("#PD_title").show();
  });

$(".input-search").on("input", function () {
  var x = document.querySelectorAll(".ToIdentifyPost");
  var card = document.querySelectorAll(".ToidentifyCard");
  var input = $(".input-search").val();
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

function validatePostJobForm() {
  pj_company = pj_company_input.value.trim();
  pj_post = pj_post_input.value.trim();
  pj_yrs_of_exp = pj_yrs_of_exp_input.value.trim();
  pj_job_desc = pj_job_desc_input.value.trim();
  pj_qualification = pj_qualification_input.value.trim();
  pj_email = pj_email_input.value.trim();
  pj_phone = pj_phone_input.value.trim();

  if (pj_company == "") {
    pj_company_feedback.innerText = "Please enter a company name";
    displayErrorinInputField(pj_company_input);
    pj_company_input.focus();
    return false;
  } else if (pj_post == "") {
    pj_post_feedback.innerText = "Please enter the designation/position.";
    displayErrorinInputField(pj_post_input);
    pj_post_input.focus();
    return false;
  } else if (pj_qualification == "") {
    pj_qualification_feedback.innerText =
      "Please enter the required qualification.";
    displayErrorinInputField(pj_qualification_input);
    pj_qualification_input.focus();
    return false;
  } else if (pj_job_desc == "") {
    pj_job_desc_feedback.innerText = "Please enter the job description.";
    displayErrorinInputField(pj_job_desc_input);
    pj_job_desc_input.focus();
    return false;
  } else if (pj_yrs_of_exp == "") {
    pj_yrs_of_exp_feedback.innerText =
      "Please enter valid number of experience.";
    displayErrorinInputField(pj_yrs_of_exp_input);
    pj_yrs_of_exp_input.focus();
    return false;
  } else if (parseInt(pj_yrs_of_exp) > 50) {
    pj_yrs_of_exp_feedback.innerText =
      "Please enter valid number of experience.";
    displayErrorinInputField(pj_yrs_of_exp_input);
    pj_yrs_of_exp_input.focus();
    return false;
  } else if (pj_email == "") {
    pj_email_input.dispatchEvent(new Event("input"));
    pj_email_input.focus();
    return false;
  } else if (pj_email_input.classList.contains("is-invalid")) {
    pj_email_input.dispatchEvent(new Event("input"));
    pj_email_input.focus();
    return false;
  } else if (pj_phone == "") {
    pj_phone_input.dispatchEvent(new Event("input"));
    pj_phone_input.focus();
    return false;
  } else if (pj_phone_input.classList.contains("is-invalid")) {
    pj_phone_input.dispatchEvent(new Event("input"));
    pj_phone_input.focus();
    return false;
  } else {
    pj_company_input.classList.remove("is-invalid");
    pj_post_input.classList.remove("is-invalid");
    pj_qualification_input.classList.remove("is-invalid");
    pj_job_desc_input.classList.remove("is-invalid");
    pj_yrs_of_exp_input.classList.remove("is-invalid");
    pj_email_input.classList.remove("is-invalid");
    pj_phone_input.classList.remove("is-invalid");
    //alert("form is valid");
    pj_phone = "+91" + pj_phone;
    return true;
  }
}

//4.Store the form
function insertPostJobDataToDatabase(username) {
  var formdata = {
    pj_username: username,
    pj_company_name: pj_company,
    pj_post: pj_post,
    pj_description: pj_job_desc,
    pj_qualification: pj_qualification,
    pj_years_of_experience: pj_yrs_of_exp,
    pj_contact_email: pj_email,
    pj_contact_number: pj_phone,
    pj_verification_status: "not verified",
    pj_status: "hiring",
  };

  return $.ajax({
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
      } else {
        alert("Sorry! Couldnt post the job.Please try again later");
      }
    },
    error: function (xhr, status, error) {
      console.error("Request failed. Status: " + status + ". Error: " + error);
      alert("Oops!Couldnt post your job.Please try again later.");
    },
  });
}

/*---------------------------
5. Display theres nothing here when no jobs are present
----------------------------*/
function displayMessageWhenJobsAreNotPresent() {
  var all_cards = document.querySelectorAll("#card");

  if (all_cards.length < 1) {
    $("#div_no_jobs").show();
  } else {
    $("#div_no_jobs").hide();
  }
}

/*-------------------------------------------
6.Display theres nothing here when no YOUR jobs are present
----------------------------*/
function displayMessageWhenYourJobsAreNotPresent() {
  var all_cards = document.querySelectorAll("#your_job_card");

  if (all_cards.length < 1) {
    $("#div_no_your_jobs").show();
  } else {
    $("#div_no_your_jobs").hide();
  }
}

//7.Update the status of the job
async function updateStatusOfYourJobsInDatabase(context, username) {
  var pj_id = context.querySelector("#para_your_jobs_id").textContent.trim();
  var pj_status = context.querySelector("#your_job_status").textContent.trim();

  //console.log("who initiated it " + context.querySelector("#your_job_title").textContent);

  var final_status = "";
  if (pj_status.toLowerCase().includes("hiring")) {
    final_status = "filled";
  } else {
    final_status = "hiring";
  }

  return $.ajax({
    url: "https://alumniandroidapp.000webhostapp.com/update_status_professional_dev_fragment.php",
    type: "POST",
    data: { pj_id: pj_id, pj_status: final_status },
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
    },
  });
}

//8.fetch the updated jobs posted by user
function fetchYourJobsOfUser(username) {
  $.ajax({
    url: "https://alumniandroidapp.000webhostapp.com/all_professional_job_fetch.php",
    type: "GET",

    dataType: "json",
    success: function (data) {
      console.log(data);
      // Reset the event handlers and fetch the updated jobs
      //resetUpEventHandlers(username);

      var hiring_jobs_array = new Array();
      var filled_jobs_array = new Array();

      //sort into hiring and filled
      for (var i = 0; i < data.length; i++) {
        var job = data[i];

        if (job.username == username) {
          if (job.status == "hiring") {
            hiring_jobs_array.push(job);
          } else {
            filled_jobs_array.push(job);
          }
        }
      }

      console.log("hiring jobs: " + hiring_jobs_array.length);
      console.log("filled jobs: " + filled_jobs_array.length);

      //sort the filled and hiring arrays based on verification status
      if (hiring_jobs_array.length > 0) {
        hiring_jobs_array.sort(function (a, b) {
          return a.verification_status.localeCompare(b.verification_status);
        });

        if (filled_jobs_array.length > 0) {
          filled_jobs_array.sort(function (a, b) {
            return a.verification_status.localeCompare(b.verification_status);
          });
        }
      }

      //DISPLAY THE JOBS
      var sorted_jobs_array = hiring_jobs_array.concat(filled_jobs_array);

      //get reference to the div inside which all the cards will be displayed
      var your_jobs_div = document.querySelector(
        "#jobs_posted_by_you_page .container #ToIdentifyMainRow"
      );

      //clear the div to remove previous elements
      your_jobs_div.innerHTML = "";

      console.log("sorted jobs: " + sorted_jobs_array.length);

      sorted_jobs_array.forEach((job) => {
        var card_template_0 = `<div class="col-lg-4 col-md-6 mb-5 mt-4 ToidentifyCard" id="your_job_card">
        <div class="card shadow p-1" style="width: auto; border-radius: 20px;">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="card-title fw-bold ToIdentifyPost" id="your_job_title">${job.post}</h5>`;

        if (job.status == "hiring") {
          var card_template_001 = `
                <p class="card-text" id="your_job_status" style="color:#99cc00">currently ${job.status}</p>
              </div>`;
        } else {
          var card_template_001 = `
                <p class="card-text" id="your_job_status" style="color:#cc0000">${job.status}</p>
              </div>`;
        }

        var card_template_002 = `
            <p class="card-text text-muted mt-3" id="your_job_company">${job.company_name}</p>
            <p class="card-text text-muted">
              <span id="your_job_experience">minimum ${job.years_of_experience} years</span>
            </p>
            <p id="para_your_jobs_id" hidden>${job.id}</p>`;

        if (job.verification_status == "verified") {
          var card_template_1 = `<p class="card-text  mt-3" id="job_verification_status" style="color:green"><img id="img_veri_status" src="../img/ic_verified_final_svg.svg" />&nbsp ${job.verification_status}</p>`;
        } else {
          var card_template_1 = `<p class="card-text  mt-3" id="job_verification_status" style="color:red"><img id="img_veri_status" src="../img/ic_not_verified_final_svg.svg" />&nbsp ${job.verification_status}</p>`;
        }

        var card_template_2 = `<div id="buttons" class="row p-1 mb-3 align-items-center justify-content-between">
            <div class="col-5">

              <p><a id="btnViewDetails" class="link ToIdentifyViewDetailsLink" style="color: #0099CC">View Details</a></p>
            </div>
            <div class="col-7" >`;

        if (job.status == "hiring") {
          var card_template_3 = `<button type="button" name="pj_btn_update_status" id="pj_btn_update_status" class="btn btn-primary mt-2 btn-block ToIdentifyUpdateButton" style="background-color: #0099CC;float:right">Update Status</button`;
        } else {
          var card_template_3 = `<button type="button" name="pj_btn_update_status" id="pj_btn_update_status" class="btn btn-secondary mt-2 btn-block" style="float:right" disabled>Update Status</button`;
        }

        var card_template_4 = `</div>
            </div>
          </div>
        </div>
</div>`;

        var final_card_template =
          card_template_0 +
          card_template_001 +
          card_template_002 +
          card_template_1 +
          card_template_2 +
          card_template_3 +
          card_template_4;

        your_jobs_div.innerHTML += final_card_template;
      });
    },
    error: function (xhr, status, error) {
      console.error("Request failed. Status: " + status + ". Error: " + error);
      alert("Oops! Couldnt fetch the updated jobs.Please try again later.");
    },
  });
}

//resetup the event handlers for the updated cards after using AJAX

function setUpEventHandlers(username) {
  //alert("inside the setup event handlers method");

  let ancestor_of_update_progress_btn;

  var cards_parent_element = document.querySelector(
    "#jobs_posted_by_you_page .container #ToIdentifyMainRow"
  );

  cards_parent_element.addEventListener("click", function (event) {
    if (event.target.classList.contains("ToIdentifyUpdateButton")) {
      //alert("Update button clicked");

      // console.log(""+event.currentTarget.id);
      //console.log("HERRE");
      $("#update_status_modal").modal("show");

      //remove the "update in progess" text if already set
      $("#update_status_modal .modal-body h5").remove();

      //pass the card as the context so that pj_id can be accessed inside the updateStatusOfYourJobsInDatabase() method
      var ancestor = event.target.closest("#your_job_card");
      ancestor_of_update_progress_btn = ancestor;

      $("#btn_update_status_modal_no").click(function () {
        $("#update_status_modal").modal("hide");
      });
    } else if (event.target.classList.contains("ToIdentifyViewDetailsLink")) {
      //alert("View Details clicked");

      var pj_id = event.target
        .closest("#your_job_card")
        .querySelector("p[hidden]").innerText;

      window.location.href =
        "../main/specific_professional_dev.php?pj_id=" + pj_id;
    }
  });

  //BINDING THE EVENT OUTSIDE THE CLICK EVENT LISTERNER OF THE CARD_PARENT_ELEMENT TO AVOID MULTIPLE CLICK EVENT HANDLERS BEING TRIGGERED
  $("#btn_update_status_modal_yes").click(function () {
    //console.log("INSIDE UPDATE MODAL YES");
    //display the "update in progress" text
    if ($("#update_status_modal .modal-body").has("h5").length === 0) {
      $("#update_status_modal .modal-body").append(
        "<h5><b>Update in progress</b></h5>"
      );
    }

    //pass the card as the context so that pj_id can be accessed inside the updateStatusOfYourJobsInDatabase() method
    if (ancestor_of_update_progress_btn != null) {
      var ancestor = ancestor_of_update_progress_btn;
    }

    // console.log(ancestor.querySelector("#your_job_title").innerText +" CALLING UPDATE STATUS FUNCTION FROM JAVASCRIPT FILE");

    //console.log("UPDATIINGGG AND FETCHING")

    //$("#update_status_modal").modal("hide");

    updateStatusOfYourJobsInDatabase(ancestor, username).then(function (data) {
      console.log("calling fetchjobsofuser and the data is:" + data);
      fetchYourJobsOfUser(username);

      console.log("AFTER UPDATE STATUS METHOD IN SETUPEVENTHANDLER");
      //hide the modal once updating is in progress
      $("#update_status_modal").modal("hide");
    });
  });
}
