//GLOBAL VARIABLES
let logout_hyperlink_navbar1=document.getElementById("logout_user_link");


//------------------------------------------------------------------------------------------------------------------------------------------------------------
//FUNCTIONS
//1.Prevent the user from going back
/*
function preventBack() { window.history.forward(); }
setTimeout("preventBack()", 0);
window.onunload = function () { null };
*/

//2.Logout the user
function logoutUser() {
    $.ajax({
      url: "../main/destroy_session.php", // PHP file to handle the logout logic
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

  //-----------------------------------------------------------------------------------------------------------------------------------------------------------
  //OTHER LISTENERS
 



  
  

  