
    $page1 = $('#page1');
    $page2 = $('#page2');
    $page3 = $('#page3');
    $page4 = $('#page4');
    $page5 = $('#page5');
    $page2.hide();
    $page3.hide();
    $page4.hide();
    $page5.hide();
    $step = $('.stepper-item');
    $step.eq(0).addClass("active");
    $('.pass_open_eye').hide();
    $('.cpass_open_eye').hide();
    $('.pass_icon').on('click',function(){
        if('password' == $('#password').attr('type')){
            $('#password').prop('type', 'text');
            $('.pass_open_eye').show();
            $('.pass_close_eye').hide();
    
       }else{
            $('#password').prop('type', 'password');
            $('.pass_open_eye').hide();
            $('.pass_close_eye').show();
       }
    })
    $('.confirm_pass_icon').on('click',function(){
        if('password' == $('#confirm_password').attr('type')){
            $('#confirm_password').prop('type', 'text');
            $('.cpass_open_eye').show();
            $('.cpass_close_eye').hide();
    
       }else{
            $('#confirm_password').prop('type', 'password');
            $('.cpass_open_eye').hide();
            $('.cpass_close_eye').show();
       }
    })
$('#next_page_2').on('click',function(){
    $page1.fadeOut();
    $page1.hide();
    $page2.fadeIn();
    $page2.show();
    $step.eq(0).removeClass("active");
    $step.eq(0).addClass("completed");
    $step.eq(1).addClass("active");
})
$('#next_page_3').on('click',function(){
    $page2.fadeOut();
    $page2.hide();
    $page3.fadeIn();
    $page3.show();
    $step.eq(1).removeClass("active");
    $step.eq(1).addClass("completed");
    $step.eq(2).addClass("active");
})
$('#next_page_4').on('click',function(){
    $page3.fadeOut();
    $page3.hide();
    $page4.fadeIn();
    $page4.show();
    $step.eq(2).removeClass("active");
    $step.eq(2).addClass("completed");
    $step.eq(3).addClass("active");
})
$('#next_page_5').on('click',function(){
    $page4.fadeOut();
    $page4.hide();
    $page5.fadeIn();
    $page5.show();
    $step.eq(3).removeClass("active");
    $step.eq(3).addClass("completed");
    $step.eq(4).addClass("active");
})

$('#previous_page_1').on('click',function(){
    $step.eq(0).addClass("active");
    $step.eq(1).removeClass("active");
    $page2.fadeOut();
    $page2.hide();
    $page1.fadeIn();
    $page1.show();
})
$('#previous_page_2').on('click',function(){
    $step.eq(1).addClass("active");
    $step.eq(2).removeClass("active");
    $page3.fadeOut();
    $page3.hide();
    $page2.fadeIn();
    $page2.show();
})
$('#previous_page_3').on('click',function(){
    $step.eq(2).addClass("active");
    $step.eq(3).removeClass("active");
    $page4.fadeOut();
    $page4.hide();
    $page3.fadeIn();
    $page3.show();
})
$('#previous_page_4').on('click',function(){
    $step.eq(3).addClass("active");
    $step.eq(4).removeClass("active");
    $page5.fadeOut();
    $page5.hide();
    $page4.fadeIn();
    $page4.show();
})