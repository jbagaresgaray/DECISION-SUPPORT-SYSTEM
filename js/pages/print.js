$(document).ready(function() {
    filters();
    $("#cboFilters").bind("change", filters);
});

function refresh() {
    filters();
}

function exportToExcel(obj, elem, sheetname) {
    return ExcellentExport.excel(obj, elem, sheetname);
}

function filters() {
    var value = $("#cboFilters").val();
    $('#cboOptions').empty();
    switch (value) {
        case 'all':
            $('#cboOptions').hide();
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
            $('#cboOptions').hide();
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
            $('#cboOptions').show();
            populateLocation();

            $("#cboOptions").unbind();
            $("#cboOptions").bind("change", filterLocation);
            filterLocation();
            break;
        case 'gender':
            $('#cboOptions').show();
            $("#cboOptions").append('<option value="Male">Male</option>');
            $("#cboOptions").append('<option value="Female">Female</option>');

            $("#cboOptions").unbind();
            $("#cboOptions").bind("change", filterGender);

            filterGender();
            break;
        case 'brackets':
            $('#cboOptions').show();
            $("#cboOptions").append('<option value="0-5">0-5</option>');
            $("#cboOptions").append('<option value="6-10">6-10</option>');
            $("#cboOptions").append('<option value="11-15">11-15</option>');
            $("#cboOptions").append('<option value="16-20">16-20</option>');
            $("#cboOptions").append('<option value="21-25">21-25</option>');
            $("#cboOptions").append('<option value="26-30">26-30</option>');
            $("#cboOptions").append('<option value="31-35">31-35</option>');
            $("#cboOptions").append('<option value="36-40">36-40</option>');
            $("#cboOptions").append('<option value="41-45">41-45</option>');
            $("#cboOptions").append('<option value="46-50">46-50</option>');
            $("#cboOptions").append('<option value="51-55">51-55</option>');
            $("#cboOptions").append('<option value="56-60">56-60</option>');
            $("#cboOptions").append('<option value="61-65">61-65</option>');
            $("#cboOptions").append('<option value="66-71">66-71</option>');

            $("#cboOptions").unbind();
            $("#cboOptions").bind("change", filterBrackets);

            filterBrackets();
            break;
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

function populateLocation() {
    $.ajax({
        url: '../server/location/',
        async: false,
        type: 'GET',
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
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
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
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
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
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
            headers: {
                'X-Auth-Token': $("input[name='csrf']").val()
            },
            dataType: 'json',
            success: function(response) {
                var decode = response;
                if (decode) {
                    if (decode.data.length > 0) {
                        for (var i = 0; i < decode.data.length; i++) {
                            var row = decode.data;
                            var html = '<tr class="odd gradeX">\
                                        <td class="text-left">' + row[i].name + '</td>\
                                        <td class="text-center">' + row[i].under + '</td>\
                                        <td class="text-center">' + row[i].severely + '</td>\
                                        <td class="text-center">' + row[i].Total + '</td>\
                                        <td class="text-center">' + row[i].rank + '</td>\
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
            headers: {
                'X-Auth-Token': $("input[name='csrf']").val()
            },
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
                                        <td class="center">' + row[i].Total + '</td>\
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

function filterGender() {
    var table = '<table class="table table-striped table-bordered table-hover" id="dataTables-example">\
                <thead><tr>\
                <th>Name</th><th>Birthdate</th><th>Gender</th>\
                <th>Age / Months</th><th>Weight</th><th>Status</th>\
                </tr></thead><tbody></tbody></table>';
    var print = window.sessionStorage['print'];
    var urlString = null;

    switch (print) {
        case 'normal':
            $('#lblPrint').text('List of Normal ' + $('#cboOptions').val() + ' Childrens');
            urlString = '../server/status/gender/normal/' + $('#cboOptions').val();
            break;
        case 'under':
            $('#lblPrint').text('List of Underweight ' + $('#cboOptions').val() + ' Childrens');
            urlString = '../server/status/gender/under/' + $('#cboOptions').val();
            break;
        case 'severe-under':
            $('#lblPrint').text('List of Severely Underweight ' + $('#cboOptions').val() + ' Childrens');
            urlString = '../server/status/gender/severe-under/' + $('#cboOptions').val();
            break;
        case 'over':
            $('#lblPrint').text('List of Overweight ' + $('#cboOptions').val() + ' Childrens');
            urlString = '../server/status/gender/over/' + $('#cboOptions').val();
            break;
        case 'severe-under-total':
            $('#lblPrint').text('List of Severely Underweight and Underweight ' + $('#cboOptions').val() + ' with Total Childrens');
            urlString = '../server/status/gender/severe-under-total/' + $('#cboOptions').val();
            break;
    }

    $('#printTable').empty();
    $('#printTable').append(table);
    $('#dataTables-example tbody > tr').remove();


    $.ajax({
        url: urlString,
        async: true,
        type: 'GET',
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
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

function filterBrackets() {
    var table = '<table class="table table-striped table-bordered table-hover" id="dataTables-example">\
                <thead><tr>\
                <th>Name</th><th>Birthdate</th><th>Gender</th>\
                <th>Age / Months</th><th>Weight</th><th>Status</th>\
                </tr></thead><tbody></tbody></table>';
    var print = window.sessionStorage['print'];
    var urlString = null;

    switch (print) {
        case 'normal':
            $('#lblPrint').text('List of Normal ' + $('#cboOptions').val() + ' Childrens');
            urlString = '../server/status/brackets/normal/' + $('#cboOptions').val();
            break;
        case 'under':
            $('#lblPrint').text('List of Underweight ' + $('#cboOptions').val() + ' Childrens');
            urlString = '../server/status/brackets/under/' + $('#cboOptions').val();
            break;
        case 'severe-under':
            $('#lblPrint').text('List of Severely Underweight ' + $('#cboOptions').val() + ' Childrens');
            urlString = '../server/status/brackets/severe-under/' + $('#cboOptions').val();
            break;
        case 'over':
            $('#lblPrint').text('List of Overweight ' + $('#cboOptions').val() + ' Childrens');
            urlString = '../server/status/brackets/over/' + $('#cboOptions').val();
            break;
        case 'severe-under-total':
            $('#lblPrint').text('List of Severely Underweight and Underweight ' + $('#cboOptions').val() + ' with Total Childrens');
            urlString = '../server/status/brackets/severe-under-total/' + $('#cboOptions').val();
            break;
    }

    $('#printTable').empty();
    $('#printTable').append(table);
    $('#dataTables-example tbody > tr').remove();


    $.ajax({
        url: urlString,
        async: true,
        type: 'GET',
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
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