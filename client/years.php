<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <?php require_once('include/header.php'); ?>
</head>

<body>
    <div id="wrapper">
        <?php require_once('include/nav-top.php'); ?>
        <?php require_once('include/sidebar.php'); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Year and Terms List</h2>
                        <a class="btn btn-primary" onclick="create_child()">Add Year</a>
                        <a class="btn btn-success" onclick="refresh()">Refresh</a>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Year</th>
                                                <th>Terms</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /. PAGE INNER  -->
         <?php require_once('modals/years.php'); ?>
    </div>
    <!-- /. PAGE WRAPPER  -->
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
    <!-- Notify -->
    <script src="../assets/bower_components/notifyjs/dist/notify.js"></script>
    <script src="../assets/bower_components/notifyjs/dist/styles/bootstrap/notify-bootstrap.js"></script>
    <!-- Bootstrap Datepicker -->
    <script src="../assets/bower_components/moment/min/moment.min.js"></script>
    <script src="../assets/bower_components/moment/min/locales.min.js"></script>
    <script src="../assets/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/bower_components/bootstrap3-dialog/dist/js/bootstrap-dialog.min.js"></script>

    <!-- CUSTOM SCRIPTS -->
    <script src="../js/pages/years.js"></script>
    <script src="../assets/js/custom.js"></script>
</body>

</html>