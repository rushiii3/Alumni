<!--To handle the actions on navbar 1.php-->
<script>

  //GLOBAL VARIABLES
//----------------------------------------------------------------------------------------------------------------------------------------
//FUNCTIONS
function fetchLoggedinUserDetails(username){
    var loggedin_username=username;
    //console.log(username);
    $.ajax({
        url:"https://alumniandroidapp.000webhostapp.com/logged_in_alumni_details_fetch_profile_fragment.php", 
        type:"POST",
        data:{"alumni_username":loggedin_username},
        dataType:"json",
        success:function(response){
          console.log(response);
          if (Array.isArray(response) && response.length > 0) {
        var name_of_alumni = response[0].firstname + " " + response[0].lastname;
        $('#alumni_name').text(name_of_alumni);
        let loggedin_username=$("#alumni_name").text();
      }
      
        },
        error:function(error){
          console.error("Error fetching logged-in alumni details: " + error);
        }
    
    }
    );
}

//2.Logout the user
function logoutUser() {
    $.ajax({
      url: "../main/logout_and_destroy_session.php", // PHP file to handle the logout logic
      type: "POST",
      dataType: "text",
      success: function(response) {
        if (response.includes("logged out")) {
          console.log("Logged out successfully");
          window.location.href = "../main/login.php";
        } else {
          console.log("Error occurred while logging out");
        }
      },
      error: function(xhr, status, error) {
        console.error("Request failed. Status: " + status + ". Error: " + error);
        alert("Error occurred while logging out");
      }
    });
  }
//----------------------------------------------------------------------------------------------------------------------------------------

  $(document).ready(function() {

    
    // Show the confirmation dialog when the user clicks on the logout link
    $("#logout_user_link").click(function(event) {
      event.preventDefault();
      $("#logoutModal").modal("show");
    });

    // Handle the logout action when the user clicks on the logout button in the dialog
    $("#logoutButton").click(function() {
      logoutUser(); // Call the logoutUser function to perform the logout process
    });

    //handle the cancel buttons
    $("#cancelButton").click(function() {
        $("#logoutModal").modal("hide");// dismiss the logout modal
    });

    $("#crossButton").click(function() {
        $("#logoutModal").modal("hide");// dismiss the logout modal
    });

//fetch the details of the logged in alumni
fetchLoggedinUserDetails("<?php echo $_SESSION["username"];?>");


  });

  

  //Handle and cancel button
</script>


<!-- Logout Confirmation Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5>
        <button type="button" class="close btn" data-dismiss="modal"  id="crossButton" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to logout?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelButton">Cancel</button>
        <button type="button" class="btn btn-primary" id="logoutButton">Logout</button>
      </div>
    </div>
  </div>
</div>

<!--THE NAVBAR BEGINS HERE-->
<nav id="sidebar">
            <div class="mx-auto">
                
                    <button class="btn text-white text-right p-2 my-2" id="CloseNav" style="position:absolute;right:5%"><i class="bi bi-x-lg ml-4 fs-3 fw-bold "></i></button>

                <p class="text-center  mb-0" style="margin-inline:auto">
                    <img src="../img/logo11-removebg-preview.png" alt="college_logo"  id="sideBarLogo">
                </p>
                
                <h3 class="p-1 text-center" id="alumni_name"></h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="home.php"><span class="material-symbols-outlined me-1">home</span> Home</a>
                </li>
                
                <li>
                    <a href="news.php"><span class="material-symbols-outlined me-1">newspaper</span> News</a>
                </li>
                <li>
                    <a href="alumni_directory.php"> <span class="material-symbols-outlined me-1">school</span> Alumni Directory</a>
                </li>
                <li>
                    <a href="professional_dev.php"> <span class="material-symbols-outlined me-1">emoji_events</span> Professional Development</a>
                </li>
                <li>
                    <a href="giving_back.php"><span class="material-symbols-outlined">volunteer_activism</span> Giving Back</a>
                </li>
            </ul>

            <ul class="list-unstyled components">
                <li>
                    <a href="profile.php"> <span class="material-symbols-outlined me-1">account_circle</span> Your Profile</a>
                </li>
                <li>
                    <a  href="#" id="logout_user_link"><span class="material-symbols-outlined me-1"> logout </span>Log out</a>
                </li>
               
            </ul>
        </nav>
      