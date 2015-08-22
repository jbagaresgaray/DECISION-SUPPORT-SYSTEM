function printToPrinter() {

    var divToPrint = document.getElementById('printTable');
    var newWin = window.open('', 'Print-Window', 'width=600,height=400');

    var content = '<!DOCTYPE html>\
		<html xmlns="http://www.w3.org/1999/xhtml">\
		<head>\
		    <meta charset="utf-8">\
		    <meta name="viewport" content="width=device-width, initial-scale=1.0">\
		    <meta name="description" content="">\
		    <meta name="author" content="">\
			<title></title>\
    		<link rel="stylesheet" href="../assets/css/bootstrap.css">\
    		<link rel="stylesheet" href="../assets/css/font-awesome.css">\
		    <style type="text/css" media="screen">body {padding-top: 50px;} </style>\
		</head>\
    	<body onload="window.print()">\
    	<div class="container">\
        	<div class="row">\
        		<div class="col-xs-12">\
                	<div class="text-center">\
                	<h3>\
                        <img src="../assets/img/logo1.png" alt="Voting System" style="width:70px;">\
                        Sample Header\
                        <img src="../assets/img/logo2.png" alt="Voting System" style="width:70px;">\
                    </h3>\
                </div>\
                <div class="row">\
                    <div class="col-xs-12">'+ divToPrint.innerHTML + '</div>\
                </div>\
            </div>\
        </div>\
		</body>\
    	</html>';

    newWin.document.open();
    newWin.document.write(content);
    newWin.document.close();

    // setTimeout(function() {
    //     newWin.close();
    // }, 10);
}
