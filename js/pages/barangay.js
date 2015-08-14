$(document).ready(function() {
    $('#dataTables-example').dataTable();

    // fetch_all_barangay();
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
    getData('update',id);
});

$(document).on("click", ".view-icon", function() {
    var id = $(this).data('id');
    getData('view',id);
});

function create_barangay() {
    $("#id").val('');
    $("#name").val('');
    $("#description").val('');
    $("#landarea").val('');
    $("#image").val('');
    $("#x_coord").val('');
    $("#y_coord").val('');

    $('#locationModal').modal('show');
}

function resetHelpInLine() {
    $('span.help-inline').each(function() {
        $(this).text('');
    });
}

function refresh() {
    fetch_all_child();
}

function save() {
    resetHelpInLine();

    var empty = false;

    $('input[type="text"]').each(function() {
        $(this).val($(this).val().trim());
    });

    if ($('#name').val() == '') {
        $('#name').next('span').text('Name is required.');
        empty = true;
    }

    if ($('#landarea').val() == '') {
        $('#landarea').next('span').text('Land Area is required.');
        empty = true;
    }

    if ($('#x_coord').val() == '') {
        $('#x_coord').next('span').text('X Coordinates is required.');
        empty = true;
    }

    if ($('#y_coord').val() == '') {
        $('#y_coord').next('span').text('Y Coordinates is required.');
        empty = true;
    }

    if (empty == true) {
        $.notify('Please input all the required fields correctly.', "error");
        return false;
    }

    if ($('#id').val() == '') {
        $.ajax({
            url: '../server/child/',
            async: false,
            type: 'POST',
            data: {
                name: $('#name').val(),
                landarea: $('#landarea').val(),
                description: $('#description').val(),
                x_coord: $('#x_coord').val(),
                y_coord: $('#y_coord').val()
            },
            success: function(response) {
                var decode = response;
                if (decode.success == true) {
                    $('#locationModal').modal('hide');
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
            url: '../server/child/' + $('#child_id').val(),
            async: false,
            type: 'PUT',
            data: {
                name: $('#name').val(),
                landarea: $('#landarea').val(),
                description: $('#description').val(),
                x_coord: $('#x_coord').val(),
                y_coord: $('#y_coord').val()
            },
            success: function(response) {
                var decode = response;

                if (decode.success == true) {
                    $('#locationModal').modal('hide');
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


function fetch_all_child() {
    $('#dataTables-example tbody > tr').remove();
    $.ajax({
        url: '../server/child/',
        async: true,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            var decode = response;
            if (decode) {
                if (decode.childs.length > 0) {
                    for (var i = 0; i < decode.childs.length; i++) {
                        var row = decode.childs;
                        var html = '<tr class="odd gradeX">\
                                        <td class="">' + row[i].lname + ', ' + row[i].fname + '</td>\
                                        <td class="">' + row[i].dob + '</td>\
                                        <td class="">' + row[i].gender + '</td>\
                                        <td class="center">normal</td>\
                                        <td class=" " width="15%">\
                                            <a data-id="'+ row[i].id +'" class="view-icon">view</a>|\
                                            <a data-id="'+ row[i].id +'" class="update-icon">update</a>|\
                                            <a data-id="'+ row[i].id +'" class="delete-icon">delete</a>\
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
        url: '../server/child/' + id,
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

function getData(status,id) {
    $.ajax({
        url: '../server/location/' + id,
        async: true,
        type: 'GET',
        success: function(response) {
            var decode = response;
            console.log('response: ', decode);
            if (decode.success == true) {
                var child  = decode.child;

                $("#id").val(child.id);
                $("#name").val(child.fname);
                $("#description").val(child.mname);
                $("#landarea").val(child.lname);
                $("#x_coord").val(child.address);
                $("#y_coord").val(child.location);

                if (status === 'view'){
                    $("#name").prop('disabled', true);
                    $("#description").prop('disabled', true);
                    $("#landarea").prop('disabled', true);
                    $("#x_coord").prop('disabled', true);
                    $("#y_coord").prop('disabled', true);

                    $("#btn-save").attr('disabled', true);
                }else{
                    $("#fname").prop('disabled', false);
                    $("#mname").prop('disabled', false);
                    $("#lname").prop('disabled', false);
                    $("#address").prop('disabled', false);
                    $("#location").prop('disabled', false);
                    $("#height").prop('disabled', false);
                    $("#weight").prop('disabled', false);
                    $("#gender").prop('disabled', false);
                    $("#month").prop('disabled', false);
                    $("#status").prop('disabled', false);
                    $("#datetimepicker2").prop('disabled', false);

                     $("#btn-save").removeAttr('disabled');
                }


                $('#childModal').modal('show');
            } else if (decode.success === false) {
                $.notify(decode.msg, "error");
                return;
            }

        }
    });
}
