<?php
session_start();
$_SESSION['isloggedin']=true;
$_SESSION['username']="abc12@gmail.com";
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
  <meta charset="UTF-8">
  <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Professional Development</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
  
  <link rel="stylesheet" href="../css/navigation.css">
  <link rel="stylesheet" href="../css/alumni_directory.css">

  <script src="../js/navigation.js"></script>
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
         <h1>
Professional Development
</h1>

<div class="container mt-2" style="height:100vh;">
          <div class="row p-1">
            <?php
            $url = 'https://alumniandroidapp.000webhostapp.com/all_professional_job_fetch.php'; // path to your JSON file
            $data = file_get_contents($url); // put the contents of the file into a variable
            $characters = json_decode($data); // decode the JSON feed
            ?>
            <?php
            foreach ($characters as $character) {
              
            ?>
             <div class="col-lg-4 col-md-6 mb-5 mt-4" id="card">
  <div class="card shadow p-1" style="width: auto; border-radius: 20px;">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
        <h5 class="card-title fw-bold" id="job_title"><?php echo $character->post; ?></h5>
        <p class="card-text" id="job_status"><?php echo $character->status; ?></p>
      </div>
      <p class="card-text text-muted mt-3" id="job_company"><?php echo $character->company_name; ?></p>
      <p class="card-text text-muted">
        <span id="job_experience"><?php echo "minimum " . $character->years_of_experience." years"; ?></span>
      </p>
      <p class="text-center mb-0">
        <a href="#" class="link text-center" style="color:#0099CC ">View Details</a>
      </p>
    </div>
  </div>
</div>

            <?php
              }
            
            ?>



</div>
        </div>
            </div>
            </div>
        <?php
include "footer.php"
?>
         </main>
  <script src="../js/professional_dev.js"></script>
</body>

</html>