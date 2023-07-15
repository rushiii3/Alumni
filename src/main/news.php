<?php
session_start();
if(!isset($_SESSION['isloggedin'])){
  //echo "<script> window.location.href='../main/login.php' </script>";
  //exit;

}
else{
  if(!$_SESSION['isloggedin']){
    //echo "<script> window.location.href='../main/login.php' </script>";
    //exit;
  }
}


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
  
  <link rel="stylesheet" href="../css/navigation.css">
  <link rel="stylesheet" href="../css/news.css">
  <script src="../js/navigation.js"></script>
 
</head>
<body>
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
News
</h1>

<div class="container mt-2" style="height:100vh;">
          <div class="row p-1">
            <?php
            $url = 'https://alumniandroidapp.000webhostapp.com/all_news_fetch.php'; // path to your JSON file
            $data = file_get_contents($url); // put the contents of the file into a variable
            $characters = json_decode($data); // decode the JSON feed
            ?>
            <?php
        
            foreach ($characters as $character) {
              
            ?>
             <div class="col-lg-4 col-md-6 mb-5" id="card">
  <div class="card shadow p-1" style="width: auto; border-radius: 20px;">
    <div class="card-body">
     
        <h5 class="card-title fw-bold" id="news_title"><?php echo $character->news_title; ?></h5>
        
      <p class="card-text text-muted mt-3" id="news_for" hidden><?php echo $character->news_for_alumni_or_campus; ?></p>

      <p class="card-text text-muted mt-3" id="news_description"><?php echo $character->news_description; ?></p>
      
      
      
    </div>
  </div>
</div>

            <?php
              }
            
            ?>


<div class="bottom-navigation">
 
  <a href="#" class="navigation-item active">Alumni News</a>
  <a href="#" class="navigation-item">Campus News</a>
</div>


</div>
        </div>
         </main>
<script src="../js/news.js"></script>
</body>
</html>