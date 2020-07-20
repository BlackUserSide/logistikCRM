$(document).ready(function () {
    function getCarrName(id) {
        $.ajax({
            type: "POST",
            url: "/cabinet/card/getCarrName",
            data: { id: id },
            dataType: "json",
            success: function (result) {
                $('.id-carr-p').text(result);
            }
        });
    }
    let idCarr = $('.id-carr-p').attr('id');
    getCarrName(idCarr);
    function getCompName(id) {
        $.ajax({
            type: "POST",
            url: "/cabinet/card/getCompName",
            data: { id: id },
            dataType: "json",
            success: function (result) {
                $('.id-comp-p').text(result);
            }
        });
    }
    let idComp = $('.id-comp-p').attr('id');
    getCompName(idComp);
    $('.dell-card').click(function (e) {
        e.preventDefault();
        let ref = $(this).attr('ref');
        let id = $(this).attr('id-card');
        $.ajax({
            type: "POST",
            url: "/cabinet/card/deleteCard",
            data: { id: id, ref: ref },
            dataType: "json",
            success: function (result) {
                if (result.status === 'success') {
                    $(location).attr('href', '/cabinet/clients');
                }
            }
        });

    })
    $('.input-wrapper-comments').submit(function (e) {
        e.preventDefault();
        let commentsText = $('#commentsText').val();
        let ref = $('#ref-inp').val();
        let id = $('#id-inp').val();

        $.ajax({
            type: "POST",
            url: "/cabinet/card/addComments",
            data: { text: commentsText, ref: ref, id: id },
            dataType: "json",
            success: function (res) {
                if (res.status === 'success') {
                    location.reload();
                }
            }
        });
    })
    $.each($('.item-comments'), function (index, val) {
        let th = $(this);
        let id = th.attr('id-user');
        $.ajax({
            type: "POST",
            url: "/cabinet/card/takeNameUser",
            data: { id: id },
            dataType: "json",
            success: function (result) {
                $('.name-comments').text(`${result.lastName} ${result.name}`)
            }
        });
    });
    $('.dell-comments').click(function (e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "/cabinet/card/dellComments",
            data: {id: id},
            dataType: "json",
            success: function (res) {
                if (res.status === 'success') {
                    location.reload();
                }
            }
        });
    })
    $('.link-routes').click(function (e) {
        e.preventDefault();
        $('.hidden-list-routes').arcticmodal({
            content: $('.hidden-list-routes')
        });
    })
    $('.link-docs').click(function (e) {
        e.preventDefault();
        $('.hidden-list-docs').arcticmodal({
            content: $('.hidden-list-docs')
        })

    })
    $('.add-docs').click(function (e) {
        e.preventDefault();
        $('.hidden-form-add-docs').arcticmodal();
    })
    $('.dell-docs').click(function (e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let nameDoc = $(this).attr('name-doc');
        $.ajax({
            type: "POST",
            url: "/cabinet/card/dellDoc",
            data: {id: id, name:nameDoc},
            dataType: "json",
            success: function (result) {
                
                if (result.status === 'success') {
                    location.reload();
                } else {
                    alert('Ошибка');
                }
            }
        });
    })
})