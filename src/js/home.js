 //when clicked on navigation tab
 $('#past').hide();
    $('.navigation-item').on('click',function(){
      
      $('.navigation-item').removeClass('active');
      $(this).addClass('active');

      var selectedItem = $(this).text();
      console.log(selectedItem);
      console.log(selectedItem.includes('Upcoming Events'));
      
      if (selectedItem.includes('Upcoming Events')) {
          
        // Load campus news content
        // ...
        $('#heading').text("Upcoming Events");
        // displayNews("campus");
        $('#upcoming').show();
        $('#past').hide();


      } else if (selectedItem.includes('Past Events')) {
        // Load alumni news content
        // ...
        $('#heading').text("Past Events");
        $('#upcoming').hide();
        $('#past').show();
        // displayNews("alumni");
      }

    })
    

  