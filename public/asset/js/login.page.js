$('.register-btn').click((e) => {
    $('.btn-highliter').animate({right:'4%', left:'50%'}, 'fast');
    $('.register').css('color', 'white');
    $('.login').css('color', 'black');
    $('.register-form').animate({left:'0'}, 'slow');
    $('.login-form').animate({bottom:'-40rem'}, 'slow');
});

$('.login-btn').click((e) => {
    $('.btn-highliter').animate({left:'4%', right:'60%'}, 'fast');
    $('.login').css('color', 'white');
    $('.register').css('color', 'black');
    $('.register-form').animate({left:'-70rem'}, 'slow');
    $('.login-form').animate({bottom:'1.5rem'}, 'slow');
  });
