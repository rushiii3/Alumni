<?php
session_start();
//$_SESSION['isloggedin']=true;
//$_SESSION['username']="abc12@gmail.com";
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
  <title>Alumni Directory</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/simplePagination.min.css">

  <script src="../js/navigation.js"></script>
  <link rel="stylesheet" href="../css/navigation.css">
  <link rel="stylesheet" href="../css/alumni_directory.css">

  <script src="../js/navigation.js"></script>
</head>

<body>
  <?php
  //include_once "loader.html";
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
        <div style="display: flex;flex-direction: row;justify-content: space-between;">
          <h1 class="mb-5" id="AD"> Alumni Directory</h1>
          <div class="ms-auto">
            <div class="search-box">
              <button class="btn-search"><i class="fas fa-search bi bi-search"></i></button>
              <input type="text" class="input-search" placeholder="Type to Search...">
            </div>
          </div>
          <div>
            <div class="btn-group dropstart">
              <button class="btn dropdown" data-bs-toggle="dropdown" aria-expanded="false" id="ListIconButton" type="button" style="border-right:0px;border-bottom:0px;"><i class="bi bi-filter fs-3"></i></button>

              <div class="dropdown-menu p-2 text-body-secondary" style="min-width: 200px;">

                <label for="admission_year" class="mb-2">Filter by admission year</label>
                <select class="form-select" id="admission_year">
                  <option value='ALL' selected>ALL</option>
                  <?php
                  for ($i = 1985; $i <= date('Y'); $i++) {
                    echo '<option value=' . $i . '>' . $i . '</option>';
                  }
                  ?>
                </select>

                <div class="my-3">
                  <label for="course" class="mb-2">Filter by admission year</label>
                  <select class="form-select" id="course">
                    <option value='ALL' selected>ALL</option>
                    <option value='BA'>BA</option>
                    <option value='BSC'>BSC</option>
                    <option value='BCOM'>BCOM</option>
                    <option value='BCOM-BI'>BCOM-BI</option>
                    <option value='BCOM-AF'>BCOM-AF</option>
                    <option value='BVoc'>BVoc</option>
                    <option value='BSC(IT)'>BSC(IT)</option>
                    <option value='BSC(BT)'>BSC(BT)</option>
                    <option value='BAMMC'>BAMMC</option>
                    <option value='BMS'>BMS</option>
                    <option value='MSC(IT)'>MSC(IT)</option>
                    <option value='MSC(BT)'>MSC(BT)</option>
                    <option value='MSC'>MSC</option>
                    <option value='MCOM'>MCOM</option>
                    <option value='Ph.D. Arts'>Ph.D. Arts</option>
                    <option value='Ph.D. Science'>Ph.D. Science</option>
                    <option value='PGDPCM'>PGDPCM</option>
                  </select>
                </div>

              </div>

              <!-- Dropdown menu links -->
            </div>
          </div>

        </div>

        <div class="container mt-2">
          <div class="row p-1">
            <?php
            $url = 'https://alumniandroidapp.000webhostapp.com/all_alumni_fetch.php'; // path to your JSON file
            $data = file_get_contents($url); // put the contents of the file into a variable

            if($data){
            $characters = json_decode($data); // decode the JSON feed
            $college_name="KET's V.G. Vaze College of Arts,Science and Commerce";
            ?>
            <?php
            foreach ($characters as $character) {
              if(($college_name==$character->bachelor_degree_college)){

            ?>
              <div class="col-lg-4 col-md-6 mb-5" id="card">
                <div class="card shadow p-1" style="width: auto;border-radius: 20px;">
                  <div class="card-body " style="height:14rem;">
                    <h5 class="card-title fw-bold" id="username"><?php echo $character->firstname . " " . $character->lastname; ?></h5>
                    <div class="d-flex align-items-center">
                    <p class="card-text text-muted mt-3" id="user_bachelor_course"><?php echo $character->bachelor_degree; ?>&nbsp;</p>
                    <p class="card-text text-muted"><span id="user_bachelor_admission_year"><?php echo $character->bachelor_admission_year; ?> </span> </p>
                    </div>
                    <?php
              }
             if(($college_name==$character->master_degree_college)){
                    //if($character->master_degree!=='' & $character->master_admission_year!=='' ){
                    ?>

                    <div class="d-flex align-items-center">
                    <p class="card-text text-muted mt-3" id="user_master_course"><?php echo $character->master_degree." "; ?>&nbsp;</p>
                    <p class="card-text text-muted"><span id="user_master_admission_year"><?php echo $character->master_admission_year; ?> </span> </p>
                    </div>
<?php
             }
?>

                    <p class="text-center <?php if(($college_name==$character->master_degree_college)){ }else{echo"mt-5"; } ?> ">
                      <a href="alumni_view_profile.php?id=<?php echo(str_rot13($character->username));
                      //echo($character->username); ?>" class="link text-center" style="color:#0099CC ">View Details</a>
                    </p>
                  </div>
                </div>
              </div>
            <?php
            }
            }
            else{
              echo "Please refresh or try again later";
            }
            ?>

          </div>
         <div class="d-flex justify-content-evenly">
            <div id="pagination"></div>
         </div>
          
         
          

        </div>
       
  </main>
  <script src="../js/alumni_directory.js"></script>
</body>

</html>