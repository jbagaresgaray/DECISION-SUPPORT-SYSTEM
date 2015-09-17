var circles = [];

$(document).ready(function() {
    populateYear();

    $("#cboFilters").bind("change", showHeatMap);
    showHeatMap();
});

function populateYear() {
    $("#cboFilters").empty();
    $.ajax({
        url: 'server/yearterms/dss',
        async: false,
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


var Circle = function(x, y, radius, name) {
    this.left = x - radius;
    this.top = y - radius;
    this.right = x + radius;
    this.bottom = y + radius;
    this.name = name;
}


function showHeatMap() {
    var color_array = ['#0070C0', //Normal
        '#A8D08D', //Underweight
        '#E97E37', //Severely 
        '#CF000F' //Over
    ];

    $.ajax({
        url: 'server/location/heatmap/' + $('#cboFilters').val(),
        async: false,
        type: 'GET',
        success: function(response) {
            var decode = response;

            var canvas = document.getElementById('viewport');
            var context = canvas.getContext('2d');
            context.clearRect(0, 0, canvas.width, canvas.height);

            for (var i = 0; i < decode.locations.length; i++) {
                var row = decode.locations;
                
                if (row[i].nw_path !== '') {
                    console.log('nw_path: ',row[i].nw_path);
                    var str = row[i].nw_path.split(',');
                     console.log('str: ',str);
                    drawCircle(context, parseInt(str[0]), parseInt(str[1]), color_array[0], row[i].diameter, 1, "#003300", "white", "center", "bold 12px Arial", row[i].NW_Count, circles, row[i].name + '-Normal');
                }

                if (row[i].ow_path !== '') {
                    console.log('ow_path: ',row[i].ow_path);
                    var str1 = row[i].ow_path.split(',');
                    console.log('str1: ',str1);
                    drawCircle(context, parseInt(str1[0]), parseInt(str1[1]), color_array[3], row[i].diameter, 1, "#003300", "white", "center", "bold 12px Arial", row[i].OW_Count, circles, row[i].name + '-Over');
                }

                if (row[i].suw_path !== '') {
                    console.log('suw_path: ',row[i].suw_path);
                    var str2 = row[i].suw_path.split(',');
                    console.log('str2: ',str2);
                    drawCircle(context, parseInt(str2[0]), parseInt(str2[1]), color_array[2], row[i].diameter, 1, "#003300", "white", "center", "bold 12px Arial",row[i].SUW_Count, circles, row[i].name + '-Severely');
                }

                if (row[i].uw_path !== '') {
                    console.log('uw_path: ',row[i].uw_path);
                    var str3 = row[i].uw_path.split(',');
                    console.log('str3: ',str3);
                    drawCircle(context, parseInt(str3[0]), parseInt(str3[1]), color_array[1], row[i].diameter, 1, "#003300", "white", "center", "bold 12px Arial", row[i].UW_Count, circles, row[i].name + '-Underweight');
                }
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

var draw = function(context, x, y, fillcolor, radius, linewidth, strokestyle, fontcolor, textalign, fonttype, filltext) {
    context.beginPath();
    context.arc(x, y, radius, 0, 2 * Math.PI, false);
    context.fillStyle = fillcolor;
    context.fill();
    context.lineWidth = linewidth;
    context.strokeStyle = strokestyle;
    context.stroke();

    context.fillStyle = fontcolor;
    context.textAlign = textalign;
    context.font = fonttype;

    context.fillText(filltext, x, y);
};

var drawCircle = function(context, x, y, fillcolor, radius, linewidth, strokestyle, fontcolor, textalign, fonttype, filltext, circles, name) {
    console.log('x: ',x);
    console.log('y: ',y);
    console.log('radius: ',radius);

    draw(context, x, y, fillcolor, radius, linewidth, strokestyle, fontcolor, textalign, fonttype, filltext);
    var circle = new Circle(parseInt(x), parseInt(y), parseFloat(radius), name);
    console.log('circle: ',circle);
    circles.push(circle);
};
