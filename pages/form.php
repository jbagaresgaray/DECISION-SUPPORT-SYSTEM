<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <?php require_once('include/header.php'); 
    ?>
    
</head>

<body>
    <div id="wrapper">
       <?php require_once('include/nav.php'); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-center">Child Information</h2>
                        
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-12 ">
                        <!-- Form Elements -->
                        <div class="panel panel-default">
                            
                            <div class="panel-body">
                                <div class="row">
                                <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <form role="form"  id="formchild">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input class="form-control" name="fname" id="fname" placeholder="Your First Name here" / >
                                            </div>
                                            <div class="form-group">
                                                <label>Middle Name</label>
                                                <input class="form-control" name="mname" id="mname"placeholder="Your Middle Name here" />
                                            </div>
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input class="form-control"  name="lname" id="lname" placeholder="Your Last Name here" / >
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input class="form-control" name="address" id= "address" placeholder="Your Complete Addres here" / >
                                            </div>
                                            <div class="form-group">
                                                <label>Barrangay</label>
                                                <select class="form-control" name="location" id= "location">
                                               <option value="1"> barangay1</option>
                                                <option value="2"> barangay2</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' class="form-control" name="date" id="date"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                <div class="col-md-4">
                                                    
                                                    <label>Heigth</label>
                                                    <input class="form-control" name="height" id="height" placeholder="input height" />
                                                </div>
                                                <div class="col-md-4">
                                                    
                                                    <label>Weigth</label>
                                                    <input class="form-control" name="weight" id="weight" placeholder="input weight" />
                                                </div>
                                                 <div class="col-md-4">
                                                    
                                                    <label>months</label>
                                                    <input class="form-control" name="month" id="month" placeholder="input number of months" />
                                                </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label>Gender:</label>
                                                <div class="radio ">
                                                    <label>
                                                        <input type="radio" name="gender" id="gender" value="Male" checked />Male
                                                    </label>
                                                </div>
                                                <div class="radio ">
                                                    <label>
                                                        <input type="radio" name="gender" id="gender" value="Female" />Female
                                                    </label>
                                                </div>
                                            </div>
                                            <a class="btn btn-default" onclick="save()">Submit Button</a>
                                            <button type="reset" class="btn btn-primary">Reset Button</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End Form Elements -->
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
    <!-- CUSTOM SCRIPTS -->
      <script src="../assets/js/custom.js"></script>
    <!-- bower -->
    <script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../assets/bower_components/moment/min/moment.min.js"></script>
    <script src="../assets/bower_components/moment/min/locales.min.js"></script>
    <script src="../assets/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
    $(function () {
                $('#datetimepicker2').datetimepicker({
                    locale: 'ru'
                });
            });
    </script>
      <script src="../js/pages/child.js" type="text/javascript"></script>
</body>

</html>
