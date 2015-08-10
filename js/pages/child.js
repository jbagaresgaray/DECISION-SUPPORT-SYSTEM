$(document).ready(function() {
    $('#dataTables-example').dataTable();
    $('#datetimepicker2').datetimepicker({
        locale: 'en'
    });

    fetch_all_child();
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

    $('#childModal').modal('show');
}

function resetHelpInLine() {
    $('span.help-inline').each(function() {
        $(this).text('');
    });
}

function refresh() {

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

    if ($('#fname').val() == '') {
        $('#fname').next('span').text('First Name is required.');
        empty = true;
    }

    if ($('#fname').val() == '') {
        $('#fname').next('span').text('First Name is required.');
        empty = true;
    }

    if (empty == true) {
        $.notify('Please input all the required fields correctly.', "error");
        return false;
    }



    if ($('#child_id').val() !== '') {
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
                gender: $('#gender').val()
            },
            success: function(response) {
                var decode = response;

                if (decode.success == true) {
                    refresh();
                    clear_category();
                } else if (decode.success === false) {
                    $('#btn-save').button('reset');
                    alert(decode.error);
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
                gender: $('#gender').val()
            },
            success: function(response) {
                var decode = response;

                if (decode.success == true) {
                    refresh();
                    clear_category();
                } else if (decode.success === false) {
                    $('#btn-save').button('reset');
                    alert(decode.error);
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
        crossDomain: true,
        dataType: 'json',
        success: function(response) {
            var decode = response;
            if (decode) {
                if (decode.category.length > 0) {
                    for (var i = 0; i < decode.category.length; i++) {
                        var row = decode.childs;
                        var html = '<tr class="odd gradeX">\
                                        <td class="">' + row[i].fname + '</td>\
                                        <td class="">' + row[i].lname + '</td>\
                                        <td class="center">normal</td>\
                                        <td class=" ">\
                                            <a class="view-icon">view</a>|
                                            <a class="update-icon">update</a>|
                                            <a class="delete-icon">delete</a>
                                        </td>\
                                </tr>';
                        $("#dataTables-example tbody").append(html);
                    }
                    $.notify("All records display", "info");
                }
            }
        },
        error: function(error) {
            $('#btn-save').button('reset');
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
                clear_category();
            } else if (decode.success === false) {
                $.notify(decode.msg, "error");
                return;
            }

        }
    });
}

function getData(id) {
    $.ajax({
        url: '../server/child/' + id,
        async: true,
        type: 'GET',
        success: function(response) {
            var decode = response;
            console.log('response: ', decode);
            if (decode.success == true) {
                $("#category_name").prop('disabled', false);
                $("#btn-save").removeAttr('disabled');
                $("#btn-reset").show();

                $("#category_name").val(decode.category.name);
                $("#category_id").val(decode.category.id);

                $('#addcategory').modal('show');
            } else if (decode.success === false) {
                $.notify(decode.msg, "error");
                return;
            }

        }
    });
}
