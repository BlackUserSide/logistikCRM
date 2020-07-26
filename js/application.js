$(document).ready(function () {
    $('.main-table-app').DataTable();
    $('.dataTables_wrapper').css('width', '100%');
    $('.dataTable').css('width', '100%');
    $('.dataTables_length').css('display', 'none');
    $('.call-to-number-app').click(function (e) {
        e.preventDefault();
        let number = $(this).attr('number');
        $.ajax({
            type: "POST",
            url: "/cabinet/clients/getCall",
            data: { number: number },
            dataType: "json",
            success: function (result) {

            }
        });
    })
    $('.show-text-link').click(function (e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $('.hidden-full-text-app').arcticmodal({
            content: $(this)
        });
        $.ajax({
            type: "POST",
            url: "/cabinet/application/getFullText",
            data: {id: id},
            dataType: "json",
            success: function (result) {
              if (result.status === 'success') {
                $('.hidden-full-text-app p').text(result.data);
              }   
            }
        });
    })
})