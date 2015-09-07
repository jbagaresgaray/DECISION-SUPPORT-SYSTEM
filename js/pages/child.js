$(document).ready(function() {
    $('#datetimepicker2').datetimepicker({
        locale: 'en'
    });

    fetch_all_child();
    fetch_barangay();
    fetch_year();

    $("#date").bind("change", Noofmonths);
    $("#weight").bind("change", Noofmonths);


    $('table.paginated').each(function() {
        var currentPage = 0;
        var numPerPage = 10;
        var $table = $(this);
        $table.bind('repaginate', function() {
            $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
        });
        $table.trigger('repaginate');
        var numRows = $table.find('tbody tr').length;
        var numPages = Math.ceil(numRows / numPerPage);
        var $pager = $('<div class="pager"></div>');
        for (var page = 0; page < numPages; page++) {
            $('<span class="page-number"></span>').text(page + 1).bind('click', {
                newPage: page
            }, function(event) {
                currentPage = event.data['newPage'];
                $table.trigger('repaginate');
                $(this).addClass('active').siblings().removeClass('active');
            }).appendTo($pager).addClass('clickable');
        }
        $pager.insertBefore($table).find('span.page-number:first').addClass('active');
    });
});

$("#weight").keyup(function() {
    Noofmonths();
});

$('#filter').keyup(function() {
    var rex = new RegExp($(this).val(), 'i');
    $('.searchable tr').hide();
    $('.searchable tr').filter(function() {
        return rex.test($(this).text());
    }).show();

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

function Noofmonths() {
    var date1 = new Date($('#date').val());
    var date2 = new Date();
    var Nomonths;
    var weight;
    Nomonths = moment(date2).diff(moment(date1), 'months', true);
    Nomonths = Math.round(Nomonths);
    $('#month').val(Nomonths);

    weight = weight <= 0 ? 0 : $('#weight').val();

    getStatus(Nomonths, weight);
}


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
    $("#status_id").val('');
    $("#lblStatus").text('');

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
    $("#date").prop('disabled', false);
    $("#cboyears").prop('disabled', false);

    $("#btn-save").removeAttr('disabled');

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

    if ($('#status_id').val() == '') {
        $.notify('Status is required... Please set Weight and Date of Birthday...', "error");
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
            dataType: 'json',
            headers: {
                'X-Auth-Token': $("input[name='csrf']").val()
            },
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
                status: $('#status_id').val(),
                year: $('#cboyears').val()
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
                if (error.responseText) {
                    var msg = JSON.parse(error.responseText)
                    $.notify(msg.msg, "error");
                }
                return;
            }
        });
    } else {
        $.ajax({
            url: '../server/child/' + $('#child_id').val(),
            async: false,
            type: 'PUT',
            headers: {
                'X-Auth-Token': $("input[name='csrf']").val()
            },
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
                status: $('#status_id').val(),
                year: $('#cboyears').val()
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
                if (error.responseText) {
                    var msg = JSON.parse(error.responseText)
                    $.notify(msg.msg, "error");
                }
                return;
            }
        });
    }
}


