$(document).ready(function() {
    $('#dataTables-example').dataTable();

    fetch_all_barangay();
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
    fetch_all_barangay();
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
            url: '../server/location/',
            async: false,
            type: 'POST',
            data: {
                name: $('#name').val(),
                landarea: $('#landarea').val(),
                description: $('#description').val(),
                x_coord: $('#x_coord').val(),
                y_coord: $('#y_coord').val(),
                image_path: '',
            },
            success: function(response) {
                var decode = response;
                if (decode.success == true) {
                    $.notify("Record successfully created", "success");
                    $('#locationModal').modal('hide');
                    refresh();
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
            url: '../server/location/' + $('#id').val(),
            async: false,
            type: 'PUT',
            data: {
                name: $('#name').val(),
                landarea: $('#landarea').val(),
                description: $('#description').val(),
                x_coord: $('#x_coord').val(),
                y_coord: $('#y_coord').val(),
                image_path: '',
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


function fetch_all_barangay() {
    $('#dataTables-example tbody > tr').remove();
    $.ajax({
        url: '../server/location/',
        async: true,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            var decode = response;
            if (decode) {
                if (decode.locations.length > 0) {
                    for (var i = 0; i < decode.locations.length; i++) {
                        var row = decode.locations;
                        var html = '<tr class="odd gradeX">\
                                        <td class="">' + row[i].name + '</td>\
                                        <td class="">' + row[i].landarea + '</td>\
                                        <td class="">' + row[i].description + '</td>\
                                        <td class="center" width="15%"> X : ' + row[i].x  + ' || Y: ' + row[i].y + '</td>\
                                        <td class=" " width="20%">\
                                            <a href="#" data-id="'+ row[i].id +'" class="view-icon">view</a>|\
                                            <a href="#" data-id="'+ row[i].id +'" class="update-icon">update</a>|\
                                            <a href="#" data-id="'+ row[i].id +'" class="delete-icon">delete</a>\
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
        url: '../server/location/' + id,
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
                var location  = decode.location;

                $("#id").val(location.id);
                $("#name").val(location.name);
                $("#description").val(location.description);
                $("#landarea").val(location.landarea);
                $("#x_coord").val(location.x);
                $("#y_coord").val(location.y);

                if (status === 'view'){
                    $("#name").prop('disabled', true);
                    $("#description").prop('disabled', true);
                    $("#landarea").prop('disabled', true);
                    $("#x_coord").prop('disabled', true);
                    $("#y_coord").prop('disabled', true);

                    $("#btn-save").attr('disabled', true);
                }else{
                    $("#name").prop('disabled', false);
                    $("#description").prop('disabled', false);
                    $("#landarea").prop('disabled', false);
                    $("#x_coord").prop('disabled', false);
                    $("#y_coord").prop('disabled', false);

                     $("#btn-save").removeAttr('disabled');
                }

                $('#locationModal').modal('show');
            } else if (decode.success === false) {
                $.notify(decode.msg, "error");
                return;
            }

        }
    });
}