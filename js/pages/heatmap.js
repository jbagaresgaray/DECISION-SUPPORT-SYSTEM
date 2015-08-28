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

            var imageObj = new Image();
            imageObj.onload = function() {
                context.drawImage(imageObj, 0, 0);

                for (var i = 0; i < decode.locations.length; i++) {
                    var row = decode.locations;

                    var str = row[i].nw_path.split(',');
                    context.moveTo(parseInt(str[0]), parseInt(str[1]));
                    context.beginPath();
                    context.arc(parseInt(str[0]), parseInt(str[1]), row[i].diameter, 0, 2 * Math.PI, false);
                    context.fillStyle = color_array[0];
                    context.fill();
                    context.lineWidth = 1;
                    context.strokeStyle = '#003300';
                    context.stroke();

                    var circle = new Circle(parseInt(str[0]), parseInt(str[1]), row[i].diameter,row[i].name + '-Normal');
                    circles.push(circle);

                    var str1 = row[i].ow_path.split(',');
                    context.moveTo(parseInt(str1[0]), parseInt(str1[1]));
                    context.beginPath();
                    context.arc(parseInt(str1[0]), parseInt(str1[1]), row[i].diameter, 0, 2 * Math.PI, false);
                    context.fillStyle = color_array[1];
                    context.fill();
                    context.lineWidth = 1;
                    context.strokeStyle = '#003300';
                    context.stroke();

                    var circle1 = new Circle(parseInt(str1[0]), parseInt(str1[1]), row[i].diameter,row[i].name+'-Underweight');
                    circles.push(circle1);

                    var str2 = row[i].suw_path.split(',');
                    context.moveTo(parseInt(str2[0]), parseInt(str2[1]));
                    context.beginPath();
                    context.arc(parseInt(str2[0]), parseInt(str2[1]), row[i].diameter, 0, 2 * Math.PI, false);
                    context.fillStyle = color_array[2];
                    context.fill();
                    context.lineWidth = 1;
                    context.strokeStyle = '#003300';
                    context.stroke();

                    var circle2 = new Circle(parseInt(str2[0]), parseInt(str2[1]), row[i].diameter,row[i].name+'-Severely');
                    circles.push(circle2);

                    var str3 = row[i].uw_path.split(',');
                    context.moveTo(parseInt(str3[0]), parseInt(str3[1]));
                    context.beginPath();
                    context.arc(parseInt(str3[0]), parseInt(str3[1]), row[i].diameter, 0, 2 * Math.PI, false);
                    context.fillStyle = color_array[3];
                    context.fill();
                    context.lineWidth = 1;
                    context.strokeStyle = '#003300';
                    context.stroke();

                    var circle3 = new Circle(parseInt(str3[0]), parseInt(str3[1]), row[i].diameter,row[i].name+'-Over');
                    circles.push(circle3);
                }

            };
            imageObj.src = '../map.png';

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


$('#viewport').click(function (e) {
    var clickedX = e.pageX - this.offsetLeft;
    var clickedY = e.pageY - this.offsetTop;
    console.log('clickedX: ',clickedX);
    console.log('clickedY: ',clickedY);

    for (var i = 0; i < circles.length; i++) {
        if ((clickedX < circles[i].right && clickedX > circles[i].left)) {
        	
        	console.log('circles[i].right: ',circles[i].right);
    		console.log('circles[i].left: ',circles[i].left);

    		console.log('circles[i].top: ',circles[i].top);
    		console.log('circles[i].bottom: ',circles[i].bottom);
    		
            // alert ('clicked name ' + (i+1));
        }
    }
});
