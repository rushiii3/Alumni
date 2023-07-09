<?php
session_start();


if($_POST['login_success']=== 'true'){
    $_SESSION["isloggedin"]=true;
    echo "Login session variable set successfully";
}
else if($_SESSION["isloggedin"]===true){
    echo "user is already logged in";
}
else if($_POST['login_success']==='false'){
    $_SESSION["isloggedin"]=false;
    echo "login_success variable is false";
}





?>