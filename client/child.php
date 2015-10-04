<?php 
session_start();

if(!isset($_SESSION['users']) || empty($_SESSION['users'])){
    header("Location: index.php");
}elseif (isset($_SESSION['users']) && !empty($_SESSION['users'])) {
    if($_SESSION['users']['access'][2]['allow'] != 1){
        header("Location: index.php");
    }
}

?>


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
                        <h2>Child List</h2>
                        <a class="btn btn-primary" onclick="create_child()">Add Child</a>
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
                                <div class="input-group"> <span class="input-group-addon">Search: </span>
                                    <input id="filter" type="text" class="form-control" placeholder="Type here...">
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn button-group btn-default active">All</button>
                                        <button type="button" class="btn button-group btn-default">0-5</button>
                                        <button type="button" class="btn button-group btn-default">6-10</button>
                                        <button type="button" class="btn button-group btn-default">11-15</button>
                                        <button type="button" class="btn button-group btn-default">16-20</button>
                                        <button type="button" class="btn button-group btn-default">21-25</button>
                                        <button type="button" class="btn button-group btn-default">26-30</button>
                                        <button type="button" class="btn button-group btn-default">31-35</button>
                                        <button type="button" class="btn button-group btn-default">36-40</button>
                                        <button type="button" class="btn button-group btn-default">41-45</button>
                                        <button type="button" class="btn button-group btn-default">46-50</button>
                                        <button type="button" class="btn button-group btn-default">51-55</button>
                                        <button type="button" class="btn button-group btn-default">56-60</button>
                                        <button type="button" class="btn button-group btn-default">61-65</button>
                                        <button type="button" class="btn button-group btn-default">66-71</button>
                                    </div>
                                    <br>
                                    <table class="table table-striped table-bordered table-hover paginated" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Birthdate</th>
                                                <th>Gender</th>
                                                <th>Age (Months)</th>
                                                <th>Status</th>
                                                <th>Date Updated</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="searchable">
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
         <?php require_once('modals/child.php'); ?>
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
    <!-- Lodash -->
    <script src="../assets/bower_components/lodash/lodash.min.js"></script>
    <!-- filterTable -->
    <script src="../assets/bower_components/filterTable/jquery.filtertable.min.js"></script>

    <!-- CUSTOM SCRIPTS -->
    <script src="../js/pages/child.js"></script>
    <script src="../assets/js/custom.js"></script>
</body>

</html>
