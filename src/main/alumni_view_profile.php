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
    <script type="text/javascript" src="https://platform.linkedin.com/badges/js/profile.js" async defer></script>
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

.profile-badge{
    width:100% !important;
    height:100% !important;
}
    </style>
</head>
<body class="bg-light">
    <?php
    //include_once "loader.html";
    ?>

    <main id="main">
    <?php
    $user_id = str_rot13($_GET['id']);
   
    if(empty($user_id)){
        echo("error");
    }
$url = 'https://vazecollege.net/ALUMNI/all_alumni_fetch.php'; 
//https://alumniandroidapp.000webhostapp.com/
//https://vazecollege.net/ALUMNI/
// path to your JSON file
$data = file_get_contents($url); // put the contents of the file into a variable

if($data){
$characters = json_decode($data); // decode the JSON feed
$flag = false;
foreach ($characters as $character) {
    
    if($character->username == $user_id)
    {
        $flag = true;
        ?>
         
        <div class="container  mt-5 mb-5  shadow mb-5 bg-body" id="container" style="overflow:auto;">
        <div class="row ">
            <div class="p-1 col-lg-6 col-md-6 ">
                
                <?php
                    
                    $url = $character->linkedin_profile;
                    
                    // Parse the URL to get its components
                    $urlComponents = parse_url($url);
                    
                    // Extract the path from the URL
                    $path = $urlComponents['path'];
                    
                    // Remove the leading and trailing slashes, if any
                    $path = trim($path, '/');
                    
                    // Split the path into an array using slashes as delimiters
                    $pathParts = explode('/', $path);
                    
                    // The last part of the path should contain the desired value
                    $LinkedinId = end($pathParts);
                    ?>
                <div class="d-flex justify-content-center align-items-center">
                    <div>
                        <div class="LI-profile-badge" data-version="v1" data-size="large" data-locale="en_US" data-type="vertical" data-theme="dark" data-vanity="<?php echo $LinkedinId ?>">
                    </div>
                </div>
               
                    
                </div> 

            </div>
            <div class="col-lg-6 col-md-6 bg-white my-5 p-4" id="Event_body">
                <h1 class="fw-bold">
                    <?php echo $character->firstname." ". $character->middlename." ".$character->lastname; ?>
                </h1>
                <div class=" rounded p-2 mt-5" style="background-color:#0099cb">
                    <p class="fs-3 fw-bold text-center">
                        Degree Details
                    </p>
                    <!-- Bachelor degree  -->
                    <div>
                            <p class="my-0">
                                Bachelors Degree
                            </p>
                            <p class="my-0">
                                <?php
                                        echo $character->bachelor_degree;
                                ?>
                            </p>
                            <p class="my-0">
                                Batch of 
                                <?php
                                    echo $character->bachelor_admission_year;
                                ?>
                            </p>
                            <p class="my-0">
                                <?php
                                echo($character->bachelor_degree_college);
                                ?>
                            </p>
                    </div>
                    <?php 
                        if($character->master_degree!=null){
                    ?>
                    <!-- Master Degree -->
                    <div class="mt-3">
                            <p class="my-0">
                                Master's Degree
                            </p>
                            <p class="my-0">
                                <?php
                                        echo $character->master_degree;
                                ?>
                            </p>
                            <p class="my-0">
                                Batch of 
                                <?php
                                    echo $character->master_admission_year;
                                ?>
                            </p>
                            <p class="my-0">
                                <?php
                                echo($character->master_degree_college);
                                ?>
                            </p>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                        <!-- Professional infoo -->
                        <?php
                            if($character->company!=null || $character->designation!=null || $character->company!="")
                            {
                        ?>
                <div class=" rounded p-2 mt-5" style="background-color:#0099cb">
                    <p class="fs-3 fw-bold text-center">
                        Professional Information
                    </p>
                    <!-- Bachelor degree  -->
                    <div>
                            <p class="my-0">
                                Company 
                            </p>
                            <p class="my-0">
                                <?php
                                        echo $character->company;
                                        
                                ?>
                            </p>
                            <p class="my-0">
                                    Designation
                            </p>
                            <p class="my-0">
                                <?php
                                        echo $character->designation;
                                        
                                ?>
                            </p>
                            
                    </div>
                </div>
                <?php
            }
        }
                ?>


            </div>
            
        </div>
    </div>
    <div id="info_inside">
                                        
    </div>
    <?php
       
    }
    if(!$flag){
        ?>
        <div class="d-flex justify-content-center">
            <img src="../img/UserNotExist.webp" class="img-fluid">
            
        </div>
        <p class="h2 text-center">User Doesn't Exist</p>
        <?php
    }
}else{
    echo "Please refresh or try again later";
}
?>

       
    </main>
</body>
</html>
<script>
    
        $profile = $('.LI-profile-badge iframe .profile-badge__content');
        $('#info_inside').html($profile);
        
	
    
</script>