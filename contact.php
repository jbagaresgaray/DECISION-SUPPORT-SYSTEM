
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="contact">
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
                    <li class="active">
                        <a href="contact.php">Contact</a>
                    </li>
                    <li>
                        <a href="vmgo.php">VMGO</a>
                    </li>
                    <li>
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
            <div class="col-md-12">
                <h1>Contact Us</h1>
                <!-- Advanced Tables -->
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <form role="form"  id="frmProfile" class="padding-top">
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['users']['id'];?>">
                            <input type="hidden" name="csrf" value="<?php echo $_SESSION['form_token'];?>">
                            <div class="form-group" >
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" id="name" placeholder="Name"/>
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email" id= "email" placeholder="Email Address"/>
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group">
                                <label>Mobile No.</label>
                                <input class="form-control" type="text" name="phone" id="phone" placeholder="Mobile No."/>
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group">
                                <label>Message.</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" required="" data-validation-required-message="Please enter a message." aria-invalid="false"></textarea>
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-12">
                                <a id="btn-save" class="btn btn-primary" href="javascript:send()">Send</a>
                                <a class="btn btn-warning" href="javascript:clear()">Clear</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>
    <!-- /. PAGE WRAPPER  -->
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Notify -->
    <script src="assets/bower_components/notifyjs/dist/notify.js"></script>
    <script src="assets/bower_components/notifyjs/dist/styles/bootstrap/notify-bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="js/pages/mail.js"></script>
</body>

</html>
