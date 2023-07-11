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




.wrap{
  right: 10%;
  position: absolute;
  width: 0px;
  height: 55px;
  line-height: 55px;
  padding-right: 55px;
  border-radius: 5px;
  transition: all 0.5s ease;
}

.input{
  border: 0;
  width: 0%;
  outline: none;
  color: black;
  transition: all 0.3s ease;
  position: relative;
}

.wrap .fa{
  color: #fff;
  /* position: absolute; */
  right: 17px;
  top: 15px;
  font-size: 22px;
  cursor: pointer;
}

.wrap.active{
  width: 250px;
  padding-left: 25px;
  transition: all 0.5s ease;
}

.input.active{
  width: 98%;
  padding-left: 5px;
  transition: all 0.5s 0.8s ease;
}

input::placeholder {
  color: #fff;
}


*{
  box-sizing: border-box;
}

.search-box{
  width: fit-content;
  height: fit-content;
  position: relative;
}
.input-search{
  height: 50px;
  width: 50px;
  border-style: none;
  padding: 10px;
  font-size: 18px;
  letter-spacing: 2px;
  outline: none;
  border-radius: 25px;
  transition: all .5s ease-in-out;
  background-color: black;
  padding-right: 40px;
  color:black;
}
.input-search::placeholder{
  color:black;
  font-size: 18px;
  letter-spacing: 2px;
  font-weight: 100;
}
.btn-search{
  width: 50px;
  height: 50px;
  border-style: none;
  font-size: 20px;
  font-weight: bold;
  outline: none;
  cursor: pointer;
  border-radius: 50%;
  position: absolute;
  right: 0px;
  color:#ffffff ;
  background-color:transparent;
  pointer-events: painted;  
}
.btn-search:focus ~ .input-search{
  width: 300px;
  border-radius: 0px;
  background-color: transparent;
  border-bottom:1px solid rgba(255,255,255,.5);
  transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
}
.input-search:focus{
  width: 300px;
  border-radius: 0px;
  background-color: transparent;
  border-bottom:1px solid rgba(255,255,255,.5);
  transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
}






    </style>
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
                        <button  class="btn dropdown" data-bs-toggle="dropdown" aria-expanded="false" id="ListIconButton" type="button" style="border-right:0px;border-bottom:0px;"><i class="bi bi-filter fs-3"></i></button>
                       
                        <div class="dropdown-menu p-2 text-body-secondary" style="min-width: 200px;">
                          
                                <label for="admission_year" class="mb-2">Filter by admission year</label>
                                <select class="form-select" id="admission_year">
                                <option value='ALL' selected>ALL</option>
                                      <?php
                                          for($i=1985;$i<=date('Y');$i++)
                                          {
                                              echo '<option value='.$i.'>'.$i.'</option>';
                                              
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

<div class="container mt-2" style="height:100vh;">
        <div class="row p-1">
          <?php
            $url = 'https://alumniandroidapp.000webhostapp.com/all_alumni_fetch.php'; // path to your JSON file
            $data = file_get_contents($url); // put the contents of the file into a variable
            $characters = json_decode($data); // decode the JSON feed
          ?>
           <?php
        foreach ($characters as $character) {
            
            ?>
            <div class="col-lg-4 col-md-6 mb-5" id="card">
                <div class="card shadow p-1" style="width: auto;border-radius: 20px;">
                    <div class="card-body ">
                        <h5 class="card-title fw-bold" id="username"><?php echo $character->firstname." ". $character->lastname  ; ?></h5>
                        <p class="card-text text-muted mt-3" id="user_course"><?php echo $character->bachelor_degree ?> </p>
                        <p class="card-text text-muted">Batch of <span id="batch_year"><?php echo $character->bachelor_admission_year; ?>  </span> </p>
                        <p class="text-center mb-0">
                            <a href="" class="link text-center" style="color:#0099CC ">View Details</a>
                        </p>
                    </div>
                </div>
            </div>
            <?php
        }
            ?>

        </div>
</div>
           <script>

$(document).ready(function(){
  $( ".btn-search" ).on( "mouseover", function() {
    $('#AD').hide();
  } ).on( "mouseenter", function() {
    $('#AD').hide();
  } ).on( "mouseout", function() {
    $('#AD').show();
  } );
  $( ".input-search" ).on( "mouseover", function() {
    $('#AD').hide();
  } ).on( "mouseenter", function() {
    $('#AD').hide();
  } ).on( "mouseout", function() {
    $('#AD').show();
  } );

$('#admission_year').on('change',function(){
  var admission = $('#admission_year').val();
  card = document.querySelectorAll("#card");
  x = document.querySelectorAll("#batch_year");
  for (i = 0; i < x.length; i++) {
    txtValue = x[i].innerText;
    if(admission==="ALL")
    {
      card[i].style.display = "";
    }else{
      if (txtValue.indexOf(admission) > -1) {
      card[i].style.display = "";
    }else {
      card[i].style.display = "none";
    }
    }
    
  }
});



$('#course').on('change',function(){
  var course = $('#course').val();
  card = document.querySelectorAll("#card");
  x = document.querySelectorAll("#user_course");
  for (i = 0; i < x.length; i++) {
    txtValue = x[i].innerText;
    if(course==="ALL")
    {
      card[i].style.display = "";
    }else{
      if (txtValue.indexOf(course) > -1) {
      card[i].style.display = "";
    }else {
      card[i].style.display = "none";
    }
    }
    
  }
});

  $('.input-search').on('input',function(){
    x = document.querySelectorAll("#username");
    card = document.querySelectorAll("#card");
    input = $('.input-search').val();
    filter = input.toUpperCase();
    console.log(filter);
for (i = 0; i < x.length; i++) {
  txtValue = x[i].innerText.toUpperCase();
  //console.log(txtValue);
  if (txtValue.indexOf(filter) > -1) {
    card[i].style.display = "";
    } else {
      card[i].style.display = "none";
    }
}

  });
})
 

            </script>
</main>
</body>
</html>