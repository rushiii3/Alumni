$(document).ready(function(){
    $('#Scholarship_awards_page').hide();
    $('#Intership_jobs_page').hide();
    $('#Accolades_you_page').hide();
    //show scholarship page
    $('.Scholarship_awards').on('click',function(){
        $('#section_name').text("Scholarship & awards");
        $('#Scholarship_awards_page').show();
        $('#Intership_jobs_page').hide();
        $('#Accolades_you_page').hide();
    })
    // show intership page
    $('.Intership_jobs').on('click',function(){
        $('#section_name').text("Intership & jobs");
        $('#Intership_jobs_page').show();
        $('#Scholarship_awards_page').hide();
        $('#Accolades_you_page').hide();
    })

    $('.Accolades_you').on('click',function(){
        $('#section_name').text("Accolades & you");
        $('#Intership_jobs_page').hide();
        $('#Scholarship_awards_page').hide();
        $('#Accolades_you_page').show();
    })                                     

    $('.Scholarship_awards').click();
})