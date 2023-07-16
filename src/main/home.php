<?php
session_start();
$_SESSION['isloggedin']=true;
$_SESSION['username']="abc12@gmail.com";
if(!isset($_SESSION['isloggedin']) || !$_SESSION['isloggedin']){
    echo "<script> window.location.href='../main/login.php' </script>";
    exit;
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
    <title>Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    <script src="../js/navigation.js"></script>
    <!--<script src="../js/logout.js"></script>-->
   
    <link rel="stylesheet" href="../css/navigation.css">
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
            <h1>
Events
</h1>
<h3>
Upcoming Events
</h3>
<?php
$url = 'https://alumniandroidapp.000webhostapp.com/all_events_fetch.php'; // path to your JSON file
$data = file_get_contents($url); // put the contents of the file into a variable
$characters = json_decode($data); // decode the JSON feed
?>
<div class="container mt-4" style="height:100vh;">
        <div class="row p-1">

        <?php
        foreach ($characters as $character) {
            
            ?>
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="card shadow p-1" style="width: auto;border-radius: 20px;">
                    <div class="card-body ">
                        <h5 class="card-title fw-bold"><?php echo $character->event_name; ?></h5>
                        <p class="card-text " style="overflow: hidden;display:-webkit-box;-webkit-line-clamp: 3;line-clamp: 3; -webkit-box-orient: vertical;height:4.5rem"> <?php echo $character->event_description; ?>   </p>
                        <p class="card-text"> Date : <?php echo date("d F Y", strtotime($character->event_date)); ?></p>
                        <div class="mx-auto text-center">
                            <a href="view_events.php?id=<?php echo $character->event_id;  ?>" class="link text-center mx-2 my-2" style="color:#0099CC ">View Details</a>
                            <a href="<?php echo $character->event_registration_link; ?>" class="link text-center btn mx-2 my-2" style="background-color:#0099CC ">Register</a>

                        </div>
                    </div>
                </div>
            </div>
            
            <?php
            }
            
            ?>
        </div>
</div>
           
</main>
</body>
</html>