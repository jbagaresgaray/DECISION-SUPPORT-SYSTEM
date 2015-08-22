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
                    loadData('../server/status/rank/normal', 'NO. OF NORMAL WEIGHT CHILDREN');
                    break;
                case 'under':
                    $('#lblPrint').text('List of Underweight Childrens');
                    loadData('../server/status/rank/under', 'NO. OF UNDERWEIGHT MALNOURISHED CHILDREN');
                    break;
                case 'severe-under':
                    $('#lblPrint').text('List of Severely Underweight Childrens');
                    loadData('../server/status/rank/severe-under', 'NO. OF SEVERELY UNDERWEIGHT MALNOURISHED CHILDREN');
                    break;
                case 'over':
                    $('#lblPrint').text('List of Overweight Childrens');
                    loadData('../server/status/rank/over', 'NO. OF OVERWEIGHT MALNOURISHED CHILDREN');
                    break;
                case 'severe-under-total':
                    $('#lblPrint').text('List of Severely Underweight and Underweight with Total Childrens');
                    loadData('../server/status/rank/severe-under-total', 'NO. OF UNDERWEIGHT AND SEVERELY UNDERWEIGHT MALNOURISHED CHILDREN');
                    break;
            }
            break;
        case 'barangay':
            populateLocation();
            $("#cboOptions").bind("change", filterLocation);
            filterLocation();
            break;
        case 'gender':
            $("#cboOptions").append('<option value="Male">Male</option>');
            $("#cboOptions").append('<option value="Female">Female</option>');


            break;
    }
}

function filterLocation() {
    var print = window.sessionStorage['print'];
    switch (print) {
        case 'normal':
            $('#lblPrint').text('List of Normal Childrens');
            loadAllByLocation('../server/status/location/normal',$("#cboOptions").val());
            break;
        case 'under':
            $('#lblPrint').text('List of Underweight Childrens');
            loadAllByLocation('../server/status/location/under',$("#cboOptions").val());
            break;
        case 'severe-under':
            $('#lblPrint').text('List of Severely Underweight Childrens');
            loadAllByLocation('../server/status/location/severe-under',$("#cboOptions").val());
            break;
        case 'over':
            $('#lblPrint').text('List of Overweight Childrens');
            loadAllByLocation('../server/status/location/over',$("#cboOptions").val());
            break;
        case 'severe-under-total':
            $('#lblPrint').text('List of Severely Underweight and Underweight with Total Childrens');
            loadAllByLocation('../server/status/location/severe-under-total',$("#cboOptions").val());
            break;
    }
}


function refresh() {

}

function printToPrinter() {

    var divToPrint = document.getElementById('printTable');
    var newWin = window.open('', 'Print-Window', 'width=600,height=400');
    newWin.document.open();
    newWin.document.write('<html><head><style>#in {display:none}</style><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
    newWin.document.close();

    setTimeout(function() {
        newWin.close();
    }, 10);
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
            return;
        }
    });
}


function loadAll(url) {
    $('#printTable').next('table').remove('');

    var table = '<table class="table table-striped table-bordered table-hover" id="dataTables-example">\
                <thead><tr>\
                <th>Name</th><th>Birthdate</th><th>Gender</th>\
                <th>Age / Months</th><th>Weight</th><th>Status</th>\
                </tr></thead><tbody></tbody></table>';
    $(table).insertAfter('#printTable');

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
            return;
        }
    });
}

function loadAllByLocation(url, locationID) {
    $('#printTable').next('table').remove('');

    var table = '<table class="table table-striped table-bordered table-hover" id="dataTables-example">\
                <thead><tr>\
                <th>Name</th><th>Birthdate</th><th>Gender</th>\
                <th>Age / Months</th><th>Weight</th><th>Status</th>\
                </tr></thead><tbody></tbody></table>';
    $(table).insertAfter('#printTable');

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
            return;
        }
    });
}

function loadRank(url, header) {
    $('#printTable').next('table').remove('');
    var table = '<table class="table table-striped table-bordered table-hover" id="dataTables-example">\
                <thead><tr>\
                <th>BARANGAY</th><th>' + header + '</th><th>RANK</th>\
                </tr></thead><tbody></tbody></table>';
    $(table).insertAfter('#printTable');

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
            return;
        }
    });
}

function loadGender(url, header) {
    $('#printTable').next('table').remove('');
    var table = '<table class="table table-striped table-bordered table-hover" id="dataTables-example">\
                <thead><tr>\
                <th>BARANGAY</th><th>MALE</th><th>FEMALE</th><th>RANK</th>\
                </tr></thead><tbody></tbody></table>';
    $(table).insertAfter('#printTable');

    $('#dataTables-example tbody > tr').remove();
    /*$.ajax({
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
            return;
        }
    });*/
}
