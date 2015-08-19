<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <!-- Add custom CSS here -->
    <link rel="stylesheet" href="../assets/css/font-awesome.css">
    <style type="text/css" media="screen">
        body {
            padding-top: 50px;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- <a class="navbar-brand" href="index.php">HOME</a> -->
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="javascript:window.print()"><i class="fa fa-print"></i> Print</a>
                </li>
                <li><a href="index.php"><i class="fa fa-times"></i> Close</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="text-center">
                    <h3>
                        <img src="../../img/logo.jpg" alt="Voting System" style="width:70px;">
                        Collegio de Sta. Ana de Victorias
                        <br>
                        <strong>Commission on Election</strong>
                    </h3>
                </div>
                <br>
                <div class="invoice-title">
                    <h3>
                        List of Configurations
                    </h3>
                    <h4 class="pull-right">
                        <span id="date_now"></span>
                    </h4>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <table id="tbl_config" class="table table-striped">
                       <thead>
                            <tr role="row">
                                <th>
                                    Election Name
                                </th>
                                <th>
                                    Election Term
                                </th>
                                <th>
                                    Election Date
                                </th>
                                <th>
                                    Time Start
                                </th>
                                <th>
                                    Time End
                                </th>
                            </tr>
                        </thead>
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                        </tbody>
                      </table>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div id="print_content"></div>
            </div>
        </div>
    </div>
    </div>
    <!-- /#page-wrapper -->

    <div class="modal modal-static fade" id="processing-modal" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <img src="../../img/loading.gif" class="icon" />
                            <h4>Processing...</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../../lib/jquery/jquery-2.0.0.min.js"></script>
    <script type="text/javascript" src="../../lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="../../js/config-print.js"></script>
    <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
</body>

</html>
