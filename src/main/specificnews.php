<?php

session_start();

if(!isset($_SESSION['isloggedin']) || !$_SESSION['isloggedin']){
    echo "<script>window.location.href='../main/login.php'</script>";
    exit;

}
$news_id= $_GET['news_id'];
$news_title=$_GET['news_title'];
//echo $id;

$url="https://vazecollege.net/ALUMNI/all_news_fetch.php";
//https://alumniandroidapp.000webhostapp.com/
$data=file_get_contents($url);

if($data){
$characters=json_decode($data);

foreach($characters as $character){
    if($character->news_id == $news_id){
        $news_description=$character->news_description;
    }
}
}else{
    echo "Please refresh or try again later";
}

//fetch the description


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    <?php
echo $news_title;
    ?>
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../css/specificnews.css"/>

</head>
<body>
    <?php
   include_once "loader.html";
    ?>
    <main id="main">
   <div class="container my-auto  mt-5 mb-5  shadow mb-5 bg-body" id="container">
        <div class="row">
            <div class="p-0 col-lg-6 col-md-6 mt-1">
                <img id="img" src="../img/image (2).png" alt="" class="img-fluid h-100 w-100"/>
            </div>
            <div class="col-lg-6 col-md-6 bg-white my-5 p-4" id="Event_body">
                <h1 class="fw-bold">
                    <?php echo $news_title; ?>
                </h1>

                <p style="word-wrap: break-word;">
                    <?php
echo $news_description;
                    ?>

                   </p>
            </div>
        </div>
    </div>
    </main>
</body>
</html>
