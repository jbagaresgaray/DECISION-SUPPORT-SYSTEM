$(document).ready(function() {
    filters();
    $("#cboFilters").bind("change", filters);
});

function filters() {
    var value = $("#cboFilters").val();
    $('#cboOptions').empty();
    switch (value) {
        case 'all':
            var print = window.sessionStorage['print'];
            switch (print) {
                case 'normal':
                    $('#lblPrint').text('List of Normal Childrens');
                    loadAll('../server/status/normal');
                    break;
                case 'under':
                    $('#lblPrint').text('List of Underweight Childrens');
                    loadAll('../server/status/under');
                    break;
                case 'severe-under':
                    $('#lblPrint').text('List of Severely Underweight Childrens');
                    loadAll('../server/status/severe-under');
                    break;
                case 'over':
                    $('#lblPrint').text('List of Overweight Childrens');
                    loadAll('../server/status/over');
                    break;
                case 'severe-under-total':
                    $('#lblPrint').text('List of Severely Underweight and Underweight with Total Childrens');
                    loadAll('../server/status/severe-under-total');
                    break;
            }
            break;
        case 'rank':
            var print = window.sessionStorage['print'];
            switch (print) {
                case 'normal':
                    $('#lblPrint').text('List of Normal Childrens');
                    loadRank('../server/status/rank/normal', 'NO. OF NORMAL WEIGHT CHILDREN');
                    break;
                case 'under':
                    $('#lblPrint').text('List of Underweight Childrens');
                    loadRank('../server/status/rank/under', 'NO. OF UNDERWEIGHT MALNOURISHED CHILDREN');
                    break;
                case 'severe-under':
                    $('#lblPrint').text('List of Severely Underweight Childrens');
                    loadRank('../server/status/rank/severe-under', 'NO. OF SEVERELY UNDERWEIGHT MALNOURISHED CHILDREN');
                    break;
                case 'over':
                    $('#lblPrint').text('List of Overweight Childrens');
                    loadRank('../server/status/rank/over', 'NO. OF OVERWEIGHT MALNOURISHED CHILDREN');
                    break;
                case 'severe-under-total':
                    $('#lblPrint').text('List of Severely Underweight and Underweight with Total Childrens');
                    loadTotalSevereUnder('../server/status/rank/severe-under-total', '');
                    break;
            }
            break;
        case 'barangay':
            populateLocation();
            $("#cboOptions").bind("change", filterLocation);
            filterLocation();
            break;
            /*case 'gender':
                $("#cboOptions").append('<option value="Male">Male</option>');
                $("#cboOptions").append('<option value="Female">Female</option>');

                $("#cboOptions").bind("change", filterGender);
                filterGender();

                break;*/
    }
}

function filterLocation() {
    var print = window.sessionStorage['print'];
    switch (print) {
        case 'normal':
            $('#lblPrint').text('List of Normal Childrens');
            loadAllByLocation('../server/status/location/normal', $("#cboOptions").val());
            break;
        case 'under':
            $('#lblPrint').text('List of Underweight Childrens');
            loadAllByLocation('../server/status/location/under', $("#cboOptions").val());
            break;
        case 'severe-under':
            $('#lblPrint').text('List of Severely Underweight Childrens');
            loadAllByLocation('../server/status/location/severe-under', $("#cboOptions").val());
            break;
        case 'over':
            $('#lblPrint').text('List of Overweight Childrens');
            loadAllByLocation('../server/status/location/over', $("#cboOptions").val());
            break;
        case 'severe-under-total':
            $('#lblPrint').text('List of Severely Underweight and Underweight with Total Childrens');
            loadTotalSevereUnder('../server/status/location/severe-under-total', $("#cboOptions").val());
            break;
    }
}


function refresh() {

}


function exportToExcel(obj, elem, sheetname) {
    return ExcellentExport.excel(obj, elem, sheetname);
}

