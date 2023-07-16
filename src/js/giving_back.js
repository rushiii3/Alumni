$(document).ready(function () {
  /*-----------------------------------------
bottom navigation logic
    ---------------------------------------------------*/

  $("#Scholarship_awards_page").hide();
  $("#Internship_jobs_page").hide();
  $("#Accolades_you_page").hide();
  //show scholarship page
  $(".Scholarship_awards").on("click", function () {
    $("#section_name").text("Scholarship & awards");
    $("#Scholarship_awards_page").show();
    $("#Internship_jobs_page").hide();
    $("#Accolades_you_page").hide();
  });
  // show Internship page
  $(".Internship_jobs").on("click", function () {
    $("#section_name").text("Internship & jobs");
    $("#Internship_jobs_page").show();
    $("#Scholarship_awards_page").hide();
    $("#Accolades_you_page").hide();
  });

  $(".Accolades_you").on("click", function () {
    $("#section_name").text("Accolades by you");
    $("#Accolades_you_page").show();
    $("#Internship_jobs_page").hide();
    $("#Scholarship_awards_page").hide();
  });

  //by default select scholarship awards
  $(".Scholarship_awards").click();

  //-------------------------------------------------------------------
  //GLOBAL Variables


  //---------------------------------------------------------------------------------------------------
  //FUNCTIONS

  //------------------------------------------------------------------------------------------------
  //VALIDATION WHEN USER IS TYPING
});
