<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
      @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
body {
    font-family: 'Poppins', sans-serif;
    background: #fafafa;
}
#navBarLogo{
    filter: brightness(0%);
    height:2rem; 
    -webkit-transform: scale(1.5);
    -moz-transform: scale(2.5);
    -o-transform: scale(2.5);
    -ms-transform: scale(2.5);
    transform: scale(2.5);
}
      #mySidebar{
        height:100%;
        width:200px;
        background-color:#fff;
         position:fixed!important; 
        z-index:1;
        overflow:hidden;

    }
       /* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
  #mySidebar{
      width:100%;
      display: none;
    }
    .pageHalfWidth{
      margin-left:0%
    }
    #CloseButton{
      display: block;
    }
}
/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {
  #mySidebar{
      width:100%;
      display: none;
    }
    .pageHalfWidth{
      margin-left:0%
    }
    #CloseButton{
      display: block;
    }
}
/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
  #navButton{
        display:none;
    }
    #mySidebar{
      width:20%;
      left:0;
      display: block;
    }
    .pageHalfWidth{
      margin-left:20%
    }
    #CloseButton{
      display: none;
    }
}
/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 992px) {
  #navButton{
        display:none;
    }
    #mySidebar{
      width:20%;
      left:0;
      display: block;
    }
    .pageHalfWidth{
      margin-left:20%
    }
    #CloseButton{
      display: none;
    }
}
/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {
  #navButton{
        display:none;
    }
    #mySidebar{
      width:20%;
      left:0;
      display: block;
    }
    #CloseButton{
      display: none;
    }
    .pageHalfWidth{
      margin-left:20%;
    }
}

#sideBarLogo{
    text-align: center;
    -webkit-transform: scale(1.5);
    -moz-transform: scale(1.5);
    -o-transform: scale(1.5);
    -ms-transform: scale(1.5);
    transform: scale(1.5);
    margin-inline: auto;
    height:10rem;
}

.material-symbols-outlined{
    vertical-align: middle;
}
    </style>
</head>
<body>

<!-- Sidebar -->
<div class=" w3-bar-block w3-border-right"  id="mySidebar"  style=" background: #0099CC ; color: #fff; transition: all 0.3s;">
  <button onclick="w3_close()" class="w3-bar-item w3-large" id="CloseButton">Close &times;</button>
  <div class="mx-auto">
              
            <p class="text-center  mb-0" style="margin-inline:auto">
                <img src="../img/logo11-removebg-preview.png" alt="college_logo"  id="sideBarLogo">
            </p>
            
            <h3 class="p-1 text-center" id="alumni_name">HrushiKesh Sanjay Shinde</h3>
        </div>
  <a href="home.php" class="w3-bar-item w3-button"><span class="material-symbols-outlined me-1">home</span> Home</a>
  <a href="news.php" class="w3-bar-item w3-button"><span class="material-symbols-outlined me-1">newspaper</span> News</a>
  <a href="alumni_directory.php" class="w3-bar-item w3-button"> <span class="material-symbols-outlined me-1">school</span> Alumni Directory</a>
  <a href="professional_dev.php" class="w3-bar-item w3-button"> <span class="material-symbols-outlined me-1">emoji_events</span> Professional Development</a>
  <a href="giving_back.php" class="w3-bar-item w3-button"><span class="material-symbols-outlined">volunteer_activism</span> Giving Back</a>

  <hr>

  <a href="profile.php" class="w3-bar-item w3-button"> <span class="material-symbols-outlined me-1">account_circle</span> Your Profile</a>

  <a  href="#" class="w3-bar-item w3-button" id="logout_user_link"><span class="material-symbols-outlined me-1"> logout </span>Log out</a>

  
</div>

<!-- navigation 2 -->
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navButton">
                <div class="container">
                <a class="navbar-brand" href="../main/home.php">
                <img src="../img/logo11-removebg-preview.png" alt="college_logo" id="navBarLogo">
                    </a>
                    <button type="button" onclick="w3_open()"  class="btn btn-dark  ml-auto">
                    <i class="bi bi-list"></i>
                    </button>
            </nav>

<div class="w3-teal" id="navButton">
<a class="navbar-brand ml-3" href="../main/home.php">
                <img src="../img/logo11-removebg-preview.png" alt="college_logo" id="navBarLogo">
                    </a>
  <button class="w3-button w3-teal w3-xlarge"  onclick="w3_open()">☰</button>
</div>




<!-- Page Content -->
<div  id="pageContent" class="pageHalfWidth">
    <div class="container-fluid" style="min-height:100svh;">
    hello
    </div>
    <?php
    include "footer.php"
    ?>
</div>









<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  var element = document.getElementById("pageContent");
  element.classList.remove("pageHalfWidth");
}
</script>
     
  
</body>
</html>