function populateLocation() {
    $.ajax({
        url: '../server/location/',
        async: false,
        type: 'GET',
        success: function(response) {
            var decode = response;
            for (var i = 0; i < decode.locations.length; i++) {
                var row = decode.locations;
                var html = '<option id="' + row[i].id + '" value="' + row[i].id + '">' + row[i].name + '</option>';
                $("#cboOptions").append(html);
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


function loadAll(url) {
    $('#printTable').empty();

    var table = '<table class="table table-striped table-bordered table-hover" id="dataTables-example">\
                <thead><tr>\
                <th>Name</th><th>Birthdate</th><th>Gender</th>\
                <th>Age / Months</th><th>Weight</th><th>Status</th>\
                </tr></thead><tbody></tbody></table>';
    $('#printTable').append(table);

    $('#dataTables-example tbody > tr').remove();
    $.ajax({
        url: url,
        async: true,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            var decode = response;
            if (decode) {
                if (decode.data.length > 0) {
                    for (var i = 0; i < decode.data.length; i++) {
                        var row = decode.data;
                        var html = '<tr class="odd gradeX">\
                                        <td class="">' + row[i].Fullname + '</td>\
                                        <td class="">' + moment(row[i].dob).format('MM-DD-YYYY') + '</td>\
                                        <td class="">' + row[i].gender + '</td>\
                                        <td class="center">' + row[i].months + '</td>\
                                        <td class="center">' + row[i].weight + '</td>\
                                        <td class="center">' + row[i].status + '</td>\
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

function loadAllByLocation(url, locationID) {
    $('#printTable').empty();

    var table = '<table class="table table-striped table-bordered table-hover" id="dataTables-example">\
                <thead><tr>\
                <th>Name</th><th>Birthdate</th><th>Gender</th>\
                <th>Age / Months</th><th>Weight</th><th>Status</th>\
                </tr></thead><tbody></tbody></table>';
    $('#printTable').append(table);

    $('#dataTables-example tbody > tr').remove();
    $.ajax({
        url: url + '/' + locationID,
        async: true,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            var decode = response;
            if (decode) {
                if (decode.data.length > 0) {
                    for (var i = 0; i < decode.data.length; i++) {
                        var row = decode.data;
                        var html = '<tr class="odd gradeX">\
                                        <td class="">' + row[i].Fullname + '</td>\
                                        <td class="">' + moment(row[i].dob).format('MM-DD-YYYY') + '</td>\
                                        <td class="">' + row[i].gender + '</td>\
                                        <td class="center">' + row[i].months + '</td>\
                                        <td class="center">' + row[i].weight + '</td>\
                                        <td class="center">' + row[i].status + '</td>\
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

function loadRank(url, header) {
    $('#printTable').empty();
    var table = '<table class="table table-striped table-bordered table-hover" id="dataTables-example">\
                <thead><tr>\
                <th>BARANGAY</th><th>' + header + '</th><th>RANK</th>\
                </tr></thead><tbody></tbody></table>';
    $('#printTable').append(table);

    $('#dataTables-example tbody > tr').remove();
    $.ajax({
        url: url,
        async: true,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            var decode = response;
            if (decode) {
                if (decode.data.length > 0) {
                    for (var i = 0; i < decode.data.length; i++) {
                        var row = decode.data;
                        var html = '<tr class="odd gradeX">\
                                        <td class="center">' + row[i].name + '</td>\
                                        <td class="center">' + row[i].noOfchild + '</td>\
                                        <td class="center">' + row[i].rank + '</td>\
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

function loadGender(url, gender) {
    $('#printTable').empty();
    var table = '<table class="table table-striped table-bordered table-hover" id="dataTables-example">\
                <thead><tr>\
                <th>BARANGAY</th><th>MALE</th><th>FEMALE</th><th>RANK</th>\
                </tr></thead><tbody></tbody></table>';

    $('#printTable').append(table);

    $('#dataTables-example tbody > tr').remove();
    $.ajax({
        url: url + '/' + gender,
        async: true,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            var decode = response;
            if (decode) {
                if (decode.data.length > 0) {
                    for (var i = 0; i < decode.data.length; i++) {
                        var row = decode.data;
                        var html = '<tr class="odd gradeX">\
                                        <td class="">' + row[i].Fullname + '</td>\
                                        <td class="">' + moment(row[i].dob).format('MM-DD-YYYY') + '</td>\
                                        <td class="">' + row[i].gender + '</td>\
                                        <td class="center">' + row[i].months + '</td>\
                                        <td class="center">' + row[i].weight + '</td>\
                                        <td class="center">' + row[i].status + '</td>\
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

function loadTotalSevereUnder(url, locationID) {
    console.log('url: ', url);

    $('#printTable').empty();
    var table = '<table class="table table-striped table-bordered table-hover" id="dataTables-example">\
                <thead><tr>\
                <th>BARANGAY</th>\
                <th>NO. OF UNDERWEIGHT MALNOURISHED CHILDREN</th>\
                <th>NO. OF SEVERELY UNDERWEIGHT MALNOURISHED CHILDREN</th>\
                <th>TOTAL OF SEVERELY UNDERWEIGHT AND UNDERWEIGHT MALNOURISHED CHILDREN</th>\
                <th>RANK</th>\
                </tr></thead><tbody></tbody></table>';
    $('#printTable').append(table);

    $('#dataTables-example tbody > tr').remove();

    if (locationID === '') {
        $.ajax({
            url: url,
            async: true,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                var decode = response;
                if (decode) {
                    if (decode.data.length > 0) {
                        for (var i = 0; i < decode.data.length; i++) {
                            var row = decode.data;
                            var html = '<tr class="odd gradeX">\
                                        <td class="center">' + row[i].name + '</td>\
                                        <td class="center">' + row[i].under + '</td>\
                                        <td class="center">' + row[i].severely + '</td>\
                                        <td class="center">' + row[i].total + '</td>\
                                        <td class="center">' + row[i].rank + '</td>\
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
    } else {
        $.ajax({
            url: url + '/' + locationID,
            async: true,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                var decode = response;
                if (decode) {
                    if (decode.data.length > 0) {
                        for (var i = 0; i < decode.data.length; i++) {
                            var row = decode.data;
                            var html = '<tr class="odd gradeX">\
                                        <td class="center">' + row[i].name + '</td>\
                                        <td class="center">' + row[i].under + '</td>\
                                        <td class="center">' + row[i].severely + '</td>\
                                        <td class="center">' + row[i].total + '</td>\
                                        <td class="center">' + row[i].rank + '</td>\
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
}
