//FIND THE TAGS AND INTIALIZE GLOBAL VARIABLES
let username_input= document.getElementById("email");
let password_input= document.getElementById("password");
let login_button=document.getElementById("submit_btn");
let login_form=document.getElementById("login_form");
let failed_modal=document.getElementById("failed_modal");

let feedback_email=document.getElementById("feedback_emailVerify");
let feedback_password=document.getElementById("feedback_password");
let feedback_password_valid=document.getElementById("feedback_password_valid");


let entered_username="",entered_password="";

let login_failed_message_para=document.getElementById("login_failed_message");

//Password hide and unhide 

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

//FUNCTIONS
//1.login user
function loginUser(){

     var username=entered_username.trim();
     var password=entered_password.trim();

     var formData={
          "username":username,
          "password":password
     };

     $.ajax({
          url: "https://alumniandroidapp.000webhostapp.com/user_login.php", // PHP file to handle the form data
          type: "POST", // HTTP method (POST in this case)
          data: formData, // Form data object
          dataType: 'text', // Expected data type of the response
          success: function(response) {
            if (response.includes("Username doesnt exist")) {
               
              feedback_email.innerText="This username isn't registered with us.";
              username_input.classList.add("is-invalid");

             
              is_email_verified = false;
            } 
            else if (response.includes("Invalid password")) {
               feedback_password.innerText="Invalid password";
               password_input.classList.add("is-invalid");
              //failed_modal.ariaHidden=false;

            } 
            else if (response.includes("login successful")) {

               
              //alert("Yayyy! Login successful");
              username_input.classList.remove("is-invalid");
              password_input.classList.remove("is-invalid");
              setLoginSessionVar();
              failed_modal.ariaHidden=true;
              window.location.href="../main/home.php";
            } 
            else {
               login_failed_message_para.innerHTML="<strong>Login was not successful. Sorry! Please try again later</strong>"
               $('#login_failed_modal').modal('show'); //show the login failed modal
              //alert("Sorry! Please try again later");
            }
            console.log(response); // Display the response from the PHP file
          },
          error: function(xhr, status, error) {
            // Handle the error
            login_failed_message_para.innerHTML="<strong>Oops! An unexpected error occured.Please try again later</strong>"
            $('#login_failed_modal').modal('show'); //show the login failed modal

            //alert("Oops! There was some error occured.Please try again later")
            console.error("Request failed. Status: " + status + ". Error: " + error);
          }
        });
      }

      //2.validate the form when user clicks on submit
      function validateLoginForm(){
          if(username_input.value===''){
               username_input.dispatchEvent(new Event("input"));
               return false;
          }
          else if(password_input.value===''){
               password_input.dispatchEvent(new Event("input"));
               return false;
          }
          else if(username_input.classList.contains("is-invalid")){
               username_input.dispatchEvent(new Event("input"));
               return false;
          }
          else if(password_input.classList.contains("is-invalid")){
               password_input.dispatchEvent(new Event("input"));
               return false;
          }
          else{
               username_input.classList.remove("is-invalid");
               password_input.classList.remove("is-invalid");
               return true;
          }
      }

      //3.set the session as logged in
      function setLoginSessionVar(){
          $.ajax({
               url: "../main/set_session.php", // PHP file to handle the form data
          type: "POST", // HTTP method (POST in this case)
          data: {"login_success":"true"}, // Form data object
          dataType: 'text', // Expected data type of the response
          success: function(response) {
               if(response.includes("Login session variable set successfully")){
                    console.log("session variable set successfully");
               }
               else{
                    login_failed_message_para.innerHTML="<strong>Oops! An unexpected error occured.Please try again later</strong>"
            $('#login_failed_modal').modal('show'); //show the login failed modal
                    console.log("Some issue occurred while setting the session variable"+response);
               }
            console.log(response); // Display the response from the PHP file
          },
          error: function(xhr, status, error) {
            // Handle the error
           
            console.log("JAX Error while setting the session variable");
            console.error("Request failed. Status: " + status + ". Error: " + error);
          }

          })
      }
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//OTHER LISTENERS
//1.when the document is ready
document.addEventListener("DOMContentLoaded",function(){

     login_form.addEventListener("submit",function(e){
          e.preventDefault();
          if(validateLoginForm()){
               loginUser();
          }
          
         
     })

})

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//VALIDATION WHEN THE USER IS TYPING
//1.email validation
username_input.addEventListener("input",function(){
     var emailRegex=/^[^\s@]+@[^\s@]+\.[^\s@]+$/;
     var entering_email=username_input.value;

     if(!emailRegex.test(entering_email)){
          //login_button.disabled=true;

          //set the message
          feedback_email.innerText="Please enter a valid email";
          username_input.classList.add("is-invalid");

     }
     else{
          //remove the error and enable the button
          username_input.classList.remove("is-invalid");
          entered_username=entering_email.trim();
          //login_button.disabled=false;
     }
})

//2.password validation

password_input.addEventListener("input",function(){
     var passwordRegex=/^(?=.*\d)(?=.*[a-zA-Z])(?=.*[A-Z]).+$/;
     var entering_password=password_input.value;

     if(entering_password.length <8 ){

          //set the message and display the error
          feedback_password.innerText="Password should be minimum of minimum 8 characters";
          password_input.classList.add("is-invalid");
          login_button.disabled=true;

     }
     else if(!passwordRegex.test(entering_password)){
//set the message and display the error
          feedback_password.innerText="Password contains one digit and one uppercase alphabet";
          password_input.classList.add("is-invalid");
          login_button.disabled=true;
     }
     else{
          password_input.classList.remove("is-invalid");
          entered_password=entering_password;
          login_button.disabled=false;
     }

})


