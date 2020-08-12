$(document).ready(function () {
    $('.table-transaction-wrapper').DataTable();
    $('.dataTables_wrapper').css('width', '100%');
    $('.dataTable').css('width', '100%');
    $('.dataTables_length').css('display', 'none');
    $('.dataTables_wrapper .dataTables_filter').css('margin-bottom', '10px');

    $('.add-transaction-link').click(function (e) {
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
    $('.active-change-trans').click(function (e) {
        e.preventDefault();
        let link = $(this);
        let id = link.attr('id');
        let val = link.attr('val');
        $('.wrapper-chnage-transaction').arcticmodal({
            beforeClose: function () {
                location.reload();
            },
        });

        $.ajax({
            type: "POST",
            url: "/cabinet/transactions/getDataChange",
            data: { id: id },
            dataType: "json",
            success: function (data) {
                let inp = "";
                let text = "";
                let hidden = "";
                let id = '';
                console.log(data);
                if (data.status === 'success') {
                    $.each(data.data, function (index, value) {
                        if (val == '0') {
                            id = `<input type="hidden" name="id" value="${value.id}">`;
                            text = `<h3>Дата: ${value.date}</h3>`;
                            inp = '<input type="text" name="changeInp" required><br>';
                            hidden = '<input type="hidden" name="valChange" value="0">'
                            $('.change-trans-wrapper').prepend(id);
                            $('.change-trans-wrapper').prepend(inp);
                            $('.change-trans-wrapper').prepend(text);
                            $('.change-trans-wrapper').prepend(hidden);


                        }
                        if (val == '1') {
                            id = `<input type="hidden" name="id" value="${value.id}">`;
                            text = `<h3>Фирма: ${value.company}</h3>`;
                            inp = '<input type="text" name="changeInp" required><br>';
                            hidden = '<input type="hidden" name="valChange" value="1">'
                            $('.change-trans-wrapper').prepend(id);
                            $('.change-trans-wrapper').prepend(inp);
                            $('.change-trans-wrapper').prepend(text);
                            $('.change-trans-wrapper').prepend(hidden);
                        }
                        if (val == '2') {
                            id = `<input type="hidden" name="id" value="${value.id}">`;
                            text = `<h3>Заказчик: ${value.customer}</h3>`;
                            inp = '<input type="text" name="changeInp" required><br>';
                            hidden = '<input type="hidden" name="valChange" value="2">'
                            $('.change-trans-wrapper').prepend(id);
                            $('.change-trans-wrapper').prepend(inp);
                            $('.change-trans-wrapper').prepend(text);
                            $('.change-trans-wrapper').prepend(hidden);
                        }
                        if (val == '3') {
                            id = `<input type="hidden" name="id" value="${value.id}">`;
                            text = `<h3>Маршрут: ${value.route}</h3>`;
                            inp = '<input type="text" name="changeInp" required><br>';
                            hidden = '<input type="hidden" name="valChange" value="3">'
                            $('.change-trans-wrapper').prepend(id);
                            $('.change-trans-wrapper').prepend(inp);
                            $('.change-trans-wrapper').prepend(text);
                            $('.change-trans-wrapper').prepend(hidden);
                        }
                        if (val == '4') {
                            id = `<input type="hidden" name="id" value="${value.id}">`;
                            text = `<h3>Сумма.вход: ${value.sumIns}</h3>`;
                            inp = '<input type="text" name="changeInp" required><br>';
                            hidden = '<input type="hidden" name="valChange" value="4">'
                            $('.change-trans-wrapper').prepend(id);
                            $('.change-trans-wrapper').prepend(inp);
                            $('.change-trans-wrapper').prepend(text);
                            $('.change-trans-wrapper').prepend(hidden);
                        }
                        if (val == '5') {
                            id = `<input type="hidden" name="id" value="${value.id}">`;
                            text = `<h3>Форма оплаты: ${value.formPay}</h3>`;
                            inp = '<input type="text" name="changeInp" required><br>';
                            hidden = '<input type="hidden" name="valChange" value="5">'
                            $('.change-trans-wrapper').prepend(id);
                            $('.change-trans-wrapper').prepend(inp);
                            $('.change-trans-wrapper').prepend(text);
                            $('.change-trans-wrapper').prepend(hidden);
                        }
                        if (val == '6') {
                            id = `<input type="hidden" name="id" value="${value.id}">`;
                            text = `<h3>Дата оплаты: ${value.datePay}</h3>`;
                            inp = '<input type="text" name="changeInp" required><br>';
                            hidden = '<input type="hidden" name="valChange" value="6">'
                            $('.change-trans-wrapper').prepend(id);
                            $('.change-trans-wrapper').prepend(inp);
                            $('.change-trans-wrapper').prepend(text);
                            $('.change-trans-wrapper').prepend(hidden);
                        }
                        if (val == '7') {
                            id = `<input type="hidden" name="id" value="${value.id}">`;
                            text = `<h3>Сумма перевода: ${value.sumPay}</h3>`;
                            inp = '<input type="text" name="changeInp" required><br>';
                            hidden = '<input type="hidden" name="valChange" value="7">'
                            $('.change-trans-wrapper').prepend(id);
                            $('.change-trans-wrapper').prepend(inp);
                            $('.change-trans-wrapper').prepend(text);
                            $('.change-trans-wrapper').prepend(hidden);
                        }
                        if (val == '8') {
                            id = `<input type="hidden" name="id" value="${value.id}">`;
                            text = `<h3>Доход: ${value.income}</h3>`;
                            inp = '<input type="text" name="changeInp" required><br>';
                            hidden = '<input type="hidden" name="valChange" value="8">'
                            $('.change-trans-wrapper').prepend(id);
                            $('.change-trans-wrapper').prepend(inp);
                            $('.change-trans-wrapper').prepend(text);
                            $('.change-trans-wrapper').prepend(hidden);
                        }
                    });
                }
            }
        });
    })
    $('.change-trans-wrapper').submit(function (e) {
        e.preventDefault();
        let form = $(this);
        $.ajax({
            type: "POST",
            url: "/cabinet/transactions/updateTransaction",
            data: form.serialize(),
            dataType: "json",
            success: function (result) {
                if (result.status == 'success') {
                    location.reload();
                }
            }
        });
    })
    $.each($('.active-id-company'), function (indexInArray, valueOfElement) { 
        let th = $(this)
        let id = th.text();
        $.ajax({
            type: "POST",
            url: "/transactions/getNameCompany",
            data: {id:id},
            dataType: "json",
            success: function (result) {
                th.text(result.data);
            }
        });
    });
    
})