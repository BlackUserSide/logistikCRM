$(document).ready(function () {
    function getCurrentTimeString() {
        return new Date().toTimeString().replace(/ .*/, '');
    }
    setInterval(() =>$('.date-now').text(getCurrentTimeString) , 1000);
    $('.logout').click(function() {
        $.ajax({
            type: "POST",
            url: "/cabinet/logOut",
            dataType: "json",
            success: function (res) {
                if(res.status === 'success') {
                    location.reload();
                }
            }
        });
    })
    $('.update-task-main').click(function(e) {
        e.preventDefault();
        location.reload();
    })
})