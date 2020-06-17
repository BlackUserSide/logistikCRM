$(document).ready(function () {
    $('.form-login').submit(function (e) {
        e.preventDefault()
        let form = $(this)
        $.ajax({
            type: "POST",
            url: "/loginUser",
            data: form.serialize(),
            dataType: "json",
            success: function (result) {
               if(result.status === 'uncorrect') {
                   $('.error-form').text('Неправильный логин или пароль')
                   $('.error-form').fadeIn()
               }
            }
        });
    })
    $('.input-wrapper input').change(function () {
        let idInp = $(this).attr('id')
        let data = $(this).val()
        
        if (data !== '') {
            if (idInp === 'login') {
                $('#login-span').animate({
                    opacity: 0
                }, 200)
            } else if (idInp === 'password') {
                $('#password-span').animate({
                    opacity: 0
                }, 200)
            }
        } else {
            if (idInp === 'login') {
                $('#login-span').animate({
                    opacity: 1
                }, 200)
            } else if (idInp === 'password') {
                $('#password-span').animate({
                    opacity: 1
                }, 200)
            }
        }

    })

})