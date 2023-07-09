<!--To handle the actions on navbar 1.php-->
<script>
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
  });

  

  //Handle and cancel button
</script>


<!-- Logout Confirmation Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal"  id="crossButton" aria-label="Close">
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
                
                <h3 class="p-1 text-center">Hrushikesh Sanjay Shinde</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="home.php"><span class="material-symbols-outlined me-1">home</span> Home</a>
                </li>
                
                <li>
                    <a href="#"><span class="material-symbols-outlined me-1">newspaper</span> News</a>
                </li>
                <li>
                    <a href="alumni_directory.php"> <span class="material-symbols-outlined me-1">school</span> Alumni Directory</a>
                </li>
                <li>
                    <a href="#"> <span class="material-symbols-outlined me-1">emoji_events</span> Professional Development</a>
                </li>
            </ul>

            <ul class="list-unstyled components">
                <li>
                    <a href="#"> <span class="material-symbols-outlined me-1">account_circle</span> Your Profile</a>
                </li>
                <li>
                    <a  href="#" id="logout_user_link"><span class="material-symbols-outlined me-1"> logout </span>Log out</a>
                </li>
               
            </ul>
        </nav>
        <!--
            was trying to logout the user when user clicks on the logout
        <script src="../js/logout.js"></script>
        href="destroy_session.php"
-->