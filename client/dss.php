<?php 
session_start();
if(!isset($_SESSION['users']) || empty($_SESSION['users'])){
    header("Location: index.php");
}elseif (isset($_SESSION['users']) && !empty($_SESSION['users'])) {
    if($_SESSION['users']['access'][6]['allow'] != 1){
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
 <?php require_once('include/header.php'); ?>

<body>
    <div id="wrapper">
        <?php require_once('include/nav-top.php'); ?>
        <?php require_once('include/sidebar.php'); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <input type="hidden" name="csrf" value="<?php echo $_SESSION['form_token'];?>">
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-primary" onclick="printToPrinter()">Print Forms</a>
                        <a class="btn btn-info" onclick="refresh()">Refresh</a>
                        <div class="col-lg-3 pull-right">
                            <select class="form-control" id="cboFilters"></select>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row" id="printTable">
                    <br>
                    <h2 class="text-center" id="lblPrint"></h2>
                    <br>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div id="table"></div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div id="morris-bar-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div id="morris-donut-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="../assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="../assets/js/morris/morris.js"></script>
    <!-- Notify -->
    <script src="../assets/bower_components/notifyjs/dist/notify.js"></script>
    <script src="../assets/bower_components/notifyjs/dist/styles/bootstrap/notify-bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="../js/pages/dss.js"></script>
    <script src="../js/pages/toprint.js"></script>
    <script src="../assets/js/custom.js"></script>
</body>

</html>