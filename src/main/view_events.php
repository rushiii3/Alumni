<?php
session_start();
if(!isset($_SESSION['isloggedin'])){
  echo "<script> window.location.href='../main/login.php' </script>";
  exit;

}
else{
  if(!$_SESSION['isloggedin']){
    echo "<script> window.location.href='../main/login.php' </script>";
    exit;
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
body{
    font-family: 'Poppins', sans-serif;
    font-weight:0;
}
        #container{
    border-radius: 20px;
}
        @media only screen and (min-width: 0em) {
    #container{
        width: 90%;
    }
    #img{
        border-radius:20px 20px 0px 0px;
    }
    
}
.material-symbols-outlined{
    vertical-align: middle;
}

/* Medium devices such as tablets (768px and up) */
@media only screen and (min-width: 48em) {
    #container{
        width: 75%;
    }
    #img{
        border-radius:20px 0px 0px 20px;
    }
}

    </style>
</head>
<body class="bg-light">
    <?php
    include_once "loader.html";
    ?>

    <main id="main">
    <?php
    $event_id = $_GET['id'];
    if(empty($event_id)){
        echo("error");
    }
$url = 'https://alumniandroidapp.000webhostapp.com/all_events_fetch.php'; // path to your JSON file
$data = file_get_contents($url); // put the contents of the file into a variable
if($data){
$characters = json_decode($data); // decode the JSON feed
foreach ($characters as $character) {
    if($character->event_id == $event_id)
    {
        $img = $character->event_image;
        ?>
        <div class="container my-auto  mt-5 mb-5  shadow mb-5 bg-body" id="container" style="overflow:auto;">
        <div class="row">
            <div class="p-0 col-lg-6 col-md-6 mt-1">
                <img id="img" src="<?php 
                if($img=="event image")
                { 
                    echo "../img/Beige 2 Image Polaroid Instagram Story.png"; 
                }else
                { 
                    echo"https://alumniandroidapp.000webhostapp.com/Event%20Posters/$img";
                } 
                ?>" alt="" class="img-fluid h-100 w-100"/>
            </div>
            <div class="col-lg-6 col-md-6 bg-white my-5 p-4" id="Event_body">
                <h1 class="fw-bold">
                    <?php echo $character->event_name; ?>
                </h1>
                <p class="mt-1">
                <span class="material-symbols-outlined">
date_range
</span>
                    <?php echo date("d F Y", strtotime($character->event_date)); ?>
                </p>
                <p class="mt-1">
                <span class="material-symbols-outlined">
schedule
</span>
                    <?php echo date("g:i A", strtotime($character->event_time)); ?>
                </p>
                <h4 class="my-2 fw-bold">
                    About the Event
                </h4>
                <p style="text-align:justify;word-wrap: break-word;">
                    <?php echo $character->event_description; ?>
                </p>
                <p class="text-center">
                    <a href="<?php echo $character->event_registration_link; ?>" class="link text-center btn mt-5 text-white w-50" style="background-color:#0099CC ">Register</a>
                </p>

            </div>
            
        </div>
    </div>
    <?php
        break;
    }else{
        

    }
}
}
else{
    echo "Please refresh or try again later";
}
?>

       
    </main>
</body>
</html>