function fetch_all_child() {
    console.log('fetch_all_child');
    $('#dataTables-example tbody > tr').remove();
    $.ajax({
        url: '../server/child/',
        async: false,
        type: 'GET',
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
        dataType: 'json',
        success: function(response) {
            if (response) {
                if (response.childs.length > 0) {
                    var decode = [];
                    decode = response.childs;
                    for (var i = 0; i < decode.length; i++) {
                        var row = decode;
                        var html = '<tr class="odd gradeX">\
                                        <td class="">' + row[i].lname + ', ' + row[i].fname + '</td>\
                                        <td class="">' + moment(row[i].dob).format('MM-DD-YYYY') + '</td>\
                                        <td class="">' + row[i].gender + '</td>\
                                        <td class="center">' + row[i].status + '</td>\
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
            if (error.responseText) {
                var msg = JSON.parse(error.responseText)
                $.notify(msg.msg, "error");
            }
            return;
        }
    });
}

function deletedata(id) {
    $.ajax({
        url: '../server/child/' + id,
        async: true,
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
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

        },
        error: function(error) {
            console.log('error: ', error);
            if (error.responseText) {
                var msg = JSON.parse(error.responseText)
                $.notify(msg.msg, "error");
            }
            return;
        }
    });
}

function getData(status, id) {
    $.ajax({
        url: '../server/child/' + id,
        async: true,
        type: 'GET',
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
        success: function(response) {
            var decode = response;
            console.log('response: ', decode);
            if (decode.success == true) {
                var child = decode.child;

                $("#child_id").val(child.id);
                $("#fname").val(child.fname);
                $("#mname").val(child.mname);
                $("#lname").val(child.lname);
                $("#address").val(child.address);
                $("#location").val(child.locationID);
                $("#height").val(child.height);
                $("#weight").val(child.weight);
                $("#month").val(child.months);

                var dataToSplit = child.dob;
                if (dataToSplit != null) {
                    var i = dataToSplit.slice(0, 10).split('-');
                    var date = i[0] + "-" + i[1] + "-" + i[2];
                    $('#date').val(date);
                }

                $("#gender").val(child.gender);
                $("#status").val(child.status_id);
                $("#cboyears").val(child.year_id);
                $('#lblStatus').text(child.status);
                $('#status_id').val(child.status_id);

                if (status === 'view') {
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
                    $("#date").prop('disabled', true);
                    $("#cboyears").prop('disabled', true);

                    $("#btn-save").attr('disabled', true);
                } else {
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
                    $("#date").prop('disabled', false);
                    $("#cboyears").prop('disabled', false);

                    $("#btn-save").removeAttr('disabled');
                }


                $('#childModal').modal('show');
            } else if (decode.success === false) {
                $.notify(decode.msg, "error");
                return;
            }

        },
        error: function(error) {
            console.log('error: ', error);
            if (error.responseText) {
                var msg = JSON.parse(error.responseText)
                $.notify(msg.msg, "error");
            }
            return;
        }
    });
}

function fetch_barangay() {
    $.ajax({
        url: '../server/location/',
        async: true,
        type: 'GET',
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
        success: function(response) {
            var decode = response;
            $('#location').empty();
            for (var i = 0; i < decode.locations.length; i++) {
                var row = decode.locations;
                var html = '<option id="' + row[i].id + '" value="' + row[i].id + '">' + row[i].name + '</option>';
                $("#location").append(html);
            }
        },
        error: function(error) {
            console.log("Error:");
            console.log(error.responseText);
            console.log(error.message);
            if (error.responseText) {
                var msg = JSON.parse(error.responseText)
                $.notify(msg.msg, "error");
            }
            return;
        }
    });
}

function fetch_year() {
    $.ajax({
        url: '../server/yearterms/',
        async: true,
        type: 'GET',
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
        success: function(response) {
            var decode = response;
            $('#cboyears').empty();
            for (var i = 0; i < decode.yearterms.length; i++) {
                var row = decode.yearterms;
                var html = '<option id="' + row[i].id + '" value="' + row[i].id + '">' + row[i].year + ' - (' + row[i].terms + ') ' + '</option>';
                $("#cboyears").append(html);
            }
        },
        error: function(error) {
            console.log("Error:");
            console.log(error.responseText);
            console.log(error.message);
            if (error.responseText) {
                var msg = JSON.parse(error.responseText)
                $.notify(msg.msg, "error");
            }
            return;
        }
    });
}

function getStatus(age, weight) {
    console.log('age: ', age, ' weight: ', weight);
    $.ajax({
        url: '../server/status/' + age + '/' + weight,
        async: true,
        type: 'GET',
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
        success: function(response) {
            console.log('response: ', response);
            $('#lblStatus').text(response.CNO);
            $('#status_id').val(response.CNO_id);
        },
        error: function(error) {
            console.log("Error:");
            console.log(error.responseText);
            console.log(error.message);
            if (error.responseText) {
                var msg = JSON.parse(error.responseText)
                $.notify(msg.msg, "error");
            }
            return;
        }
    });
}
