$(document).ready(function () {
    $('.home-link').addClass('active-link-nav');
    $.each($('.name-give'), function () {
        let th = $(this);
        let idGive = th.attr('id');
        $.ajax({
            type: "POST",
            url: "/cabinet/getNameTask",
            data: { id: idGive },
            dataType: "json",
            success: function (result) {
                if (result.status === 'success') {
                    $('.name-give').text(`${result.name}  ${result.lastName}`);
                    let substr = result.name.substring(0, 1)
                    $('.name-substr').text(substr)
                }
            }
        });
    });

    
}) 