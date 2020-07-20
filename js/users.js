$(document).ready(function () {
    const defult = () => {
        $('.table-users').DataTable()
        $('.dataTables_length').css('display', 'none')
    }
    defult();
    
    $('.action-list-users').click(function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $('.hidden-action-nick').arcticmodal();
        $('.dell-user-h').attr('id', id);
    })
    $('.dell-user-h').click(function (e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "/cabinet/users/deleteUser",
            data: {id: id},
            dataType: "json",
            success: function (result) {
                if (result.status === 'success') {
                    location.reload();
                } else {
                    alert('Действие невозможно')
                }
            }
        });
    })
    $('.change-status-h').click(function (e) {
        e.preventDefault();
        let id = $('.dell-user-h').attr('id');
        $.ajax({
            type: "POST",
            url: "/cabinet/users/changeStatus",
            data: {id: id},
            dataType: "json",
            success: function (result) {
                if (result.status === 'success') {
                    location.reload();
                } else {
                    alert('Действие невозможно')
                }
            }
        });
    })
    
})