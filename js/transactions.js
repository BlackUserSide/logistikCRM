$(document).ready(function () {
    $('.table-transaction-wrapper').DataTable();
    $('.dataTables_wrapper').css('width', '100%');
    $('.dataTable').css('width', '100%');
    $('.dataTables_length').css('display', 'none');
    $('.dataTables_wrapper .dataTables_filter').css('margin-bottom', '10px');
    
    $('.add-transaction-link').click(function(e){
        e.preventDefault();
        $('.hidden-add-transaction').arcticmodal();
    })
    
    $('.form-add-transaction').submit(function (e) {
        e.preventDefault();
        let form = $(this);
        $.ajax({
            type: "POST",
            url: "/cabinet/transactions/addTransaction",
            data: form.serialize(),
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