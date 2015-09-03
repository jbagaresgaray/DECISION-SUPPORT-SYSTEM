<?php 
session_start();

if(!isset($_SESSION['users']) || empty($_SESSION['users'])){
    header("Location: index.php");
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
                <div class="row">
                    <div class="col-md-12">
                        <h2>Contact Us</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-12">
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
    <script src="../js/pages/mail.js"></script>
    <script src="../assets/js/custom.js"></script>
</body>

</html>
