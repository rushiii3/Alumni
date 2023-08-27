<?php
session_start();

if (!isset($_SESSION['isloggedin']) || !$_SESSION['isloggedin']) {
    echo "<script>window.location.href='../main/login.php'</script>";
    exit;
}

$pj_id = $_GET['pj_id'];
$posted_by = $company = $post = $years_of_experience = $contact_number = $contact_email = $description = $qualification = $status = "";
//$news_title=$_GET['news_title'];
//echo $id;

$url = "https://alumniandroidapp.000webhostapp.com/all_professional_job_fetch.php";
$data = file_get_contents($url);

if ($data) {
    $characters = json_decode($data);

    foreach ($characters as $character) {
        if ($character->id == $pj_id) {
            $posted_by = $character->username;
            $company = $character->company_name;
            $post = $character->post;
            $years_of_experience = $character->years_of_experience;
            $contact_number = $character->contact_number;
            $contact_email = $character->contact_email;
            $description = $character->description;
            $qualification = $character->qualification;
            $status = $character->status;
        }
    }
} else {
    echo "Please refresh or try again later";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>

    <title><?php echo $post . " in " . $company; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/simplePagination.min.css">

    <script src="../js/navigation.js"></script>
    <link rel="stylesheet" href="../css/navigation.css">

    <style>
        a:hover{
            color:#0099CC;
        }
        </style>

</head>

<body>
    <?php
    //include_once "loader.html";
    ?>
    <main id="main">
        <div class="container  my-auto  mt-5 mb-5 bg-body card shadow p-4 " style="border-radius:20px;" id="card">
            <div class="row">
                <div class="p-0 col-lg-6 col-md-6 mt-1">
                    <img src="../img/job_search_cropped.svg"  alt="" class="img-fluid h-100 w-100" />
                </div>

                <div class="col-lg-6 col-md-6 bg-white my-5 p-4">
                    <div class="heading text-center mb-5">
                        <h2 class="fw-bold">Job Details</h2>
                    </div>
                    <div class="row mt-5 justify-content-evenly">
                        <p class="fw-bold mb-3 col-md-8" style="font-size:25px;">
                            <?php if ($post !== "") {
                                echo $post;
                            } else {
                                echo "some error occured.Please try again later.";
                            } ?>
                        </p>

                        <p class="col-md-4 " style="text-align:right;color:green;font-size:20px;">
                            <?php echo "currently " . $status; ?>
                        </p>

                    </div>

                    <div class=" card-text text-muted mt-2">
                        <span class="material-symbols-outlined">
                            domain
                        </span> <?php echo $company; ?>
                    </div>

                    <div class=" card-text text-muted mt-2 ">
                        <span class="material-symbols-outlined">
                            business_center
                        </span> <?php echo "minimum " . $years_of_experience ." years of experience"; ?>
                    </div>
                    <div class=" card-text text-muted mt-2">
                        <span class="material-symbols-outlined">
                            call
                        </span> <a href="mailto:<?php echo $contact_email ?> " title="Send an Email"> <?php echo $contact_email ?></a> <?php echo "\n" . $contact_number; ?>
                    </div>

                    <hr />
                    <div class="mt-4">
                        <p class="fw-bold" style="font-size:20px;">Description</p>
                        <p id="p_desc">
                            <?php echo $description; ?>
                        </p>
                    </div>

                    <div class="mt-4">
                        <p class="fw-bold" style="font-size:20px;">Qualification</p>
                        <p id="p_qualification">
                            <?php echo $qualification; ?>
                        </p>
                    </div>

                </div>
            </div>

        </div>

    </main>

</body>

</html>