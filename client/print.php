<?php 
session_start();

if(!isset($_SESSION['users']) || empty($_SESSION['users'])){
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php require_once('include/header.php'); ?>
<style type="text/css">
    @media print {
        .printTable {
            background-color: white;
            height: 100%;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            margin: 0;
            padding: 15px;
            font-size: 14px;
            line-height: 18px;
        }
    }
</style>
<body>
    <div id="wrapper">
        <?php require_once('include/sidebar.php'); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2 id="lblPrint"></h2>
                        <input type="hidden" name="csrf" value="<?php echo $_SESSION['form_token'];?>">
                        <a class="btn btn-primary" onclick="printToPrinter()">Print Forms</a>
                        <!-- <a class="btn btn-primary" href="toprint.php">Print Forms</a> -->
                        <a class="btn btn-success" download="CNO-data.xls" onclick="exportToExcel(this, 'dataTables-example', 'CNO Sheet Data')">Export to Excel</a>
                        <a class="btn btn-info" onclick="refresh()">Refresh</a>
                        <div class="col-lg-4 pull-right">
                            <select class="form-control" id="cboOptions">
                            </select>
                        </div>
                        <div class="col-lg-3 pull-right">
                            <select class="form-control" id="cboFilters">
                                <option value="all">All</option>
                                <option value="rank"> Rank</option>
                                <option value="barangay"> Barangay</option>
                                <!-- <option value="gender"> Gender</option> -->
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive" id="printTable">
                                </div>
                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
    <!-- Moment JS -->
    <script src="../assets/bower_components/moment/min/moment.min.js"></script>
    <script src="../assets/bower_components/moment/min/locales.min.js"></script>
    <!-- Notify -->
    <script src="../assets/bower_components/notifyjs/dist/notify.js"></script>
    <script src="../assets/bower_components/notifyjs/dist/styles/bootstrap/notify-bootstrap.js"></script>
    <!-- ExportToExcel -->
    <script src="../assets/bower_components/excellentexport/excellentexport.min.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="../js/pages/print.js"></script>
    <script src="../js/pages/toprint.js"></script>
    <script src="../assets/js/custom.js"></script>
</body>

</html>
