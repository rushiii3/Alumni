<?php
session_start();

if(isset($_SESSION['isloggedin'])){
    if($_SESSION['isloggedin']){
        $_SESSION['isloggedin']=false;
       
        echo "<script>
        window.location.href='../main/login.php'
        </script>";
        
        echo "logged out";
    }
    else{
        echo "user is not logged in";
    }
}

session_destroy();


?>