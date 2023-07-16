<?php
session_start();
$_SESSION['isloggedin']=true;
$_SESSION['username']="chocolateassignment68@gmail.com";
/*
if(!isset($_SESSION['isloggedin']) || !$_SESSION['isloggedin']){
    echo "<script> window.location.href='../main/login.php' </script>";
    exit;
}
*/


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    <script src="../js/navigation.js"></script>
    <script src="../js/giving_back.js"></script>
   
    <link rel="stylesheet" href="../css/navigation.css">
    <style>
/* MOBILE DEVICES */
@media only screen and (min-width: 0em) {
    #down_navigation{
        width: 90%;
    }
}

/* Medium devices such as tablets (768px and up) */
@media only screen and (min-width: 48em) {
    #down_navigation{
        width: 75%;
    }
}
    </style>
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
            <!-- write all files here -->
            <!-- page name -->
            <h1>
                    Giving Back
            </h1>
            <!-- section name -->
            <h3 id="section_name">
            
            </h3>

            <!-- Scholarship_awards page -->
            <div id="Scholarship_awards_page">
                <p>
                    Hello
                </p>
            </div>

            <!-- Intership_jobs page -->
            <div id="Intership_jobs_page">
                <p>
                    Hi
                </p>
            </div>


    <!-- Accolades_you page -->
            <div id="Accolades_you_page">
                    <p>
                        Byee
                    </p>
            </div>


<!-- Bottom navigation -->
<div class="position-fixed bottom-0 bg-white d-flex justify-content-evenly py-1" id="down_navigation">
        <button type="button" class="text-center mx-2 btn Scholarship_awards">
          <span class="material-symbols-outlined">
            social_leaderboard
            </span>
            <br />
            Scholarship & awards
        </button>
        
        <button type="button" class="text-center mx-2 btn Intership_jobs">
          <span class="material-symbols-outlined">
            card_travel
            </span>
            <br />
            Internship & jobs
        </button>

        <button type="button" class="text-center mx-2 btn Accolades_you">
          <span class="material-symbols-outlined">
            card_travel
            </span>
            <br />
            Accolades by you
        </button>
       
    </div>
</div>
</main>
</body>
</html>