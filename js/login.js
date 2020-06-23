$(document).ready(function () {
    $('.login-form').submit(function (e) {
        e.preventDefault();
        $('.error-form').text('');
        $('.login-loader').addClass('loader-active');
        let form = $(this)
        $.ajax({
            type: "POST",
            url: "/loginUser",
            data: form.serialize(),
            dataType: "json",
            success: function (result) {
                if(result.status === 'success') {
                    $(location).attr('href', '/cabinet');
                } else {
                    $('.error-form').text('Неправильный логин или пароль');
                    $('.login-loader').removeClass('loader-active');
                }
            }
        });
    })

})