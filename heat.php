<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Web App</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/slider.css" rel="stylesheet">

    <style type="text/css">
        canvas, img { display:block; margin:1em auto; }
        canvas { background:url('map.png') }
        .color-swatch {
            float: left;
            width: 60px;
            height: 60px;
            margin: 0 5px;
            border-radius: 3px;
        }
        .bg-normal{
            text-align: center;
            font-size: 12px;
            color: #fff;
            background-color: #0070C0;
        }
        .bg-underweight{
            text-align: center;
            font-size: 12px;
            color: #fff;
            background-color: #A8D08D;
        }
        .bg-severely{
            text-align: center;
            font-size: 12px;
            color: #fff;
            background-color: #E97E37;
        }
        .bg-over{
            text-align: center;
            font-size: 12px;
            color: #fff;
            background-color: #CF000F;
        }
 </style>

</head>
<body id="about">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img src="assets/img/logo1.png" alt="" width="40px;" style="margin-top: -10px;">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php">About Us</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <li>
                        <a href="vmgo.php">VMGO</a>
                    </li>
                    <li class="active">
                        <a href="heat.php">Heat Map</a>
                    </li>
                    <li>
                        <a href="client/index.php">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <img src="assets/img/logo1.png" alt="DS System" style="width:80px;" class="pull-left">
                <img src="assets/img/logo2.png" alt="DS System" style="width:80px;" class="pull-right">
                <h2>NUTRITION OFFICE MANAGEMENT INFORMATION SYSTEM WITH DECISION SUPPORT SYSTEM</h2>   
            </div>
        </div> 
        <hr />
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="color-swatches">
                    <div class="color-swatch bg-normal">Normal</div>
                    <div class="color-swatch bg-underweight">Under Weight</div>
                    <div class="color-swatch bg-severely">Severely Under Weight</div>
                    <div class="color-swatch bg-over">Over Weight</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <canvas id="viewport" width="1010" height="763"></canvas>
            </div>
        </div>   
    </div>
    <!-- /. PAGE WRAPPER  -->
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="js/heat.js"></script>
</body>

</html>
