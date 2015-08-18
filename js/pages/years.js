$(document).ready(function() {
    $('#dataTables-example').dataTable();

    fetch_all_years();
});

$(document).on("click", ".delete-icon", function() {
    var id = $(this).data('id');

    BootstrapDialog.show({
        title: 'Delete',
        message: 'Are you sure to delete this record?',
        buttons: [{
            label: 'Yes',
            cssClass: 'btn-primary',
            action: function(dialog) {
                deletedata(id);
                dialog.close();
            }
        }, {
            label: 'No',
            cssClass: 'btn-warning',
            action: function(dialog) {
                dialog.close();
            }
        }]
    });
});

$(document).on("click", ".update-icon", function() {
    var id = $(this).data('id');
    getData('update', id);
});

$(document).on("click", ".view-icon", function() {
    var id = $(this).data('id');
    getData('view', id);
});


function create_child() {
    $("#year").val('');
    $("#terms").val('');

    $("#year").prop('disabled', false);
    $("#terms").prop('disabled', false);
    $("#btn-save").removeAttr('disabled');

    $('#yearModal').modal('show');
}

function resetHelpInLine() {
    $('span.help-inline').each(function() {
        $(this).text('');
    });
}

function refresh() {
    fetch_all_years();
}

function save() {
    resetHelpInLine();

    var empty = false;

    $('input[type="text"]').each(function() {
        $(this).val($(this).val().trim());
    });

    if ($('#year').val() == '') {
        $('#year').next('span').text('Year is required.');
        empty = true;
    }

    if ($('#terms').val() == '') {
        $('#terms').next('span').text('Terms is required.');
        empty = true;
    }


    if (empty == true) {
        $.notify('Please input all the required fields correctly.', "error");
        return false;
    }



    if ($('#id').val() == '') {
        $.ajax({
            url: '../server/yearterms/',
            async: false,
            type: 'POST',
            crossDomain: true,
            dataType: 'json',
            data: {
                year: $('#year').val(),
                terms: $('#terms').val()
            },
            success: function(response) {
                var decode = response;

                if (decode.success == true) {
                    $('#yearModal').modal('hide');
                    refresh();
                    $.notify("Record successfully created", "success");
                } else if (decode.success === false) {
                    $.notify(decode.error, "error");
                    return;
                }
            },
            error: function(error) {
                console.log("Error:");
                console.log(error.responseText);
                console.log(error.message);
                return;
            }
        });
    } else {
        $.ajax({
            url: '../server/yearterms/' + $('#id').val(),
            async: false,
            type: 'PUT',
            crossDomain: true,
            dataType: 'json',
            data: {
                year: $('#year').val(),
                terms: $('#terms').val()
            },
            success: function(response) {
                var decode = response;

                if (decode.success == true) {
                    $('#yearModal').modal('hide');
                    refresh();
                    $.notify("Record successfully updated", "success");
                } else if (decode.success === false) {
                    $.notify(decode.error, "error");
                    return;
                }
            },
            error: function(error) {
                console.log("Error:");
                console.log(error.responseText);
                console.log(error.message);
                return;
            }
        });
    }
}


function fetch_all_years() {
    $('#dataTables-example tbody > tr').remove();
    $.ajax({
        url: '../server/yearterms/',
        async: true,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            var decode = response;
            if (decode) {
                if (decode.yearterms.length > 0) {
                    for (var i = 0; i < decode.yearterms.length; i++) {
                        var row = decode.yearterms;
                        var html = '<tr class="odd gradeX">\
                                        <td class="">' + row[i].year + '</td>\
                                        <td class="">' + row[i].terms + '</td>\
                                        <td class=" " width="20%">\
                                            <a data-id="' + row[i].id + '" href="#" class="view-icon">view</a>|\
                                            <a data-id="' + row[i].id + '" href="#" class="update-icon">update</a>|\
                                            <a data-id="' + row[i].id + '" href="#" class="delete-icon">delete</a>\
                                        </td>\
                                </tr>';
                        $("#dataTables-example tbody").append(html);
                    }
                    $.notify("All records display", "info");
                }
            }
        },
        error: function(error) {
            console.log('error: ', error);
            return;
        }
    });
}

function deletedata(id) {
    $.ajax({
        url: '../server/yearterms/' + id,
        async: true,
        type: 'DELETE',
        success: function(response) {
            var decode = response;
            if (decode.success == true) {
                $.notify("Record successfully deleted", "success");
                refresh();
            } else if (decode.success === false) {
                $.notify(decode.msg, "error");
                return;
            }

        }
    });
}

function getData(status, id) {
    $.ajax({
        url: '../server/yearterms/' + id,
        async: true,
        type: 'GET',
        success: function(response) {
            var decode = response;
            console.log('response: ', decode);
            if (decode.success == true) {
                var yearterms = decode.yearterms;

                $("#id").val(yearterms.id);
                $("#year").val(yearterms.year);
                $("#terms").val(yearterms.terms);

                if (status === 'view') {
                    $("#year").prop('disabled', true);
                    $("#terms").prop('disabled', true);

                    $("#btn-save").attr('disabled', true);
                } else {
                    $("#year").prop('disabled', false);
                    $("#terms").prop('disabled', false);

                    $("#btn-save").removeAttr('disabled');
                }

                $('#yearModal').modal('show');
            } else if (decode.success === false) {
                $.notify(decode.msg, "error");
                return;
            }

        }
    });
}
