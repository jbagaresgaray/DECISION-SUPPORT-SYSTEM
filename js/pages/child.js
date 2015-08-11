$(document).ready(function() {
    $('#dataTables-example').dataTable();
    $('#datetimepicker2').datetimepicker({
        locale: 'en'
    });

    fetch_all_child();
    fetch_status();
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


function create_child() {
    $("#fname").val('');
    $("#mname").val('');
    $("#lname").val('');
    $("#address").val('');
    $("#location").val('');
    $("#height").val('');
    $("#weight").val('');
    $("#month").val('');
    $("#gender").val('');
    $("#status").val('');

    $('#childModal').modal('show');
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

    if ($('#fname').val() == '') {
        $('#fname').next('span').text('First Name is required.');
        empty = true;
    }

    if ($('#mname').val() == '') {
        $('#mname').next('span').text('Middle Name is required.');
        empty = true;
    }

    if ($('#lname').val() == '') {
        $('#lname').next('span').text('Last Name is required.');
        empty = true;
    }

    if ($('#address').val() == '') {
        $('#address').next('span').text('Address is required.');
        empty = true;
    }

    if ($('#location').val() == '') {
        $('#location').next('span').text('Location is required.');
        empty = true;
    }

    if ($('#date').val() == '') {
        $('#date').parent().next('span').text('Date is required.');
        empty = true;
    }

    if ($('#height').val() == '') {
        $('#height').next('span').text('Height is required.');
        empty = true;
    }

    if ($('#weight').val() == '') {
        $('#weight').next('span').text('Weight is required.');
        empty = true;
    }

    if ($('#month').val() == '') {
        $('#month').next('span').text('Month old is required.');
        empty = true;
    }

    if ($('#gender').val() == '') {
        $('#gender').next('span').text('Gender is required.');
        empty = true;
    }

    if ($('#status').val() == '') {
        $('#status').next('span').text('Status is required.');
        empty = true;
    }

    if (empty == true) {
        $.notify('Please input all the required fields correctly.', "error");
        return false;
    }



    if ($('#child_id').val() == '') {
        $.ajax({
            url: '../server/child/',
            async: false,
            type: 'POST',
            crossDomain: true,
            dataType: 'json',
            data: {
                fname: $('#fname').val(),
                mname: $('#mname').val(),
                lname: $('#lname').val(),
                address: $('#address').val(),
                location: $('#location').val(),
                date: $('#date').val(),
                height: $('#height').val(),
                weight: $('#weight').val(),
                month: $('#month').val(),
                gender: $('#gender').val(),
                status: $('#status').val()
            },
            success: function(response) {
                var decode = response;

                if (decode.success == true) {
                    $('#childModal').modal('hide');
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
            crossDomain: true,
            dataType: 'json',
            data: {
                fname: $('#fname').val(),
                mname: $('#mname').val(),
                lname: $('#lname').val(),
                address: $('#address').val(),
                location: $('#location').val(),
                date: $('#date').val(),
                height: $('#height').val(),
                weight: $('#weight').val(),
                month: $('#month').val(),
                gender: $('#gender').val(),
                status: $('#status').val()
            },
            success: function(response) {
                var decode = response;

                if (decode.success == true) {
                    $('#childModal').modal('hide');
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
        url: '../server/child/' + id,
        async: true,
        type: 'GET',
        success: function(response) {
            var decode = response;
            console.log('response: ', decode);
            if (decode.success == true) {
                var child  = decode.child;

                $("#child_id").val(child.id);
                $("#fname").val(child.fname);
                $("#mname").val(child.mname);
                $("#lname").val(child.lname);
                $("#address").val(child.address);
                $("#location").val(child.location);
                $("#height").val(child.height);
                $("#weight").val(child.weight);
                $("#month").val(child.months);
                $("#gender").val(child.gender);
                $("#status").val(child.status_id);

                if (status === 'view'){
                    $("#fname").prop('disabled', true);
                    $("#mname").prop('disabled', true);
                    $("#lname").prop('disabled', true);
                    $("#address").prop('disabled', true);
                    $("#location").prop('disabled', true);
                    $("#height").prop('disabled', true);
                    $("#weight").prop('disabled', true);
                    $("#gender").prop('disabled', true);
                    $("#month").prop('disabled', true);
                    $("#status").prop('disabled', true);
                    $("#datetimepicker2").prop('disabled', true);

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

function fetch_status() {
    $.ajax({
        url: '../server/status/',
        async: true,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            var decode = response;
            $('#status').empty();
            for (var i = 0; i < decode.data.length; i++) {
                var row = decode.data;
                var html = '<option id="' + row[i].id + '" value="' + row[i].id + '">' + row[i].status + '</option>';
                $("#status").append(html);
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
