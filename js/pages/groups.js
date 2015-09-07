$(document).ready(function() {
    fetch_all_users();

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
    resetHelpInLine();

    getData('update', id);
});

$(document).on("click", ".view-icon", function() {
    var id = $(this).data('id');
    resetHelpInLine();

    getData('view', id);
});


function create_user() {
    $("#fname").val('');
    $("#lname").val('');
    $("#username").val('');
    $("#password").val('');
    $("#email").val('');
    $("#mobileno").val('');
    $("#level").val('');

    $("#password").show();
    $("#password2").show();
    $("#password").prev('label').show();
    $("#password2").prev('label').show();

    $("#fname").prop('disabled', false);
    $("#lname").prop('disabled', false);
    $("#level").prop('disabled', false);
    $("#username").prop('disabled', false);
    $("#email").prop('disabled', false);
    $("#mobileno").prop('disabled', false);

    $('#userModal').modal('show');
}

function resetHelpInLine() {
    $('span.help-inline').each(function() {
        $(this).text('');
    });
}

function refresh() {
    fetch_all_users();
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

    if ($('#lname').val() == '') {
        $('#lname').next('span').text('Last Name is required.');
        empty = true;
    }

    if ($('#email').val() == '') {
        $('#email').next('span').text('Email Address is required.');
        empty = true;
    }

    if ($('#username').val() == '') {
        $('#username').next('span').text('Username is required.');
        empty = true;
    }

    if (empty == true) {
        $.notify('Please input all the required fields correctly.', "error");
        return false;
    }


    if ($('#user_id').val() == '') {

        if ($('#password').val() == '') {
            $('#password').next('span').text('Password is required.');
            empty = true;
        }

        if ($('#password').val() !== $('#password2').val()) {
            $('#month').next('span').text('Password and Confirm password must be the same.');
            empty = true;
        }

        $.ajax({
            url: '../server/users/',
            async: false,
            type: 'POST',
            headers: {
                'X-Auth-Token': $("input[name='csrf']").val()
            },
            data: {
                fname: $('#fname').val(),
                lname: $('#lname').val(),
                username: $('#username').val(),
                password: $('#password').val(),
                mobileno: $('#mobileno').val(),
                email: $('#email').val(),
                level: $('#level').val()
            },
            success: function(response) {
                var decode = response;

                if (decode.success == true) {
                    $('#userModal').modal('hide');
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
            url: '../server/users/' + $('#user_id').val(),
            async: false,
            type: 'PUT',
            headers: {
                'X-Auth-Token': $("input[name='csrf']").val()
            },
            data: {
                fname: $('#fname').val(),
                lname: $('#lname').val(),
                username: $('#username').val(),
                mobileno: $('#mobileno').val(),
                email: $('#email').val(),
                level: $('#level').val()
            },
            success: function(response) {
                var decode = response;

                if (decode.success == true) {
                    $('#userModal').modal('hide');
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


function fetch_all_users() {
    $('#dataTables-example tbody > tr').remove();
    $.ajax({
        url: '../server/users/',
        async: false,
        type: 'GET',
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
        dataType: 'json',
        success: function(response) {
            var decode = response;
            if (decode) {
                if (decode.userdata.length > 0) {
                    for (var i = 0; i < decode.userdata.length; i++) {
                        var row = decode.userdata;
                        var html = '<tr class="odd gradeX">\
                                        <td class="">' + row[i].lname + ', ' + row[i].fname + '</td>\
                                        <td class="">' + row[i].email + '</td>\
                                        <td class="">' + row[i].mobileno + '</td>\
                                        <td class="center" width="15%">' + row[i].level + '</td>\
                                        <td class=" " width="20%">\
                                            <a href="#" data-id="' + row[i].id + '" class="view-icon">view</a>|\
                                            <a href="#" data-id="' + row[i].id + '" class="update-icon">update</a>|\
                                            <a href="#" data-id="' + row[i].id + '" class="delete-icon">delete</a>\
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
        url: '../server/users/' + id,
        async: true,
        type: 'DELETE',
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
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
        url: '../server/users/' + id,
        async: true,
        type: 'GET',
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
        success: function(response) {
            var decode = response;
            console.log('response: ', decode);
            if (decode.success == true) {
                var data = decode.userdata;

                $("#user_id").val(data.id);
                $("#fname").val(data.fname);
                $("#lname").val(data.lname);
                $("#level").val(data.level);
                $("#username").val(data.username);
                $("#email").val(data.email);
                $("#mobileno").val(data.mobileno);

                if (status === 'view') {
                    $("#fname").prop('disabled', true);
                    $("#lname").prop('disabled', true);
                    $("#level").prop('disabled', true);
                    $("#username").prop('disabled', true);
                    $("#password").hide();
                    $("#password").prev('label').hide();
                    $("#password2").hide();
                    $("#password2").prev('label').hide();
                    $("#email").prop('disabled', true);
                    $("#mobileno").prop('disabled', true);

                    $("#btn-save").attr('disabled', true);
                } else {
                    $("#fname").prop('disabled', false);
                    $("#lname").prop('disabled', false);
                    $("#level").prop('disabled', false);
                    $("#username").prop('disabled', false);
                    $("#password").hide();
                    $("#password").prev('label').hide();
                    $("#password2").hide();
                    $("#password2").prev('label').hide();
                    $("#email").prop('disabled', false);
                    $("#mobileno").prop('disabled', false);

                    $("#btn-save").removeAttr('disabled');
                }
                $('#userModal').modal('show');
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
