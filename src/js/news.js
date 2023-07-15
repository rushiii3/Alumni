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
      displayNews("alumni");


    //when clicked on navigation tab
    $('.navigation-item').click(function(e) {
      e.preventDefault();
      $('.navigation-item').removeClass('active');
      $(this).addClass('active');
  
      // Load the respective news content based on the selected navigation item
      var selectedItem = $(this).text();
      if (selectedItem === 'Campus News') {
        // Load campus news content
        // ...
        displayNews("campus");


      } else if (selectedItem === 'Alumni News') {
        // Load alumni news content
        // ...
        displayNews("alumni");
      }
    });
  });
  