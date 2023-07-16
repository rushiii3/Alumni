
$(document).ready(function() {

    // pagination
    $(".row #card").slice(6).hide();
    var items = $(".row #card");
    var length_of_items = items.length;
    console.log(length_of_items);

    $('#pagination').pagination({
       
      // Total number of items present
      // in wrapper class
      items: length_of_items,

      // Items allowed on a single page
      itemsOnPage: 6, 

      onPageClick: function (noofele) {
        
          $(".row #card").hide().slice(6*(noofele-1),6+ 6* (noofele - 1)).show();
      }
  });



    $(".btn-search").on("mouseover", function() {
      $('#AD').hide();
    }).on("mouseenter", function() {
      $('#AD').hide();
    }).on("mouseout", function() {
      $('#AD').show();
    });
    $(".input-search").on("mouseover", function() {
      $('#AD').hide();
    }).on("mouseenter", function() {
      $('#AD').hide();
    }).on("mouseout", function() {
      $('#AD').show();
    });
  
    $('#admission_year').on('change', function() {
      filterAlumni();
    });
  
    $('#course').on('change', function() {
      filterAlumni();
    });
  
    $('.input-search').on('input', function() {
      var x = document.querySelectorAll("#username");
      var card = document.querySelectorAll("#card");
      var input = $('.input-search').val();
      var filter = input.toUpperCase();
      console.log(filter);
      for (var i = 0; i < x.length; i++) {
        var txtValue = x[i].innerText.toUpperCase();
        if (txtValue.indexOf(filter) > -1) {
          card[i].style.display = "";
        } else {
          card[i].style.display = "none";
        }
      }
    });
  });
  
  function filterAlumni() {
    var admission_year_selected = $('#admission_year').val();
    var course_selected = $('#course').val();

    var all_users_bachelor_admission_years = document.querySelectorAll("#user_bachelor_admission_year");
    var all_users_bachelor_courses = document.querySelectorAll("#user_bachelor_course");

    var all_users_master_admission_years = document.querySelectorAll("#user_master_admission_year");
    var all_users_master_courses = document.querySelectorAll("#user_master_course");

    var card = document.querySelectorAll("#card");
    for (var i = 0; i < all_users_bachelor_admission_years.length; i++) {
        //get each alumni
      var current_user_bachelor_admission_year = all_users_bachelor_admission_years[i].innerText.toUpperCase();
      var current_user_bachelor_course = all_users_bachelor_courses[i].innerText.toUpperCase();

      var current_user_master_admission_year = all_users_master_admission_years[i].innerText.toUpperCase();
      var current_user_master_course = all_users_master_courses[i].innerText.toUpperCase();
  

      if (admission_year_selected.includes("ALL") && course_selected.includes("ALL")) {
        card[i].style.display = "";
      } 
      
      
       //2.if only course is selected as "ALL"
      else if (course_selected.includes("ALL")) {
        if (current_user_bachelor_admission_year.includes(admission_year_selected) || current_user_master_admission_year.includes(admission_year_selected) ) {  // compare the college names as well
          card[i].style.display = "";
        } else {
          card[i].style.display = "none";
        }
      } 
      
      //3.if only admission year is selected as "ALL"
      else if (admission_year_selected.includes("ALL")) {
        if (current_user_bachelor_course.includes(course_selected) || current_user_master_course.includes(course_selected)) {
          card[i].style.display = "";
        } else {
          card[i].style.display = "none";
        }
      } 
      
      else {
        if ((current_user_bachelor_admission_year.includes(admission_year_selected) & current_user_bachelor_course.includes(course_selected)) || (current_user_master_admission_year.includes(admission_year_selected) & current_user_master_course.includes(course_selected))) {
          card[i].style.display = "";
        } else {
          card[i].style.display = "none";
        }
      }
    }
  }
  