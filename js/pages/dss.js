$(document).ready(function() {
    populateYear();
    filters();
    $("#cboFilters").bind("change", filters);
});

function refresh(){
    filters();
}

function filters() {
    var value = $("#cboFilters").val();
    var title = window.sessionStorage['title'];
    $('#lblPrint').text(title);

    var print = window.sessionStorage['dss'];
    switch (print) {
        case 'severeunder':
            loadDSS('../server/status/dss/severeunder', value);
            break;
        case 'under':
            loadDSS('../server/status/dss/under', value);
            break;
        case 'severe-under':
            loadDSS('../server/status/dss/severe-under', value);
            break;
        case 'severe-under-total':
            loadDSS('../server/status/dss/severe-under-total', value);
            break;
    }
}

function populateYear() {
    $("#cboFilters").empty();
    $.ajax({
        url: '../server/yearterms/',
        async: false,
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
        type: 'GET',
        success: function(response) {
            var decode = response;
            for (var i = 0; i < decode.yearterms.length; i++) {
                var row = decode.yearterms;
                var html = '<option id="' + row[i].id + '" value="' + row[i].id + '">' + row[i].year + '</option>';
                $("#cboFilters").append(html);
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

function loadDSS(url, year) {
    var graph = [];
    var donut = [];
    $('#table').empty();
    $('#morris-bar-chart').empty();
    $('#morris-donut-chart').empty();
    
    var table = '<table class="table table-striped table-bordered table-hover" id="dataTables-example">\
                <thead><tr>\
                <th>BARANGAY</th><th>NO. OF CHILDRENS</th><th>RANK</th>\
                </tr></thead><tbody></tbody></table>';
    $('#table').append(table);

    $('#table tbody > tr').remove();
    $.ajax({
        url: url + '/' + year,
        async: true,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            var colors_array = ["#9CC4E4", "#3A89C9", "#F26C4F", "#2ECC71", "#F7CA18"];
            var decode = response;
            if (decode) {
                if (decode.data.length > 0) {
                    graph.slice(0,graph.length);
                    donut.slice(0,donut.length); 
                    for (var i = 0; i < decode.data.length; i++) {
                        var row = decode.data;

                        graph.push({
                            y: row[i].name,
                            a: row[i].Count
                        });

                        donut.push({
                            label: row[i].name,
                            value: row[i].Count
                        });

                        var html = '<tr class="odd gradeX">\
                                        <td class="">' + row[i].name + '</td>\
                                        <td class="">' + row[i].Count + '</td>\
                                        <td class="center">' + row[i].rank + '</td>\
                                </tr>';
                        $("#table tbody").append(html);
                    }

                    Morris.Bar({
                        element: 'morris-bar-chart',
                        data: graph,
                        barGap: 4,
                        barSizeRatio: 0.55,
                        xkey: 'y',
                        ykeys: ['a'],
                        labels: ['Child Count'],
                        hideHover: 'auto',
                        barColors: function(row, series, type) {
                            if (type === 'bar') {
                                return colors_array[row.x];
                            }
                        },
                        resize: true
                    });

                    Morris.Donut({
                        element: 'morris-donut-chart',
                        data: donut,
                        colors: colors_array,
                        resize: true
                    });

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
