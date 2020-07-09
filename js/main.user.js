$(document).ready(function () {
    $('.log-out-user').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/cabinet/logOut",
            dataType: "json",
            success: function (json) {
                if (json.status === 'success') {
                    location.reload();
                }

            }
        });
    })

    $('.task-item-wrapper').click(function () {
        let th = $(this);
        let id = th.attr('id');
        $.ajax({
            type: "POST",
            url: "/cabinet/task/getTaskInfo",
            data: { id: id },
            dataType: "json",
            success: function (date) {
                if (date.res === 'success') {
                    console.log(date)
                    getName(date.idGive);
                    if (date.status === '0') {
                        $('.status-hidden-task').html('<i style="color: #FFD600" class="far fa-clock"></i>Ожидающее');
                    } else {
                        $('.status-hidden-task').html('<i style="color: #24FF00" class="far fa-check-circle"></i>Выполнено');
                        $('.btn-hidden-task').css('display', 'none');
                        $('.dell-hidden-task').css('display', 'inline-block')
                    }
                    $('.data-hidden-task').text(date.date);
                    $('.tegs-task-hidden').text(date.tagTask)
                    $('.text-task-hidden').html(`Задание: <br> ${date.textTask}`)
                    $('.btn-hidden-task').attr('id', date.id);
                    $('.dell-hidden-task').attr('id', date.id);
                }
            }
        });
        $('.hidden-card-task').arcticmodal();

    })
    $('.btn-hidden-task').click(function (e) {
        e.preventDefault();
        let th = $(this);
        let id = th.attr('id')
        $.ajax({
            type: "POST",
            url: "/cabinet/task/updateStatusTask",
            data: { id: id },
            dataType: "json",
            success: function (result) {
                if (result.status === 'success') {
                    location.reload();
                }
            }
        });
    })
    $('.dell-hidden-task').click(function (e) {
        e.preventDefault();
        let th = $(this);
        let id = th.attr('id')
        $.ajax({
            type: "POST",
            url: "/cabinet/task/dellTask",
            data: { id: id },
            dataType: "json",
            success: function (result) {
                if (result.status === 'success') {
                    location.reload();
                }
            }
        });
    })
    function getName(id) {
        $.ajax({
            type: "POST",
            url: "/cabinet/getNameTask",
            data: { id: id },
            dataType: "json",
            success: function (res) {
                $('.name-hidden-task').text(`${res.name} ${res.lastName}`);
                let substr = res.name.substring(0, 1)
                $('.str-name-hidden').text(substr)

            }
        });
    }
    $('.notification-link').click(function (e) {
        e.preventDefault();
        $('.hidden-notification').arcticmodal({
            content: $(this),
            beforeClose: function () {
                location.reload();
                
            }
        })
        $.ajax({
            type: "POST",
            url: "/cabinet/getNotificationUser",
            dataType: "json",
            success: function (data) {
                if (data.data === 'empty') {
                    
                } else {
                    $.each(data, function (key, val) {
                        if (val.asread === '0') {
                            let html = `<li class="notification-wrapper no-read-list-notif">
                                    <p class="text-notification">${val.textNotification}</p>
                                    <p class="date-notification">${val.data}</p>
                                    <p style="display:none" id="statusRead">${val.asread}</p>
                                </li>`;
                            $('.list-notification ul').prepend(html)
                        } else {
                            let html = `<li class="notification-wrapper read-list-notif">
                                    <p class="text-notification">${val.textNotification}</p>
                                    <p class="date-notification">${val.data}</p>
                                    <p style="display:none" id="statusRead">${val.asread}</p>
                                </li>`;
                            $('.list-notification ul').prepend(html)
                        }
                       
                    });

                    $.ajax({
                        type: "POST",
                        url: "/cabinet/changeStatusNot",
                        dataType: "json",
                        success: function (result) {

                        }
                    });

                }
            }
        });

    })

    function getCountNotification() {
        $.ajax({
            type: "POST",
            url: "/cabinet/countUserNotification",
            dataType: "json",
            success: function (result) {
                if (result > 0) {
                    testAudio()
                }
                $('.count-notif').text(result);
                $('.count-notif').attr('id', result);
            }
        });
    }

    getCountNotification()
    setInterval(function () {
        getCountNotification();
    }, 5000);
    function testAudio() {
        let mysong = new Audio;
        mysong.src = '/libs/audio/Sound_11342.wav';
        mysong.play();
    }
    // function takeCountNotification() {
    //     let count = $('.count-notif').attr('id');
    //     if (count > '0') {
    //         testAudio ()
    //     }
    // }
    // setTimeout(() => {
    //     takeCountNotification();
    // }, 1500);
    $('#clearNotif').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/cabinet/dellAllNotife",
            dataType: "json",
            success: function () {
                
            }
        });
    })
})