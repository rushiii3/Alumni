<?php
session_start();
if (!isset($_SESSION['isloggedin'])) {
  echo "<script> window.location.href='../main/login.php' </script>";
  exit;
} else {
  if (!$_SESSION['isloggedin']) {
    echo "<script> window.location.href='../main/login.php' </script>";
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
  <title>Professional Development</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />

  <link rel="stylesheet" href="../css/navigation.css">
  <link rel="stylesheet" href="../css/alumni_directory.css">
  <link rel="stylesheet" href="../css/professional_dev.css">

  <script src="../js/navigation.js"></script>
</head>

<body>
  <?php
  include_once "loader.html";
  ?>
  <main id="main">
    <div class="wrapper">
      <!-- Sidebar  -->
      <?php
      include "navbar1.php";
      ?>
      <!-- Page Content  -->
      <div id="content">
        <?php
        include "navbar2.php";
        ?>

        <div style="display: flex;flex-direction: row;justify-content: space-between;">
          <h1 class="ms-4 mt-4 mb-3" id="PD_title">
            Professional Development
          </h1>

          <!--SEARCH BAR-->
          <div class="ms-auto" id="search_bar_div">
            <div class="search-box">
              <button class="btn-search"><i class="fas fa-search bi bi-search"></i></button>
              <input type="text" class="input-search" placeholder="Search Designation...">
            </div>
          </div>

        </div>

        <!-- section name -->
        <h3 id="section_name" class="ms-4 mt-4 mb-3">

        </h3>
        <!-- UPDATE STATUS MODAL-->
        <!--Modal displayed when user is deleting their profile-->

        <div class="modal fade" id="update_status_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Status of Job ?</h5>
                <button type="button" id="modal_cross_button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to update the hiring status of your job? <b>This cant be undone.</b></p>

              </div>
              <div class="modal-footer">
                <button type="button" id="btn_update_status_modal_yes" class="btn btn-primary">Yes</button>
                <button type="button" id="btn_update_status_modal_no" class="btn btn-secondary" data-dismiss="modal">No</button>
              </div>
            </div>
          </div>
        </div>
        <div class="container mt-2" id="professional_dev_page" style="height:100vh;">

          <div class="row p-1">
            <?php
            $url = 'https://alumniandroidapp.000webhostapp.com/all_professional_job_fetch.php'; // path to your JSON file
            $data = file_get_contents($url); // put the contents of the file into a variable
            if ($data) {
              $characters = json_decode($data); // decode the JSON feed
            ?>
              <?php
              foreach ($characters as $character) {

                if ($character->status == "hiring" && $character->verification_status == "verified") {

              ?>
                  <div class="col-lg-4 col-md-6 mb-5 mt-4 ToidentifyCard" id="card">
                    <div class="card shadow p-1" style="width: auto; border-radius: 20px;">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                          <h5 class="card-title fw-bold ToIdentifyPost" id="job_title"><?php echo $character->post; ?></h5>
                          <p class="card-text" id="job_status"><?php echo $character->status; ?></p>
                        </div>
                        <p class="card-text text-muted mt-3" id="job_company"><?php echo $character->company_name; ?></p>
                        <p class="card-text text-muted">
                          <span id="job_experience"><?php echo "minimum " . $character->years_of_experience . " years"; ?></span>
                        </p>
                        <p hidden><?php echo $character->id; ?></p>
                        <p hidden><?php echo $character->verification_status; ?></p>

                        <p class="text-center mb-0">
                          <a id="btnViewDetails" class="link text-center" style="color:#0099CC ">View Details</a>
                        </p>
                      </div>
                    </div>
                  </div>


            <?php
                }
              }
            } else {
              echo "Please refresh or try again later";
            }

            ?>

            <div id="div_no_jobs">
              No jobs available currently.
            </div>
          </div>
        </div>

        <!-- POST JOBS PAGE-->
        <div id="post_jobs_page">
          POST JOBS
          <form id="postjobsform">

            <div class="mb-3">
              <!--Company Name-->
              <label for="pj_company_input" class="form-label">Company</label>
              <input type="text" name="pj_company_input" class="form-control" id="pj_company_input" required>
              <div class="invalid-feedback" id="pj_company_feedback">
                Please enter the company name.
              </div>
            </div>

            <div class="mb-3">
              <!--Post Name-->
              <label for="pj_post_input" class="form-label">Post</label>
              <input type="text" name="pj_post_input" class="form-control" id="pj_post_input" required>
              <div class="invalid-feedback" id="pj_post_feedback">
                Please enter the designation/position.
              </div>
            </div>

            <div class="mb-3">
              <!--Experience required -->
              <label for="pj_yrs_of_exp_input" class="form-label">Minimum Years of Experience</label>
              <input type="number" name="pj_yrs_of_exp_input" class="form-control" id="pj_yrs_of_exp_input" required>
              <div class="invalid-feedback" id="pj_yrs_of_exp_feedback">
                Please enter valid number of experience.
              </div>
            </div>

            <div class="mb-3">
              <!--Qualification-->
              <label for="pj_qualification_input" class="form-label">Qualification</label>
              <input type="text" name="pj_qualification_input" class="form-control" id="pj_qualification_input" required>
              <div class="invalid-feedback" id="pj_qualification_feedback">
                Please enter the required qualification.
              </div>
            </div>

            <div class="mb-3">
              <!--Job Description-->
              <label for="pj_job_desc_input" class="form-label">Job Description</label>
              <input type="text" name="pj_job_desc_input" class="form-control" id="pj_job_desc_input" required>
              <div class="invalid-feedback" id="pj_job_desc_feedback">
                Please enter the job description.
              </div>
            </div>

            <div class="mb-3">
              <!--Contact Email-->
              <label for="pj_email_input" class="form-label">Contact Email</label>
              <input type="email" name="pj_email_input" class="form-control" id="pj_email_input" required>
              <div class="invalid-feedback" id="pj_email_feedback">
                Please enter a valid email.
              </div>
            </div>

            <div class="mb-3">
              <!--Contact Phone-->
              <label for="pj_phone_input" class="form-label">Contact Number</label>
              <input type="phone" name="pj_phone_input" class="form-control" id="pj_phone_input" maxLength="10" required>
              <div class="invalid-feedback" id="pj_phone_feedback">
                Please enter a valid phone number.
              </div>
            </div>

            <div class="mb-3">
              <!-- Submit button -->
              <button type="submit" name="pj_btn_submit" id="pj_btn_submit" class="btn btn-primary px-5 py-2 ms-2 mt-3">Submit</button>
            </div>

          </form>
        </div>

        <!--JOBS POSTED BY YOU PAGE-->
        <div id="jobs_posted_by_you_page">

          <div class="container mt-2">
            <div class="row p-1 " id="ToIdentifyMainRow">
              <?php
              $url = 'https://alumniandroidapp.000webhostapp.com/all_professional_job_fetch.php'; // path to your JSON file
              $data = file_get_contents($url); // put the contents of the file into a variable
              if ($data) {
                $characters = json_decode($data); // decode the JSON feed
              ?>
                <?php
                $hiring_jobs_array = array();
                $filled_jobs_array = array();
                foreach ($characters as $character) {


                  if ($character->username == $_SESSION["username"]) {

                    if ($character->status == "hiring") {
                      array_push($hiring_jobs_array, $character);
                    } else {
                      array_push($filled_jobs_array, $character);
                    }
                  }
                }

                if (count($hiring_jobs_array) > 0) {
                  usort(
                    $hiring_jobs_array,
                    function ($a, $b) {
                      return strcmp($a->verification_status, $b->verification_status);
                    }
                  );
                }

                if (count($filled_jobs_array) > 0) {
                  usort(
                    $filled_jobs_array,
                    function ($a, $b) {
                      return strcmp($a->verification_status, $b->verification_status);
                    }
                  );
                }

                $all_sorted_jobs = array_merge($hiring_jobs_array, $filled_jobs_array);

                foreach ($all_sorted_jobs as $character) {

                ?>
                  <div class="col-lg-4 col-md-6 mb-5 mt-4 ToidentifyCard" id="your_job_card">
                    <div class="card shadow p-1" style="width: auto; border-radius: 20px;">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                          <h5 class="card-title fw-bold ToIdentifyPost" id="your_job_title"><?php echo $character->post; ?></h5>
                          <p class="card-text" id="your_job_status"><?php echo $character->status; ?></p>
                        </div>
                        <p class="card-text text-muted mt-3" id="your_job_company"><?php echo $character->company_name; ?></p>
                        <p class="card-text text-muted">
                          <span id="your_job_experience"><?php echo "minimum " . $character->years_of_experience . " years"; ?></span>
                        </p>
                        <p id="para_your_jobs_id" hidden><?php echo $character->id; ?></p>



                        <?php

                        if ($character->verification_status == "verified") {
                          echo '<p class="card-text  mt-3" id="job_verification_status" style="color:green">
                            <img id="img_veri_status" src="../img/ic_verified_final_svg.svg" />&nbsp' . $character->verification_status, '</p>';
                        } else {
                          echo '<p class="card-text mt-3" id="job_verification_status" style="color:red">
                            <img id="img_veri_status" src="../img/ic_not_verified_final_svg.svg" /> &nbsp' . $character->verification_status, '</p>';
                        }
                        ?>



                        <div id="buttons" class="row p-1 mb-3 align-items-center justify-content-between">
                          <div class="col-5">

                            <p><a id="btnViewDetails" class="link ToIdentifyViewDetailsLink" style="color: #0099CC">View Details</a></p>
                          </div>
                          <div class="col-7">
                            <?php

                            if (in_array($character, $hiring_jobs_array)) {
                              echo '<button type="button" name="pj_btn_update_status" id="pj_btn_update_status" class="btn btn-primary mt-2 btn-block ToIdentifyUpdateButton" style="background-color: #0099CC;float:right">Update Status</button>';
                            } else {
                              echo '<button type="button" name="pj_btn_update_status" id="pj_btn_update_status" class="btn btn-secondary mt-2 btn-block ToIdentifyUpdateButton " style="float:right" disabled>Update Status</button>';
                            }
                            ?>

                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

              <?php
                }
              } else {
                echo "Please refresh or try again later";
              }

              ?>

              <div id="div_no_your_jobs">
                No jobs posted.
              </div>
            </div>
          </div>
        </div>

        <!-- Bottom navigation -->
        <div class="position-fixed fixed-bottom bg-white d-flex justify-content-evenly py-1 " id="down_navigation">
          <button type="button" class="text-center mx-2 btn Professional_Dev" id="btn_Professional_Dev">
            <span class="material-symbols-outlined">
              work
            </span>
            <br />
            View Jobs
          </button>

          <button type="button" class="text-center mx-2 btn Post_Jobs" id="btn_Post_Jobs">
            <span class="material-symbols-outlined">
              post_add
            </span>
            <br />
            Post Jobs
          </button>

          <button type="button" class="text-center mx-2 btn Jobs_Posted_By_You" id="btn_Jobs_Posted_By_You">
            <span class="material-symbols-outlined">
              real_estate_agent
            </span>
            <br />
            Jobs you posted
          </button>
        </div>


      </div>
    </div>
    </div>
    <?php
    include "footer.php"
    ?>
  </main>
  <script src="../js/professional_dev.js"></script>
  <script>
    //redirect to specific professional dev

    var all_cards_view_details1 = document.querySelectorAll("#card");

    var all_cards_view_details2 = document.querySelectorAll("#your_job_card");

    var all_cards_view_details = Array.from(all_cards_view_details1).concat(Array.from(all_cards_view_details2));
    all_cards_view_details.forEach((card) => {

      card.querySelector("p a").addEventListener('click', function() {

        var pj_id = card.querySelector("p[hidden]").innerText;
        window.location.href = "../main/specific_professional_dev.php?pj_id=" + pj_id;
      });


    });

    //-- WHEN USER CLICKS ON POST JOB SUBMIT BUTTON
    var pj_submit_button = document.getElementById("pj_btn_submit");
    pj_submit_button.addEventListener("click", function(e) {
      e.preventDefault();

      //disable the button to avoid duplicate forms to be submitted
      pj_submit_button.disabled = true;
      //alert(pj_submit_button.disabled);
      //alert("clicked");

      if (validatePostJobForm()) {

        //console.log("successfully validated");
        insertPostJobDataToDatabase("<?php echo $_SESSION["username"]; ?>")
          .then(function() {
            //console.log("HERRRRE")
            //go to your jobs page
            $("#btn_Jobs_Posted_By_You").click();

            pj_submit_button.disabled = false;

            //fetch the updated jobs
            fetchYourJobsOfUser("<?php echo $_SESSION["username"]; ?>");
          });


      } else {
        pj_submit_button.disabled = false;
        console.log("Job form is not valid " + pj_submit_button.disabled);

      }


    });

    


    //-------------------------------------------------WHEN UPDATE STATUS BUTTON IS CLICKED---------------------------------------------------------------------------------

    //DISPLAY THE MODAL AND UPDATE THE STATUS ACCORDINGLY
    /*
        var all_update_btns = document.querySelectorAll("#pj_btn_update_status");

        all_update_btns.forEach((element) => {
          element.addEventListener("click", function() {
            $("#update_status_modal").modal("show");

            //remove the "update in progess" text if already set
            $("#update_status_modal .modal-body h5").remove();

            $("#modal_cross_button").click(function() {
              $("#update_status_modal").modal("hide");
            });

            $("#btn_update_status_modal_yes").click(function() {

              //display the "update in progress" text
              if($("#update_status_modal .modal-body").has("h5").length === 0){
              $("#update_status_modal .modal-body").append("<h5><b>Update in progress</b></h5>");
              }
              
              //pass the card as the context so that pj_id can be accessed inside the updateStatusOfYourJobsInDatabase() method
              var ancestor=element.closest("#your_job_card");

              console.log("CALLING UPDATE STATUS FUNCTION FROM PHP FILE");
              updateStatusOfYourJobsInDatabase(ancestor,"<?php echo $_SESSION["username"]; ?>")
              .then(function(data){
                console.log("calling fetchjobsofuser and the data is:" + data);
                $("#update_status_modal").modal("hide");

                element.removeEventListener("click",function(){
                console.log("Removing the event listener for the click event");
              })


                fetchYourJobsOfUser("<?php echo $_SESSION["username"]; ?>");

             
              })
             
            });

            $("#btn_delete_modal_no").click(function() {
              $("#btn_update_status_modal_no").modal("hide");
            });
          });
        });
    */
    document.addEventListener("DOMContentLoaded", function() {
      setUpEventHandlers("<?php echo $_SESSION["username"]; ?>");


    })
  </script>

</body>

</html>