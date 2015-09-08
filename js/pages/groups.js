$(document).ready(function() {
    fetch_all_groups();
});

function groupTable($rows, startIndex, total) {
    if (total === 0) {
        return;
    }
    var i, currentIndex = startIndex,
        count = 1,
        lst = [];
    var tds = $rows.find('td:eq(' + currentIndex + ')');
    var ctrl = $(tds[0]);
    lst.push($rows[0]);
    for (i = 1; i <= tds.length; i++) {
        if (ctrl.text() == $(tds[i]).text()) {
            count++;
            $(tds[i]).addClass('deleted');
            lst.push($rows[i]);
        } else {
            if (count > 1) {
                ctrl.attr('rowspan', count);
                groupTable($(lst), startIndex + 1, total - 1)
            }
            count = 1;
            lst = [];
            ctrl = $(tds[i]);
            lst.push($rows[i]);
        }
    }
}

$(document).on("click", ".edit-icon", function() {
    var id = $(this).data('id');
    resetHelpInLine();

    getData('update', id);
});


function refresh() {
    fetch_all_users();
}

function resetHelpInLine() {
    $('span.help-inline').each(function() {
        $(this).text('');
    });
}

function fetch_all_groups() {
    $('#dataTables-example tbody > tr').remove();
    $.ajax({
        url: '../server/users/privilege',
        async: false,
        type: 'GET',
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
        dataType: 'json',
        success: function(response) {
            var decode = response;
            if (decode) {
                if (decode.usergroup.length > 0) {
                    for (var i = 0; i < decode.usergroup.length; i++) {
                        var row = decode.usergroup;
                        var html = '<tr class="odd gradeX">\
                                        <td class="text-center">' + row[i].level + '</td>\
                                        <td class="">' + row[i].module + '</td>\
                                        <td class="text-center">' + ((row[i].allow == 1) ? '<i class="fa fa-check"></i>' : '<i class="fa fa-times text-danger"></i>') + '</td>\
                                        <td class="">\
                                            <div class="text-right">\
                                                <a class="edit-icon btn btn-success btn-xs" data-id="' + row[i].id + '">\
                                                  <i class="fa fa-pencil"></i>\
                                                </a>\
                                            </div>\
                                        </td>\
                                    </tr>';
                        $("#dataTables-example tbody").append(html);
                    }
                    
                    groupTable($('#dataTables-example tr:has(td)'), 0, 1);
                    $('#dataTables-example .deleted').remove();

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


function save() {
    $.ajax({
        url: '../server/users/privilege/' + $('#id').val(),
        async: false,
        type: 'PUT',
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
        data: {
            allow: $("#checkboxRead").prop("checked")
        },
        success: function(response) {
            var decode = response;
            if (decode.success == true) {
                $('#groupModal').modal('hide');
                fetch_all_groups();
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

function getData(status, id) {
    $.ajax({
        url: '../server/users/privilege/' + id,
        async: true,
        type: 'GET',
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
        success: function(response) {
            var decode = response;
            console.log('response: ', decode);
            if (decode.success == true) {
                var data = decode.access;

                $('#lblModule').text(data.module);
                $('#lblLevel').text(data.level);
                $('#id').val(data.id);

                var allow = (data.allow == "1" ? true : false);

                $("#checkboxRead").prop("checked", allow);

                $('#groupModal').modal('show');
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
