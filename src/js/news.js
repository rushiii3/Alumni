$(document).ready(function() {

   function displayNews(newsToDisplay) {
  // Hide all news items initially
  $('[id^="card"]').hide();

  if (newsToDisplay.includes("campus")) {
    // Show campus news
    $('[id^="card"]').each(function() {
      if ($(this).find('#news_for').text().includes("campus")) {
        $(this).show();
      }
    });
  } else if (newsToDisplay.includes("alumni")) {
    // Show alumni news
    $('[id^="card"]').each(function() {
      if ($(this).find('#news_for').text().includes("alumni")) {
        $(this).show();
      }
    });
  }
}
      

      //load the alumni news first
      $('#heading').text("Alumni news");
      displayNews("alumni");


    //when clicked on navigation tab
    $('.navigation-item').on('click',function(){
      
      $('.navigation-item').removeClass('active');
      $(this).addClass('active');

      var selectedItem = $(this).text();
      if (selectedItem.includes('Campus news')) {
        // Load campus news content
        // ...
        $('#heading').text("Campus news");
        displayNews("campus");


      } else if (selectedItem.includes('Alumni news')) {
        // Load alumni news content
        // ...
        $('#heading').text("Alumni news");
        displayNews("alumni");
      }

    })
    
  });
  