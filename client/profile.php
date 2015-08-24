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
                        <h2>User Profile</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-primary">
                            <div class="panel-body">
                            <div>
                              <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist" id="myTabs">                                    
                                    <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                                    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Security Accounts</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="profile">
                                        <br>
                                        <form role="form"  id="frmProfile" class="padding-top">
                                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['users']['id'];?>">
                                            <input type="hidden" name="csrf" value="<?php echo $_SESSION['form_token'];?>">
                                            <div class="form-group col-md-6" >
                                                <label>First Name</label>
                                                <input class="form-control" type="text" name="fname" id="fname" placeholder="First Name"/>
                                                <span class="help-inline"></span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Last Name</label>
                                                <input class="form-control" type="text" name="lname" id="lname" placeholder="Last Name"/ >
                                                <span class="help-inline"></span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Email</label>
                                                <input class="form-control" type="email" name="email" id= "email" placeholder="Email Address"/>
                                                <span class="help-inline"></span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Mobile No.</label>
                                                <input class="form-control" type="text" name="mobileno" id="mobileno" placeholder="Mobile No."/>
                                                <span class="help-inline"></span>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <a id="btn-save" class="btn btn-primary" onclick="saveProfile()">Update</a>
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">Clear</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="settings">
                                        <br>
                                        <form role="form"  id="frmAccount" class="padding-top">
                                            <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['users']['id'];?>">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label>Username</label>
                                                    <input class="form-control" type="text" name="username" id="username" placeholder="Username" />
                                                    <span class="help-inline"></span>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Password</label>
                                                        <input class="form-control" type="password" name="password" id="password" placeholder="Password" />
                                                        <span class="help-inline"></span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Confirm Password</label>
                                                        <input class="form-control" type="password" name="password2" id="password2" placeholder="Confirm Password" />
                                                        <span class="help-inline"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <a id="btn-save" class="btn btn-primary" onclick="saveAccount()">Update</a>
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">Clear</button>
                                            </div>
                                        </form>                                        
                                    </div>
                                </div>

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
    <script src="../js/pages/profile.js"></script>
    <script src="../assets/js/custom.js"></script>
</body>

</html>
