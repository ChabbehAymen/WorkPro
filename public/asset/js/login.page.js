$('.register-btn').click((e) => {
    $('.btn-highliter').animate({right: '4%', left: '50%'}, 'fast');
    $('.register').css('color', 'white');
    $('.login').css('color', 'black');
    $('.register-form').animate({left: '0'}, 'slow');
    $('.login-form').animate({bottom: '-40rem'}, 'slow');
});

$('.login-btn').click((e) => {
    $('.btn-highliter').animate({left: '4%', right: '60%'}, 'fast');
    $('.login').css('color', 'white');
    $('.register').css('color', 'black');
    $('.register-form').animate({left: '-70rem'}, 'slow');
    $('.login-form').animate({bottom: '1.5rem'}, 'slow');
});

// Login Validation
emailPasswordInputsValidation('login-form');


// Registration Validation

emailPasswordInputsValidation('register-form')
$('.register-form #user_name').on('input', (e) => {
    if (e.target.value === '') $('.error-text').text('');
    else if (e.target.value.length < 4) $('.error-text').text('Please Enter a Valid Name');
    else $('.error-text').text('');
});


function emailPasswordInputsValidation(form) {
    $(`.${form} #email`).on('input', (e) => {
        if (e.target.value === '') $(`.${form} .error-text`).text('');
        else if (!e.target.value.includes('@') || !e.target.value.includes('.')) {
            $(`.${form} .error-text`).text('Please Enter a Valid Email');
            $(`.${form} button`).prop('disabled', true);
        }
        else {
            $(`.${form} .error-text`).text('');
            $(`.${form} button`).prop('disabled', false);
        }
    });

    $(`.${form} input:last`).on('input', (e) => {
        if (e.target.value === '') $(`.${form} .pass-error-text`).text('');
        else if (e.target.value.length < 6) {
            $(`.${form} .pass-error-text`).text('Invalid Password');
            $(`.${form} button`).prop('disabled', true);
        } else {
            $(`.${form} .pass-error-text`).text('');
            $(`.${form} button`).prop('disabled', false);
        }

    })
}
