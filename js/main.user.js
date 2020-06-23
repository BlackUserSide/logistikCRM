$(document).ready(function () {
    $('.log-out-user').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/cabinet/logOut",
            dataType: "json",
            success: function (json) {
                if(json.status === 'success'){
                    location.reload();
                }
                
            }
        });
    })
})