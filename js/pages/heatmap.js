var circles = [];

$(document).ready(function() {
    showHeatMap();
});

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
        url: '../server/location/',
        async: false,
        type: 'GET',
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
        success: function(response) {
            var decode = response;

            var canvas = document.getElementById('viewport');
            var context = canvas.getContext('2d');

            for (var i = 0; i < decode.locations.length; i++) {
                var row = decode.locations;

                var str = row[i].nw_path.split(',');
                var str1 = row[i].ow_path.split(',');
                var str2 = row[i].suw_path.split(',');
                var str3 = row[i].uw_path.split(',');

                drawCircle(context, parseInt(str[0]), parseInt(str[1]), color_array[0], row[i].diameter, 1, "#003300", "white", "center", "bold 12px Arial", "", circles, row[i].name + '-Normal');
                drawCircle(context, parseInt(str1[0]), parseInt(str1[1]), color_array[1], row[i].diameter, 1, "#003300", "white", "center", "bold 32px Arial", "", circles, row[i].name + '-Underweight');
                drawCircle(context, parseInt(str2[0]), parseInt(str2[1]), color_array[2], row[i].diameter, 1, "#003300", "white", "center", "bold 32px Arial", "", circles, row[i].name + '-Severely');
                drawCircle(context, parseInt(str3[0]), parseInt(str3[1]), color_array[3], row[i].diameter, 1, "#003300", "white", "center", "bold 32px Arial", "", circles, row[i].name + '-Over');
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
    draw(context, x, y, fillcolor, radius, linewidth, strokestyle, fontcolor, textalign, fonttype, filltext);
    var circle = new Circle(parseInt(x), parseInt(y), parseFloat(radius), name);
    console.log('circle: ', circle);
    circles.push(circle);
};


$('#viewport').click(function(e) {
    var clickedX = e.pageX - this.offsetLeft;
    var clickedY = e.pageY - this.offsetTop;

    console.log('clickedX: ', clickedX);
    console.log('clickedY: ', clickedY);

    for (var i = 0; i < circles.length; i++) {
        if (clickedX < circles[i].right && clickedX > circles[i].left && clickedY > circles[i].top && clickedY < circles[i].bottom) {
            console.log('clicked number ' + (i + 1));
        }
    }
});
