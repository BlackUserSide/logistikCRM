$(document).ready(function () {
    $('.dell-link-comp').click(function (e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let event = $(this).attr('data-event');
        if (event === 'company') {
            $.ajax({
                type: "POST",
                url: "/cabinet/clients/dellOne",
                data: { id: id },
                dataType: "json",
                success: function (data) {
                    if (data.status === 'success') {
                        location.reload();
                    }
                }
            });
        } else if (event === 'routes') {
            $.ajax({
                type: "POST",
                url: "/cabinet/clients/dellOneRoutes",
                data: { id: id },
                dataType: "json",
                success: function (data) {
                    if (data.status === 'success') {
                        location.reload();
                    }
                }
            });
        } else {
            $.ajax({
                type: "POST",
                url: "/cabinet/clients/dellOneCarr",
                data: { id: id },
                dataType: "json",
                success: function (data) {
                    if (data.status === 'success') {
                        location.reload();
                    }
                }
            });
        }
        
    })
    $('.table-wrapper').DataTable()
    $('.dataTables_wrapper').css('width', '100%');
    $('.dataTable').css('width', '100%');
    
    $('.dataTables_length').css('display', 'none');
    $.each($('.id-comp-wrapper'), function (index, val) {
        let th = $(this)
        let id = th.text();
        $.ajax({
            type: "POST",
            url: "/cabinet/clients/getNameCompany",
            data: { id: id },
            dataType: "json",
            success: function (result) {

                if (result.status === 'success') {
                    th.text(result.data)
                }
            }
        });
    });
    $('.link-add-client-wrapper').click(function (e) {
        e.preventDefault();
        $('.hidden-add-clients').arcticmodal();

    })
    $('.add-company').click(function (e) {
        e.preventDefault();
        $('.hidden-add-company').arcticmodal();
    })
    $('.add-form-company').submit(function (e) {
        e.preventDefault();
        let form = $(this);
        $.ajax({
            type: "POST",
            url: "/cabinet/clients/addCompany",
            data: form.serialize(),
            dataType: "json",
            success: function (result) {
                form.trigger('reset');
                $('.box-modal_close').trigger('click');
                $(location).attr('href', '/cabinet/clients');
            }
        });
    })
    $('.add-routes').click(function (e) {
        e.preventDefault();
        $('.hidden-add-routes').arcticmodal();
    })
    $('.add-form-routes').submit(function (e) {
        e.preventDefault();
        let form = $(this);
        $.ajax({
            type: "POST",
            url: "/cabinet/clients/addRoutes",
            data: form.serialize(),
            dataType: "json",
            success: function (result) {
                console.log(result);
                form.trigger('reset');
                $('.box-modal_close').trigger('click');
                $(location).attr('href', '/cabinet/clients?cli=routes');
            }
        });
    })
    $('.add-carr').click(function (e) {
        e.preventDefault();
        $('.hidden-add-carrier').arcticmodal();
    })
    $('.add-form-carrier').submit(function (e) {
        e.preventDefault();
        let form = $(this);
        $.ajax({
            type: "POST",
            url: "/cabinet/clients/addCarr",
            data: form.serialize(),
            dataType: "json",
            success: function (result) {
                console.log(result);
                form.trigger('reset');
                $('.box-modal_close').trigger('click');
                $(location).attr('href', '/cabinet/clients?cli=carriers');
            }
        });
    })
    $('.call-link-comp').click(function (e) {
        e.preventDefault();
        let number = $(this).attr('number');
        $.ajax({
            type: "POST",
            url: "/cabinet/clients/getCall",
            data: {number: number},
            dataType: "json",
            success: function (result) {
                
            }
        });
    })
    $('.send-mail').click(function(e) {
        e.preventDefault();
        let mail = $(this).attr('mail');
        $('.hidden-send-mail').arcticmodal()
        $('#mailSend').val(mail);
        $('.send-mail-form h3').text(`Отправить письмо на: ${mail}`);
    })
    $('.send-mail-form').submit(function(e) {
        e.preventDefault();
        let form = $(this);
        $.ajax({
            type: "POST",
            url: "/cabinet/clients/sendMail",
            data: form.serialize(),
            dataType: "json",
            success: function (result) {
                if (result.status == 'success') {
                    alert('Отправленно');
                    location.reload();
                } else {
                    alert('Ошибка');
                }
            }
        });
    })
    $('.send-all').click(function(e) {
        e.preventDefault();
        $('.send-mail-form-all').arcticmodal();
    })
    $('.send-mail-form-all').submit(function(e) {
        e.preventDefault();
        let form = $(this);
        $.ajax({
            type: "POST",
            url: "/cabinet/clients/sendMailAll",
            data: form.serialize(),
            dataType: "json",
            success: function (result) {
                if (result.status == 'success') {
                    alert('Отправленно');
                    location.reload();
                } else {
                    alert('Ошибка');
                }
            }
        });
    })
})