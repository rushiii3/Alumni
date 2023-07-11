
      //1.adding an onclick listener to the sign up button
      var Signupbutton =document.getElementById("HomePageSignUpButton");
      Signupbutton.addEventListener('click',function(){
        window.location.href='../main/signup.php'
      });

    //2.adding an onclick listener to the sign in  button
    var Signinbutton =document.getElementById("HomePageLoginButton");
      Signinbutton.addEventListener('click',function(){
        window.location.href='../main/login.php'
      })