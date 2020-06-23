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
                    getName(date.idGive);
                    if (date.status === '0') {
                        $('.status-hidden-task').html('<i style="color: #FFD600" class="far fa-clock"></i>Ожидающее');
                    } else {
                        $('.status-hidden-task').html('<i style="color: #24FF00" class="far fa-check-circle"></i>Выполнено');
                    }
                    $('.data-hidden-task').text(date.date);
                    $('.tegs-task-hidden').text(date.tagTask)
                    $('.text-task-hidden').html(`Задание: <br> ${date.textTask}`)
                    $('.btn-hidden-task').attr('id', date.id);
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
})