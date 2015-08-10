<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <?php require_once('include/header.php'); ?>
</head>

<body>
    <div id="wrapper">
         <?php require_once('include/nav.php'); ?>
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
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Birthdate</th>
                                                <th>Gender</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd gradeX">
                                                <td>a</td>
                                                <td>10/20/2015</td>
                                                <td>Male</td>
                                                <td class="center">overweight</td>
                                                <td><a href="#view">view</a>|<a href="#update">update</a>|<a href="#delete">delete</a></td>
                                            </tr>
                                            <tr class="even gradeC">
                                                <td>b</td>
                                                 <td>10/20/2015</td>
                                                <td>Male</td>
                                                <td class="center">normal</td>
                                               <td><a href="#view">view</a>|<a href="#update">update</a>|<a href="#delete">delete</a></td>
                                            </tr>
                                            <tr class="odd gradeA">
                                                <td>c</td>
                                                <td>10/20/2015</td>
                                                <td>Female</td>
                                                <td class="center">overweight</td>
                                               <td><a href="#view">view</a>|<a href="#update">update</a>|<a href="#delete">delete</a></td>
                                            </tr>
                                            <tr class="even gradeA">
                                                <td>d</td>
                                                 <td>10/20/2015</td>
                                                <td>Win 98+</td>
                                                <td class="center">underweight</td>
                                               <td><a href="#view">view</a>|<a href="#update">update</a>|<a href="#delete">delete</a></td>
                                            </tr>
                                            <tr class="odd gradeA">
                                                <td>e</td>
                                                 <td>10/20/2015</td>
                                                <td>Win XP SP2+</td>
                                                <td class="center">normal</td>
                                               <td><a href="#view">view</a>|<a href="#update">update</a>|<a href="#delete">delete</a></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>f</td>
                                                 <td>10/20/2015</td>
                                                <td>Male</td>
                                                <td class="center">normal</td>
                                               <td><a href="#view">view</a>|<a href="#update">update</a>|<a href="#delete">delete</a></td>
                                            </tr>
                                            <tr class="even gradeC">
                                                <td>g</td>
                                                <td>10/20/2015</td>
                                                <td>Male</td>
                                                <td class="center">normal</td>
                                               <td><a href="#view">view</a>|<a href="#update">update</a>|<a href="#delete">delete</a></td>
                                            </tr>
                                            <tr class="odd gradeA">
                                                <td>child 3</td>
                                                 <td>10/20/2015</td>
                                                <td>Female</td>
                                                <td class="center">X</td>
                                               <td><a href="#view">view</a>|<a href="#update">update</a>|<a href="#delete">delete</a></td>
                                            </tr>
                                            <tr class="even gradeA">
                                                <td>Trident</td>
                                                 <td>10/20/2015</td>
                                                <td>Win 98+</td>
                                                <td class="center">X</td>
                                               <td><a href="#view">view</a>|<a href="#update">update</a>|<a href="#delete">delete</a></td>
                                            </tr>
                                            <tr class="odd gradeA">
                                                <td>Trident</td>
                                                 <td>10/20/2015</td>
                                                <td>Win XP SP2+</td>
                                                <td class="center">X</td>
                                               <td><a href="#view">view</a>|<a href="#update">update</a>|<a href="#delete">delete</a></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>child 1</td>
                                                <td>10/20/2015</td>
                                                <td>Male</td>
                                                <td class="center">X</td>
                                               <td><a href="#view">view</a>|<a href="#update">update</a>|<a href="#delete">delete</a></td>
                                            </tr>
                                            <tr class="even gradeC">
                                                <td>child 2</td>
                                                <td>10/20/2015</td>
                                                <td>Male</td>
                                                <td class="center">X</td>
                                               <td><a href="#view">view</a>|<a href="#update">update</a>|<a href="#delete">delete</a></td>
                                            </tr>
                                            <tr class="odd gradeA">
                                                <td>child 3</td>
                                                 <td>10/20/2015</td>
                                                <td>Female</td>
                                                <td class="center">X</td>
                                               <td><a href="#view">view</a>|<a href="#update">update</a>|<a href="#delete">delete</a></td>
                                            </tr>
                                            <tr class="even gradeA">
                                                <td>Trident</td>
                                                 <td>10/20/2015</td>
                                                <td>Win 98+</td>
                                                <td class="center">X</td>
                                               <td><a href="#view">view</a>|<a href="#update">update</a>|<a href="#delete">delete</a></td>
                                            </tr>
                                            <tr class="odd gradeA">
                                                <td>Trident</td>
                                                <td>10/20/2015</td>
                                                <td>Win XP SP2+</td>
                                                <td class="center">X</td>
                                               <td><a href="#view">view</a>|<a href="#update">update</a>|<a href="#delete">delete</a></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>child 1</td>
                                               <td>10/20/2015</td>
                                                <td>Male</td>
                                                <td class="center">X</td>
                                               <td><a href="#view">view</a>|<a href="#update">update</a>|<a href="#delete">delete</a></td>
                                            </tr>
                                            <tr class="even gradeC">
                                                <td>child 2</td>
                                                <td>10/20/2015</td>
                                                <td>Male</td>
                                                <td class="center">X</td>
                                               <td><a href="#view">view</a>|<a href="#update">update</a>|<a href="#delete">delete</a></td>
                                            </tr>
                                            <tr class="odd gradeA">
                                                <td>child 3</td>
                                                 <td>10/20/2015</td>
                                                <td>Female</td>
                                                <td class="center">X</td>
                                               <td><a href="#view">view</a>|<a href="#update">update</a>|<a href="#delete">delete</a></td>
                                            </tr>
                                            <tr class="even gradeA">
                                                <td>Trident</td>
                                                 <td>10/20/2015</td>
                                                <td>Female</td>
                                                <td class="center">X</td>
                                               <td><a href="#view">view</a>|<a href="#update">update</a>|<a href="#delete">delete</a></td>
                                            </tr>
                                            <tr class="odd gradeA">
                                                <td>Trident</td>
                                                <td>10/20/2015</td>
                                                <td>Female</td>
                                                <td class="center">X</td>
                                               <td><a href="#view">view</a>|<a href="#update">update</a>|<a href="#delete">delete</a></td>
                                            </tr>
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
    <script src="../bower_components/notifyjs/dist/notify.js"></script>
    <script src="../bower_components/notifyjs/dist/styles/bootstrap/notify-bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>
    <script src="../js/pages/child.js"></script>
</body>

</html>
