$(document).ready(function() {
    refresh();

    $("#cboFilters").bind("change", filters);
});

function filters() {
    var value = $("#cboFilters").val();
    $('#cboOptions').empty();

    switch (value) {
        case 'rank':
            break;
        case 'barangay':
            $.ajax({
                url: '../server/location/',
                async: true,
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
            break;
        case 'gender':
            var html = '<option value="Male">Male</option>';
            var html1 = '<option value="Female">Female</option>';

            $("#cboOptions").append(html);
            $("#cboOptions").append(html1);
            break;
    }
}

function refresh() {
    var print = window.sessionStorage['print'];
    switch (print) {
        case 'normal':
            $('#lblPrint').text('List of Normal Childrens');
            loadData('../server/status/normal');
            break;
        case 'under':
            $('#lblPrint').text('List of Underweight Childrens');
            loadData('../server/status/under');
            break;
        case 'severe-under':
            $('#lblPrint').text('List of Severely Underweight Childrens');
            loadData('../server/status/severe-under');
            break;
        case 'over':
            $('#lblPrint').text('List of Overweight Childrens');
            loadData('../server/status/over');
            break;
        case 'severe-under-total':
            $('#lblPrint').text('List of Severely Underweight and Underweight with Total Childrens');
            loadData('../server/status/severe-under-total');
            break;
        default:

            break;
    }
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


function loadData(url) {
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

function exportToExcel(obj,elem,sheetname) {
    return ExcellentExport.excel(obj, elem, sheetname);
}

