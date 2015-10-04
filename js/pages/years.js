$(document).ready(function() {
    fetch_all_years();
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
            headers: {
                'X-Auth-Token': $("input[name='csrf']").val()
            },
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
                if (error.responseText) {
                    var msg = JSON.parse(error.responseText)
                    $.notify(msg.msg, "error");
                }
                return;
            }
        });
    } else {
        $.ajax({
            url: '../server/yearterms/' + $('#id').val(),
            async: false,
            type: 'PUT',
            headers: {
                'X-Auth-Token': $("input[name='csrf']").val()
            },
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
                if (error.responseText) {
                    var msg = JSON.parse(error.responseText)
                    $.notify(msg.msg, "error");
                }
                return;
            }
        });
    }
}


function fetch_all_years() {
    $('#dataTables-example tbody > tr').remove();
    $.ajax({
        url: '../server/yearterms/',
        async: false,
        type: 'GET',
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
        success: function(response) {
            var decode = response;
            if (decode) {
                if (decode.yearterms.length > 0) {
                    for (var i = 0; i < decode.yearterms.length; i++) {
                        var row = decode.yearterms;
                        var html = '<tr class="odd gradeX">\
                                        <td class="">' + row[i].year + '</td>\
                                        <td class="">' + row[i].terms + '</td>\
                                        <td width="10%">\
                                            <a data-id="' + row[i].id + '" href="#" class="view-icon btn btn-success btn-xs"><i class="fa fa-search"></i></a>\
                                            <a data-id="' + row[i].id + '" href="#" class="update-icon btn btn-primary btn-xs"> <i class="fa fa-pencil"></i></a>\
                                            <a data-id="' + row[i].id + '" href="#" class="delete-icon btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>\
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
    }).done(function() {
        $('.pager').remove(); //clears pagination
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
}

function deletedata(id) {
    $.ajax({
        url: '../server/yearterms/' + id,
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
        url: '../server/yearterms/' + id,
        async: true,
        type: 'GET',
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
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
