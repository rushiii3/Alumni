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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    <script src="../js/alumni_directory.js"></script>
    <link rel="stylesheet" href="../css/navigation.css">
    <style>
    #SearchIconButton, #ListIconButton{
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    -ms-border-radius: 0px;
    -o-border-radius: 0px;
    border-radius: 0px;
    outline: none;
    border: none;

}
#SearchIconButton:active, #ListIconButton:active{
  border-style: outset;
  border: none;
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
        <button id="yes">yes</button>
            <!-- write all files here -->
            <div style="    display: flex;
    flex-direction: row;
    justify-content: space-between;">
                <h1 class="mb-5" id="AD"> Alumni Directory</h1>
                <div>
                <form class="d-flex" role="search">
        <input class="form-control me-2" style="outline: none;width:15rem"  type="search" placeholder="Search" aria-label="Search">
        
        <button class="btn" id="SearchIconButton" type="button"><i class="bi bi-search fs-3"></i></button>
        <button class="btn" id="ListIconButton" type="button"><i class="bi bi-filter fs-3"></i></button>

      </form>
                </div>
            </div>

<div class="container mt-2" style="height:100vh;">
        <div class="row p-1">
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="card shadow p-1" style="width: auto;border-radius: 20px;">
                    <div class="card-body ">
                        <h5 class="card-title fw-bold"><?php //echo($row_of_query['event_name']); ?>Hrushikesh Sanjay Shinde </h5>
                        <p class="card-text text-muted mt-3">BSC_IT</p>
                        <p class="card-text text-muted">BATCH of 2016</p>
                        <p class="text-center mb-0">
                            <a href="" class="link text-center" style="color:#0099CC ">View Details</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
</div>
           
</main>
</body>
</html>